{{-- ==========================================
     TAB 1: INCOMPLETE DATA
========================================== --}}

{{-- FILTER SECTION --}}
<div class="content-card p-3 mb-4">
    <div class="d-flex align-items-center mb-3">
        <div>
            <h6 class="fw-bold mb-1" style="color: var(--brand-navy); font-size: 14pt;">
                <i class="bi bi-funnel me-2"></i>
                Project Filters
            </h6>
        </div>
    </div>

    <form method="GET" action="{{ route('dashboard') }}">
        <div class="row g-3 align-items-end">

            {{-- FILTER YEAR --}}
            <div class="col-md-3">
                <label class="form-label fw-semibold text-secondary" style="font-size: 11pt;">
                    Year
                </label>
                <select name="year" class="form-select form-select-sm py-2">
                    <option value="">All Years</option>
                    @foreach($years as $year)
                        <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- SEARCH PROJECT --}}
            <div class="col-md-6">
                <label class="form-label fw-semibold text-secondary" style="font-size: 11pt;">
                    Search Project
                </label>
                <div class="input-group input-group-sm">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-search text-secondary"></i>
                    </span>
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control py-2" 
                        value="{{ request('search') }}" 
                        placeholder="Project Code / Customer / Group">
                </div>
            </div>

            {{-- ACTION BUTTON --}}
            <div class="col-md-3">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-sm flex-fill py-2" style="background-color: var(--brand-blue);">
                        <i class="bi bi-funnel me-1"></i> Filter
                    </button>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary btn-sm flex-fill py-2">
                        <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                    </a>
                </div>
            </div>

        </div>
    </form>
</div>


{{-- ==========================================
     SUMMARY STATISTICS CARDS
========================================== --}}
<div class="row g-3 mb-4">

    {{-- CARD 1: BUSINESS COMPLIANCE --}}
    <div class="col-xl-3 col-md-6">
        <div class="stat-card stat-card-primary h-100 p-3">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label text-uppercase text-white-50" style="font-size: 10pt; letter-spacing: 0.5px;">
                        Business Compliance
                    </div>
                    <div class="stat-value text-white fw-bold my-1" style="font-size: 18pt;">
                        {{ number_format($compliancePercentage, 2) }}%
                    </div>
                </div>
                <div class="stat-icon fs-4 text-white-50">
                    <i class="bi bi-shield-fill-check"></i>
                </div>
            </div>
            <div class="stat-description text-white-50" style="font-size: 10pt;">
                Percentage of verified documents
            </div>
        </div>
    </div>

    {{-- CARD 2: TOTAL PROJECT --}}
    <div class="col-xl-3 col-md-6">
        <div class="stat-card stat-card-accent-blue h-100 p-3">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label text-uppercase text-muted" style="font-size: 10pt; letter-spacing: 0.5px;">
                        Total Projects
                    </div>
                    <div class="stat-value fw-bold my-1" style="font-size: 18pt;">
                        {{ number_format($totalProjects) }}
                    </div>
                </div>
                <div class="stat-icon fs-4 text-muted">
                    <i class="bi bi-folder2-open"></i>
                </div>
            </div>
            <div class="stat-description text-muted" style="font-size: 10pt;">
                <strong>{{ number_format($totalPeriods) }}</strong> project periods
            </div>
        </div>
    </div>

    {{-- CARD 3: VERIFIED DOCUMENTS --}}
    <div class="col-xl-3 col-md-6">
        <div class="stat-card stat-card-teal h-100 p-3">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label text-uppercase text-white-50" style="font-size: 10pt; letter-spacing: 0.5px;">
                        Verified Documents
                    </div>
                    <div class="stat-value text-white fw-bold my-1" style="font-size: 18pt;">
                        {{ number_format($verifiedDocuments) }}
                    </div>
                </div>
                <div class="stat-icon fs-4 text-white-50">
                    <i class="bi bi-file-earmark-check-fill"></i>
                </div>
            </div>
            <div class="stat-description text-white-50" style="font-size: 10pt;">
                Out of {{ number_format($totalDocuments) }} total documents
            </div>
        </div>
    </div>

    {{-- CARD 4: UNVERIFIED DOCUMENTS --}}
    <div class="col-xl-3 col-md-6">
        <div class="stat-card stat-card-accent-teal h-100 p-3">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label text-uppercase text-muted" style="font-size: 10pt; letter-spacing: 0.5px;">
                        Unverified Documents
                    </div>
                    <div class="stat-value text-danger fw-bold my-1" style="font-size: 18pt;">
                        {{ number_format($incompleteDocuments) }}
                    </div>
                </div>
                <div class="stat-icon fs-4 text-danger">
                    <i class="bi bi-exclamation-octagon-fill"></i>
                </div>
            </div>
            <div class="stat-description text-muted" style="font-size: 10pt;">
                Pending or rejected documents
            </div>
        </div>
    </div>

</div>


