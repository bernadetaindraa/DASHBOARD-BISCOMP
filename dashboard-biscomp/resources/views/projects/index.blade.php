
@extends('layouts.app')

@section('title', 'Project Monitoring')
@section('heading', 'Project Monitoring')

@section('content')

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="text-secondary">Total Projects</div>
            <div class="stat-value">{{ $projects->total() }}</div>
            <small class="text-secondary">Terdaftar dalam sistem</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <div class="text-secondary">Project Periods</div>
            <div class="stat-value">
                {{ \App\Models\ProjectPeriod::count() }}
            </div>
            <small class="text-secondary">Seluruh periode proyek</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <div class="text-secondary">Document Checklists</div>
            <div class="stat-value">
                {{ \App\Models\ProjectPeriodDocument::count() }}
            </div>
            <small class="text-secondary">Checklist seluruh periode</small>
        </div>
    </div>
</div>

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Project List</h5>
            <small class="text-secondary">
                Daftar seluruh proyek dan periode yang dimonitor.
            </small>
        </div>

        <a href="{{ route('projects.create') }}"
           class="btn btn-primary">
            + Add Project
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Project Code</th>
                    <th>Group</th>
                    <th>Customer Name</th>
                    <th>Total Period</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($projects as $index => $project)
                    <tr>
                        <td>{{ $projects->firstItem() + $index }}</td>
                        <td class="fw-semibold">
                            {{ $project->project_code }}
                        </td>
                        <td>{{ $project->group_name ?? '-' }}</td>
                        <td>{{ $project->customer_name }}</td>
                        <td>
                            <span class="badge text-bg-info">
                                {{ $project->periods_count }} Period
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('projects.show', $project) }}"
                               class="btn btn-sm btn-outline-primary">
                                View Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-secondary">
                            Belum ada proyek. Silakan tambahkan proyek pertama.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $projects->links() }}

</div>

@endsection