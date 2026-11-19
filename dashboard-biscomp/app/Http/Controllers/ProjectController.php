<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use App\Models\ProjectPeriod;
use App\Models\ProjectPeriodDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Menampilkan daftar proyek
    public function index()
    {
        $projects = Project::withCount('periods')
            ->latest()
            ->paginate(10);

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $amsUsers = User::whereHas('role', function ($query) {
            $query->where('code', 'AMS');
        })->orderBy('name')->get();

        return view('projects.create', compact('amsUsers'));
    }

    // Menyimpan proyek baru beserta periode pertama
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_code' => ['required', 'string', 'max:255', 'unique:projects,project_code'],
            'group_name' => ['nullable', 'string', 'max:255'],
            'customer_name' => ['required', 'string', 'max:255'],
            'year_entered' => ['required', 'integer', 'min:2000', 'max:2100'],
            'ams_user_id' => ['nullable', 'exists:users,id'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ]);

        DB::transaction(function () use ($validated) {
            $project = Project::create([
                'project_code' => $validated['project_code'],
                'group_name' => $validated['group_name'] ?? null,
                'customer_name' => $validated['customer_name'],
            ]);

            // Membuat periode pertama
            // Event ProjectPeriod otomatis membuat 7 checklist.
            $project->periods()->create([
                'period_number' => 1,
                'year_entered' => $validated['year_entered'],
                'ams_user_id' => $validated['ams_user_id'] ?? null,
                'start_date' => $validated['start_date'] ?? null,
                'end_date' => $validated['end_date'] ?? null,
                'status' => 'active',
            ]);
        });

        return redirect()
            ->route('projects.index')
            ->with('success', 'Proyek dan 7 checklist dokumen berhasil dibuat.');
    }

    // Menampilkan detail proyek beserta seluruh periodenya
    public function show(Project $project)
    {
        $project->load([
            'periods.amsUser',
            'periods.documents.documentType',
            'periods.documents.currentEvidence',
        ]);

        return view('projects.show', compact('project'));
    }

    // Menambahkan periode baru atau perpanjangan proyek
    public function storePeriod(Request $request, Project $project)
    {
        $validated = $request->validate([
            'year_entered' => ['required', 'integer', 'min:2000', 'max:2100'],
            'ams_user_id' => ['nullable', 'exists:users,id'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ]);

        $period = DB::transaction(function () use ($validated, $project) {
            $nextPeriodNumber = $project->periods()->max('period_number') + 1;

            return $project->periods()->create([
                'period_number' => $nextPeriodNumber,
                'year_entered' => $validated['year_entered'],
                'ams_user_id' => $validated['ams_user_id'] ?? null,
                'start_date' => $validated['start_date'] ?? null,
                'end_date' => $validated['end_date'] ?? null,
                'status' => 'active',
            ]);
        });

        return redirect()
            ->route('projects.show', $project)
            ->with('success', "Periode {$period->period_number} berhasil dibuat dengan 7 checklist dokumen.");
    }
}