{{-- ==========================================
     INCOMPLETE DATA SUMMARY ALERT
========================================== --}}
<div class="content-card p-3 mb-4">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <div>
            <h6 class="fw-bold mb-1" style="color: var(--brand-navy); font-size: 14pt;">
                <i class="bi bi-clipboard-data me-2"></i>
                Incomplete Data Summary
            </h6>
        </div>
    </div>

    @if($incompleteDocuments > 0)
        <div class="alert alert-warning d-flex align-items-center mb-0 py-2 px-3" role="alert" style="font-size: 11pt;">
            <i class="bi bi-exclamation-triangle-fill fs-4 me-3"></i>
            <div>
                There are <strong>{{ number_format($incompleteDocuments) }}</strong> unverified documents out of 
                <strong>{{ number_format($totalDocuments) }}</strong> total checklist documents. 
                Please review the breakdown below or check the monitoring menu.
            </div>
        </div>
    @else
        <div class="alert alert-success d-flex align-items-center mb-0 py-2 px-3" role="alert" style="font-size: 11pt;">
            <i class="bi bi-check-circle-fill fs-4 me-3"></i>
            <div>
                All documents recorded in the checklist have been successfully verified.
            </div>
        </div>
    @endif
</div>


{{-- ==========================================
     2 SECTIONS: DOCUMENT BREAKDOWN & AMS SUMMARY
========================================== --}}
<div class="row g-3">

    {{-- KIRI: GRAFIK / TABEL JUMLAH DOKUMEN (GI, RR, PI, PA, Proposal, Kontrak) --}}
    
    <div class="col-xl-7">
        <div class="content-card p-3 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0" style="color: var(--brand-navy); font-size: 13pt;">
                    <i class="bi bi-graph-up me-2 text-primary"></i>
                    Document Completion Comparison
                </h6>

                <span class="badge bg-light text-secondary border" style="font-size: 9pt;">
                    Verified vs Total
                </span>
            </div>

            <div style="position: relative; height: 300px; width: 100%;">
                <canvas id="documentComparisonChart"></canvas>
            </div>
        </div>
    </div>


    {{-- KANAN: JUMLAH PROJECT BELUM LENGKAP PER AMS --}}
    <div class="col-xl-5">
        <div class="content-card p-3 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0" style="color: var(--brand-navy); font-size: 13pt;">
                    <i class="bi bi-people-fill me-2 text-danger"></i>
                    Incomplete Projects by AMS
                </h6>
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle" style="font-size: 9pt;">Needs Attention</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="font-size: 10pt;">
                    <thead class="table-light">
                        <tr>
                            <th class="py-2">AMS Name</th>
                            <th class="text-center py-2">Incomplete Projects</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($amsIncompleteSummary ?? [] as $row)
                            @php
                                $amsName = $row->amsUser ? $row->amsUser->name : 'Unassigned AMS';
                            @endphp
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar-initials" style="width: 28px; height: 28px; font-size: 0.75rem; background: #475569; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                            {{ strtoupper(substr($amsName, 0, 2)) }}
                                        </div>
                                        <span class="fw-semibold text-dark">{{ $amsName }}</span>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-danger px-2 py-1" style="font-size: 9pt;">
                                        {{ $row->total }} Projects
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted py-3">
                                    <i class="bi bi-check-circle text-success fs-5 d-block mb-1"></i>
                                    No incomplete projects assigned to AMS.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- KANAN: 10 PROJECT DENGAN PERSENTASE KEPATUHAN TERENDAH --}}
    <div class="col-xl-12">
        <div class="content-card p-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0" style="color: var(--brand-navy); font-size: 13pt;">
                    <i class="bi bi-exclamation-triangle-fill me-2 text-danger"></i>
                    Lowest Compliance Projects (Top 10)
                </h6>
                <span class="badge bg-danger-subtle text-danger border border-danger-subtle" style="font-size: 9pt;">Needs Attention</span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="font-size: 10pt;">
                    <thead class="table-light">
                        <tr>
                            <th class="py-2">Project Code / Customer</th>
                            <th class="py-2">AMS</th>
                            <th class="text-center py-2">Compliance</th>
                            <th class="text-center py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // Mengambil 10 project periode dengan persentase kelengkapan terendah
                            $lowestCompliancePeriods = $periods->getCollection()->sortBy(function($period) {
                                $verified = $period->documents->where('status', 'verified')->count();
                                $total = $period->documents->count();
                                return $total > 0 ? ($verified / $total) * 100 : 0;
                            })->take(10);
                        @endphp

                        @forelse($lowestCompliancePeriods as $period)
                            @php
                                $verified = $period->documents->where('status', 'verified')->count();
                                $total = $period->documents->count();
                                $percentage = $total > 0 ? round(($verified / $total) * 100) : 0;
                            @endphp
                            <tr>
                                <td>
                                    <span class="fw-bold text-dark">{{ $period->project->project_code ?? '-' }}</span>
                                    <div class="text-muted" style="font-size: 8.5pt;">{{ $period->project->customer_name ?? '-' }} (Period {{ $period->period_number }})</div>
                                </td>
                                <td>{{ $period->amsUser->name ?? '-' }}</td>
                                <td class="text-center">
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1 fw-bold" style="font-size: 9pt;">
                                        {{ $percentage }}%
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('projects.show', $period->project_id) }}" class="btn btn-sm btn-outline-primary py-0 px-2" style="font-size: 8.5pt;">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">
                                    <i class="bi bi-check-circle text-success fs-5 d-block mb-1"></i>
                                    No projects found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>