<style>
    /* =========================================
    MONITORING TABLE
    ========================================= */

    .monitoring-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 20px;
    }

    .excel-table {
        width: 100%;
        margin-bottom: 0;
        border-collapse: collapse;
        font-size: 12pt;
        color: #334155;
    }

    .excel-table thead th {
        background: #f1f5f9;
        color: #334155;
        font-size: 12pt;
        font-weight: 700;
        padding: 12px 10px;
        border-bottom: 1px solid #dbe3ed;
        white-space: nowrap;
        vertical-align: middle;
    }

    .excel-table tbody td {
        font-size: 12pt;
        padding: 12px 10px;
        border-bottom: 1px solid #edf0f4;
        white-space: nowrap;
        vertical-align: middle;
    }

    .excel-table tbody tr:hover {
        background: #f8fafc;
    }

    .customer-cell {
        font-weight: 600;
        color: #1e293b;
    }

    .project-code {
        color: #1d4ed8;
        font-weight: 600;
    }

    /* =========================================
    SEARCH
    ========================================= */

    .monitoring-search {
        width: 280px;
        max-width: 100%;
    }

    .search-box {
        display: flex;
        align-items: center;
        gap: 9px;
        background: #fff;
        border: 1px solid #dbe3ed;
        border-radius: 8px;
        padding: 9px 12px;
    }

    .search-box i {
        color: #64748b;
        font-size: 13px;
    }

    .search-box input {
        width: 100%;
        border: none;
        outline: none;
        font-size: 11pt;
        color: #334155;
        background: transparent;
    }

    .search-box:focus-within {
        border-color: #64748b;
        box-shadow: 0 0 0 3px rgba(100, 116, 139, .10);
    }

    /* =========================================
    STATUS BADGES
    ========================================= */

    .status-badge {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 5px;
        font-size: 10pt;
        font-weight: 600;
        text-align: center;
    }

    .status-verified {
        background: #dcfce7;
        color: #166534;
    }

    .status-pending {
        background: #fef3c7;
        color: #92400e;
    }

    .status-rejected {
        background: #fee2e2;
        color: #991b1b;
    }

    .status-empty {
        background: #f1f5f9;
        color: #64748b;
    }

    /* =========================================
    COMPLIANCE
    ========================================= */

    .compliance-cell {
        display: flex;
        align-items: center;
        gap: 8px;
        min-width: 100px;
        font-size: 11pt;
        font-weight: 600;
    }

    .compliance-progress {
        width: 65px;
        height: 7px;
        background: #e2e8f0;
        border-radius: 10px;
        overflow: hidden;
    }

    .compliance-progress-bar {
        height: 100%;
        background: #2563eb;
        border-radius: 10px;
    }

    /* =========================================
    THREE DOT ACTION MENU
    ========================================= */

    .detail-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border: none;
        border-radius: 6px;
        background: transparent;
        color: #475569;
        font-size: 17px;
        cursor: pointer;
    }

    .detail-button:hover,
    .detail-button:focus {
        background: #f1f5f9;
        color: #1e293b;
    }

    .action-menu {
        min-width: 175px;
        padding: 6px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        box-shadow: 0 8px 24px rgba(15, 23, 42, .12);
    }

    .action-menu .dropdown-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 9px 10px;
        border-radius: 5px;
        font-size: 11pt;
        color: #334155;
    }

    .action-menu .dropdown-item i {
        width: 17px;
        font-size: 14px;
        color: #64748b;
    }

    .action-menu .dropdown-item:hover {
        background: #f1f5f9;
    }

    .action-menu .delete-item,
    .action-menu .delete-item i {
        color: #dc2626;
    }

    .action-menu .delete-item:hover {
        background: #fef2f2;
    }

    .action-menu .dropdown-divider {
        margin: 5px 0;
    }

    /* =========================================
    STATUS LEGEND
    ========================================= */

    .monitoring-legend {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 18px;
        padding: 15px 2px;
        margin-top: 10px;
        border-top: 1px solid #e2e8f0;
        border-bottom: 1px solid #e2e8f0;
    }

    .legend-title {
        font-size: 11pt;
        font-weight: 700;
        color: #334155;
    }

    .legend-item {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-size: 10pt;
        color: #64748b;
    }

    .legend-dot {
        width: 9px;
        height: 9px;
        border-radius: 50%;
    }

    .dot-verified {
        background: #22c55e;
    }

    .dot-pending {
        background: #f59e0b;
    }

    .dot-rejected {
        background: #ef4444;
    }

    .dot-empty {
        background: #94a3b8;
    }

    /* =========================================
    PAGINATION
    ========================================= */

    .monitoring-pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        padding-top: 17px;
    }

    .pagination-info {
        font-size: 10pt;
        color: #64748b;
    }

    .pagination-controls {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .pagination-controls label {
        font-size: 10pt;
        color: #64748b;
        margin: 0;
    }

    .per-page-select {
        border: 1px solid #dbe3ed;
        border-radius: 6px;
        padding: 5px 8px;
        font-size: 10pt;
        color: #334155;
        background: #fff;
    }

    .monitoring-pagination .pagination {
        margin: 0;
    }

    .monitoring-pagination .page-link {
        font-size: 10pt;
        color: #475569;
    }

    .monitoring-pagination .active .page-link {
        background: #1e3a8a;
        border-color: #1e3a8a;
        color: #fff;
    }

    /* =========================================
    RESPONSIVE
    ========================================= */

    @media (max-width: 768px) {
        .monitoring-card {
            padding: 14px;
        }

        .monitoring-search {
            width: 100%;
        }

        .monitoring-pagination {
            align-items: flex-start;
            flex-direction: column;
        }

        .pagination-controls {
            flex-wrap: wrap;
        }
    }
</style>

<div class="content-card monitoring-card">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div>
            <h5 class="fw-bold mb-1" style="font-size: 14pt;">
                Project Monitoring
            </h5>
            <p class="text-muted mb-0" style="font-size: 10pt;">
                Monitoring kelengkapan dokumen Business Compliance
            </p>
        </div>

        <form method="GET"
              action="{{ route('dashboard') }}"
              id="monitoringSearchForm"
              class="monitoring-search">

            <input type="hidden" name="tab" value="monitoring">
            <input type="hidden"
                   name="per_page"
                   value="{{ request('per_page', 15) }}"
                   id="searchPerPage">

            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text"
                       name="search"
                       id="monitoringSearch"
                       value="{{ request('search') }}"
                       placeholder="Cari project, customer, dokumen...">
            </div>
        </form>
    </div>

    {{-- TABLE --}}
    <div class="table-responsive">
        <table id="monitoringTable" class="table excel-table align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Customer</th>
                    <th>Project Code</th>
                    <th>Tahun</th>
                    <th>AMS</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Proposal</th>
                    <th>GI</th>
                    <th>RR</th>
                    <th>PA</th>
                    <th>PI</th>
                    <th>Kontrak</th>
                    <th>BoQ</th>
                    <th>Compliance</th>
                    <th class="text-center">Detail</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($periods as $index => $period)

                    @php
                        $documentCodes = [
                            'PROPOSAL',
                            'GI',
                            'RR',
                            'PA',
                            'PI',
                            'KONTRAK',
                            'BOQ'
                        ];

                        $verified = $period->documents
                            ->where('status', 'verified')
                            ->count();

                        $total = $period->documents->count();

                        $percentage = $total > 0
                            ? round(($verified / $total) * 100)
                            : 0;
                    @endphp

                    <tr>
                        <td>
                            {{ $periods->firstItem() + $index }}
                        </td>

                        <td class="customer-cell">
                            {{ $period->project->customer_name ?? '-' }}
                        </td>

                        <td>
                            <span class="project-code">
                                {{ $period->project->project_code ?? '-' }}
                            </span>
                        </td>

                        <td>{{ $period->year_entered ?? '-' }}</td>

                        <td>{{ $period->amsUser->name ?? '-' }}</td>

                        <td>
                            {{ $period->start_date
                                ? $period->start_date->translatedFormat('d F Y')
                                : '-' }}
                        </td>

                        <td>
                            {{ $period->end_date
                                ? $period->end_date->translatedFormat('d F Y')
                                : '-' }}
                        </td>

                        @foreach ($documentCodes as $code)
                            @php
                                $document = $period->documents->first(
                                    fn ($item) =>
                                        strtoupper($item->documentType->code ?? '') === $code
                                );

                                $status = $document->status ?? 'not_uploaded';
                            @endphp

                            <td>
                                @if ($status === 'verified')
                                    <span class="status-badge status-verified">
                                        Verified
                                    </span>
                                @elseif ($status === 'pending')
                                    <span class="status-badge status-pending">
                                        Pending
                                    </span>
                                @elseif ($status === 'rejected')
                                    <span class="status-badge status-rejected">
                                        Rejected
                                    </span>
                                @else
                                    <span class="status-badge status-empty">
                                        -
                                    </span>
                                @endif
                            </td>
                        @endforeach

                        <td>
                            <div class="compliance-cell">
                                <div class="compliance-progress">
                                    <div class="compliance-progress-bar"
                                         style="width: {{ $percentage }}%">
                                    </div>
                                </div>

                                <span>{{ $percentage }}%</span>
                            </div>
                        </td>

                        {{-- ACTION MENU --}}
                        <td class="text-center">
                            <div class="dropdown">
                                <button class="detail-button"
                                        type="button"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                        title="Project actions">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-end action-menu">

                                    {{-- VIEW --}}
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ route('projects.show', $period->project_id) }}">
                                            <i class="bi bi-eye"></i>
                                            <span>View</span>
                                        </a>
                                    </li>

                                    {{-- ACTIVITY LOG --}}
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ route('projects.activity-log', $period->project_id) }}">
                                            <i class="bi bi-clock-history"></i>
                                            <span>Activity Log</span>
                                        </a>
                                    </li>

                                    <li><hr class="dropdown-divider"></li>

                                    {{-- EDIT --}}
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{ route('projects.edit', $period->project_id) }}">
                                            <i class="bi bi-pencil-square"></i>
                                            <span>Edit</span>
                                        </a>
                                    </li>

                                    {{-- DELETE --}}
                                    <li>
                                        <form action="{{ route('projects.destroy', $period->project_id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Apakah kamu yakin ingin menghapus project ini? Seluruh data terkait project mungkin ikut terhapus.')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="dropdown-item delete-item">
                                                <i class="bi bi-trash"></i>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="16" class="text-center py-5">
                            <i class="bi bi-inbox fs-3 text-muted"></i>
                            <p class="text-muted mt-2 mb-0">
                                Data monitoring tidak ditemukan.
                            </p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- STATUS LEGEND: TERPISAH DARI PAGINATION --}}
    <div class="monitoring-legend">
        <span class="legend-title">Keterangan:</span>

        <span class="legend-item">
            <span class="legend-dot dot-verified"></span>
            Verified
        </span>

        <span class="legend-item">
            <span class="legend-dot dot-pending"></span>
            Pending
        </span>

        <span class="legend-item">
            <span class="legend-dot dot-rejected"></span>
            Rejected
        </span>

        <span class="legend-item">
            <span class="legend-dot dot-empty"></span>
            Not Uploaded
        </span>
    </div>

    {{-- PAGINATION --}}
    <div class="monitoring-pagination">

        <div class="pagination-info">
            Menampilkan
            <strong>{{ $periods->firstItem() ?? 0 }}</strong>
            –
            <strong>{{ $periods->lastItem() ?? 0 }}</strong>
            dari
            <strong>{{ $periods->total() }}</strong>
            data
        </div>

        <div class="pagination-controls">
            <label for="perPageSelect">Baris:</label>

            <select id="perPageSelect" class="per-page-select">
                @foreach ([15, 25, 50, 100] as $size)
                    <option value="{{ $size }}"
                        {{ request('per_page', 15) == $size ? 'selected' : '' }}>
                        {{ $size }}
                    </option>
                @endforeach
            </select>

            {{ $periods->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>

</div>



{{-- ==========================================
     JAVASCRIPT
========================================== --}}

@push('scripts')


<script>
document.addEventListener('DOMContentLoaded', function () {

    const table = document.getElementById('monitoringTable');
    const freezeSelect = document.getElementById('freezeSelect');

    const searchInput = document.getElementById('monitoringSearch');
    const searchForm = document.getElementById('monitoringSearchForm');

    const perPageSelect = document.getElementById('perPageSelect');
    const searchPerPage = document.getElementById('searchPerPage');


    // ==========================================
    // 1. FREEZE COLUMN DINAMIS
    // ==========================================

    function applyFreezeColumns(freezeCount) {

        if (!table || !freezeSelect) return;

        const headerRow = table.querySelector('thead tr');

        if (!headerRow) return;

        const rows = table.querySelectorAll('tr');
        const headerCells = headerRow.querySelectorAll('th');

        // Reset sticky column sebelumnya
        table.querySelectorAll('.sticky-col, .sticky-col-last')
            .forEach(cell => {
                cell.classList.remove('sticky-col', 'sticky-col-last');
                cell.style.left = '';
            });

        freezeCount = Number(freezeCount) || 0;

        if (freezeCount <= 0) return;

        let leftOffsets = [];
        let currentLeft = 0;

        // Hitung lebar kolom berdasarkan header
        for (let i = 0; i < freezeCount; i++) {

            if (!headerCells[i]) break;

            leftOffsets.push(currentLeft);

            currentLeft += headerCells[i].getBoundingClientRect().width;
        }

        // Terapkan sticky pada seluruh baris
        rows.forEach(row => {

            const cells = row.querySelectorAll('th, td');

            // Lewati baris kosong atau empty state
            if (cells.length <= 1) return;

            for (let i = 0; i < leftOffsets.length; i++) {

                if (!cells[i]) continue;

                cells[i].classList.add('sticky-col');
                cells[i].style.left = leftOffsets[i] + 'px';

                // Kolom terakhir yang di-freeze
                if (i === leftOffsets.length - 1) {
                    cells[i].classList.add('sticky-col-last');
                }
            }
        });
    }


    // Jalankan freeze saat halaman pertama dibuka
    if (table && freezeSelect) {

        applyFreezeColumns(freezeSelect.value);

        // Saat pilihan freeze berubah
        freezeSelect.addEventListener('change', function () {
            applyFreezeColumns(this.value);
        });

        // Hitung ulang saat ukuran layar berubah
        window.addEventListener('resize', function () {
            applyFreezeColumns(freezeSelect.value);
        });
    }


    // ==========================================
    // 2. GLOBAL AUTO SEARCH
    // ==========================================

    let searchTimeout;

    if (searchInput && searchForm) {

        searchInput.addEventListener('input', function () {

            clearTimeout(searchTimeout);

            // Submit otomatis setelah berhenti mengetik
            searchTimeout = setTimeout(function () {
                searchForm.submit();
            }, 400);
        });

        // Enter untuk langsung mencari
        searchInput.addEventListener('keydown', function (event) {

            if (event.key === 'Enter') {

                event.preventDefault();

                clearTimeout(searchTimeout);

                searchForm.submit();
            }
        });
    }


    // ==========================================
    // 3. AUTO CHANGE PER PAGE
    // ==========================================

    if (perPageSelect && searchForm && searchPerPage) {

        perPageSelect.addEventListener('change', function () {

            searchPerPage.value = this.value;

            searchForm.submit();
        });
    }

});
</script>

@endpush