
@extends('layouts.app')

@section('title', 'Add Project')
@section('heading', 'Add New Project')

@section('content')

<div class="content-card">

    <div class="mb-4">
        <h5 class="fw-bold">Project Information</h5>
        <p class="text-secondary small">
            Masukkan informasi proyek untuk memulai monitoring Business Compliance.
        </p>
    </div>

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Project Code *</label>
                <input type="text"
                       name="project_code"
                       class="form-control"
                       value="{{ old('project_code') }}"
                       placeholder="Contoh: PRJ-001"
                       required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Group</label>
                <input type="text"
                       name="group_name"
                       class="form-control"
                       value="{{ old('group_name') }}"
                       placeholder="Nama group">
            </div>

            <div class="col-md-6">
                <label class="form-label">Customer Name *</label>
                <input type="text"
                       name="customer_name"
                       class="form-control"
                       value="{{ old('customer_name') }}"
                       placeholder="Nama customer"
                       required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Year Entered *</label>
                <input type="number"
                       name="year_entered"
                       class="form-control"
                       value="{{ old('year_entered', date('Y')) }}"
                       min="2000"
                       max="2100"
                       required>
            </div>

            <div class="col-md-6">
                <label class="form-label">AMS PIC</label>
                <select name="ams_user_id" class="form-select">
                    <option value="">-- Select AMS PIC --</option>
                    @foreach($amsUsers as $user)
                        <option value="{{ $user->id }}"
                            @selected(old('ams_user_id') == $user->id)>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Start Date</label>
                <input type="date"
                       name="start_date"
                       class="form-control"
                       value="{{ old('start_date') }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">End Date Project</label>
                <input type="date"
                       name="end_date"
                       class="form-control"
                       value="{{ old('end_date') }}">
            </div>

        </div>

        <hr class="my-4">

        <div class="alert alert-info">
            <strong>Automatic Document Checklist</strong>
            <p class="mb-2 small">
                Sistem akan otomatis membuat 7 checklist dokumen untuk periode pertama.
            </p>
            <div class="d-flex flex-wrap gap-2">
                @foreach(['Proposal', 'GI', 'RR', 'PA', 'PI', 'Kontrak', 'Material / BoQ'] as $document)
                    <span class="badge text-bg-light border text-dark">
                        {{ $document }}
                    </span>
                @endforeach
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('projects.index') }}"
               class="btn btn-light border">
                Cancel
            </a>

            <button type="submit" class="btn btn-primary">
                Save Project
            </button>
        </div>

    </form>

</div>

@endsection