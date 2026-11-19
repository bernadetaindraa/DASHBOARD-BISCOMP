
@extends('layouts.app')

@section('title', 'Project Detail')
@section('heading', 'Project Detail')

@section('content')

<div class="content-card mb-4">
    <div class="d-flex justify-content-between align-items-start">
        <div>
            <span class="text-secondary small">PROJECT CODE</span>
            <h4 class="fw-bold mt-1">{{ $project->project_code }}</h4>
            <p class="mb-1">{{ $project->customer_name }}</p>
            <small class="text-secondary">
                Group: {{ $project->group_name ?? '-' }}
            </small>
        </div>

        <a href="{{ route('projects.index') }}"
           class="btn btn-outline-secondary btn-sm">
            Back to Projects
        </a>
    </div>
</div>

<div class="content-card mb-4">
    <h5 class="fw-bold mb-3">Add New Project Period</h5>

    <form action="{{ route('projects.periods.store', $project) }}"
          method="POST">
        @csrf

        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Year Entered *</label>
                <input type="number"
                       name="year_entered"
                       class="form-control"
                       value="{{ old('year_entered', date('Y')) }}"
                       required>
            </div>

            <div class="col-md-3">
                <label class="form-label">AMS PIC</label>
                <select name="ams_user_id" class="form-select">
                    <option value="">-- Select AMS PIC --</option>
                    @foreach(\App\Models\User::whereHas('role', fn($q) => $q->where('code', 'AMS'))->orderBy('name')->get() as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control">
            </div>

            <div class="col-md-3">
                <label class="form-label">End Date</label>
                <input type="date" name="end_date" class="form-control">
            </div>
        </div>

        <div class="mt-3 text-end">
            <button class="btn btn-primary">
                + Add Period
            </button>
        </div>
    </form>
</div>

@foreach($project->periods as $period)

    <div class="content-card mb-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold mb-1">
                    Period {{ $period->period_number }}
                </h5>
                <small class="text-secondary">
                    Year: {{ $period->year_entered }}
                    | AMS PIC: {{ $period->amsUser?->name ?? '-' }}
                </small>
            </div>

            <span class="badge text-bg-primary">
                {{ ucfirst($period->status) }}
            </span>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Document</th>
                        <th>Responsible Unit</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($period->documents as $index => $document)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td class="fw-semibold">
                                {{ $document->documentType->name }}
                            </td>
                            <td>
                                {{ $document->documentType->responsible_unit_code }}
                            </td>
                            <td>
                                @php
                                    $statusColors = [
                                        'not_uploaded' => 'secondary',
                                        'pending' => 'warning',
                                        'verified' => 'success',
                                        'rejected' => 'danger',
                                    ];
                                @endphp

                                <span class="badge text-bg-{{ $statusColors[$document->status] ?? 'secondary' }}">
                                    {{ ucfirst(str_replace('_', ' ', $document->status)) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endforeach

@endsection