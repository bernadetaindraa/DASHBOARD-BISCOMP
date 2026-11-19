<div class="row g-3">
    {{-- FILTER SECTION (Global untuk Dashboard) --}}
    <div class="content-card mb-4">
        form method="GET" action="{{ route('dashboard') }}">
            <div class="row g-3 align-items-end">

                <div class="col-md-3">
                    <label class="form-label fw-bold small text-muted">TAHUN</label>
                    <select name="year" class="form-select border-0 bg-light py-2">
                        <option value="">Semua Tahun</option>
                        @foreach($years as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>
                </div>

            </div>
        </form>
    </div>

    <div class="col-lg-8">
        <div class="content-card h-100 mb-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0" style="color: var(--brand-navy);">Kelengkapan Dokumen</h5>
                <span class="badge bg-light text-muted border">Persentase Verifikasi</span>
            </div>
            <div style="position: relative; height: 300px;">
                <canvas id="documentChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="content-card h-100 mb-0">
            <h5 class="fw-bold mb-3" style="color: var(--brand-navy);">Status Checklist</h5>
            <div style="position: relative; height: 280px; display: flex; justify-content: center;">
                <canvas id="statusChart"></canvas>
            </div>
        </div>
    </div>
</div>