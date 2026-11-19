<?php

namespace App\Http\Controllers;

use App\Models\ProjectPeriod;
use App\Models\ProjectPeriodDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        // ==================================================
        // 1. QUERY DASAR PROJECT PERIOD
        // ==================================================

        $periodQuery = ProjectPeriod::with([
            'project',
            'amsUser',
            'documents.documentType'
        ]);

        // ==================================================
        // 2. GLOBAL SEARCH
        // ==================================================

        if ($request->filled('search')) {

            $search = trim($request->search);

            $periodQuery->where(function ($query) use ($search) {

                // Pencarian berdasarkan tahun dan periode
                $query->where('year_entered', 'like', "%{$search}%")
                    ->orWhere('period_number', 'like', "%{$search}%");

                // Pencarian berdasarkan informasi project
                $query->orWhereHas('project', function ($project) use ($search) {

                    $project->where('project_code', 'like', "%{$search}%")
                        ->orWhere('customer_name', 'like', "%{$search}%")
                        ->orWhere('group_name', 'like', "%{$search}%");

                });

                // Pencarian berdasarkan AMS
                $query->orWhereHas('amsUser', function ($ams) use ($search) {

                    $ams->where('name', 'like', "%{$search}%");

                });

                // Pencarian berdasarkan tanggal
                $query->orWhere('start_date', 'like', "%{$search}%")
                    ->orWhere('end_date', 'like', "%{$search}%");

                // Pencarian berdasarkan dokumen dan status
                $query->orWhereHas('documents', function ($document) use ($search) {

                    $document->where('status', 'like', "%{$search}%")

                        ->orWhereHas('documentType', function ($type) use ($search) {

                            $type->where('code', 'like', "%{$search}%")
                                ->orWhere('name', 'like', "%{$search}%");

                        });

                });

            });
        }


        // ==================================================
        // 3. ID PERIODE SESUAI PENCARIAN
        // ==================================================

        $periodIds = (clone $periodQuery)->select('id');


        // ==================================================
        // 4. KPI STATISTICS (TAB 2)
        // ==================================================

        // Total project unik
        $totalProjects = (clone $periodQuery)
            ->distinct()
            ->count('project_id');

        // Total periode project
        $totalPeriods = (clone $periodQuery)->count();

        // Query dokumen berdasarkan periode hasil pencarian
        $documentQuery = ProjectPeriodDocument::whereIn(
            'project_period_id',
            $periodIds
        );

        // Total seluruh dokumen
        $totalDocuments = (clone $documentQuery)->count();

        // Total dokumen terverifikasi
        $verifiedDocuments = (clone $documentQuery)
            ->where('status', 'verified')
            ->count();

        // Total dokumen belum terverifikasi
        $incompleteDocuments = $totalDocuments - $verifiedDocuments;

        // Persentase compliance
        $compliancePercentage = $totalDocuments > 0
            ? round(($verifiedDocuments / $totalDocuments) * 100, 2)
            : 0;


        // ==================================================
        // 5. DATA GRAFIK (TAB 2)
        // ==================================================

        $documentChart = DB::table('project_period_documents as ppd')

            ->join(
                'document_types as dt',
                'dt.id',
                '=',
                'ppd.document_type_id'
            )

            ->whereIn('ppd.project_period_id', $periodIds)

            ->select(
                'dt.code',
                'dt.name',
                DB::raw('COUNT(ppd.id) as total'),

                DB::raw("
                    SUM(
                        CASE
                            WHEN ppd.status = 'verified'
                            THEN 1
                            ELSE 0
                        END
                    ) as verified
                ")
            )

            ->groupBy(
                'dt.id',
                'dt.code',
                'dt.name',
                'dt.sort_order'
            )

            ->orderBy('dt.sort_order')

            ->get();


        // ==================================================
        // 6. TAB 1 - DATA BELUM LENGKAP
        // ==================================================

        $incompleteQuery = clone $periodQuery;

        $incompleteQuery->where(function ($query) {

            // Dokumen dengan status belum lengkap
            $query->whereHas('documents', function ($document) {

                $document->whereIn('status', [
                    'not_uploaded',
                    'pending',
                    'rejected'
                ]);

            })

            // Periode dengan jumlah dokumen kurang dari 7
            ->orWhereRaw(
                '(SELECT COUNT(*)
                  FROM project_period_documents
                  WHERE project_period_documents.project_period_id = project_periods.id
                ) < 7'
            );

        });


        // REKAP AMS
        $amsIncompleteSummary = (clone $incompleteQuery)

            ->select('ams_user_id')

            ->selectRaw('COUNT(*) as total')

            ->groupBy('ams_user_id')

            ->with('amsUser')

            ->get();


        // DAFTAR PERIODE INCOMPLETE
        $incompletePeriods = $incompleteQuery

            ->latest()

            ->paginate(15, ['*'], 'incomplete_page')

            ->withQueryString();


        // ==================================================
        // 7. TAB 3 - MONITORING KESELURUHAN PROJECT
        // ==================================================

        // Pilihan jumlah data per halaman
        $allowedPerPage = [15, 25, 50, 100];

        $perPage = (int) $request->input('per_page', 15);

        // Batasi jumlah data sesuai pilihan yang tersedia
        if (!in_array($perPage, $allowedPerPage)) {
            $perPage = 15;
        }


        // Ambil seluruh periode project berdasarkan pencarian
        $periods = (clone $periodQuery)

            ->latest()

            ->paginate(
                $perPage,
                ['*'],
                'monitoring_page'
            )

            ->withQueryString();


        // ==================================================
        // 8. PILIHAN TAHUN
        // ==================================================

        // Dipertahankan apabila masih digunakan
        // oleh bagian dashboard lainnya.

        $years = ProjectPeriod::select('year_entered')

            ->distinct()

            ->orderByDesc('year_entered')

            ->pluck('year_entered');


        // ==================================================
        // 9. RETURN VIEW
        // ==================================================

        return view('dashboard.index', compact(

            // KPI
            'totalProjects',
            'totalPeriods',
            'totalDocuments',
            'verifiedDocuments',
            'incompleteDocuments',
            'compliancePercentage',

            // Grafik
            'documentChart',

            // Tab Incomplete Data
            'amsIncompleteSummary',
            'incompletePeriods',

            // Tab Monitoring
            'periods',

            // Data pendukung
            'years'

        ));
    }
}