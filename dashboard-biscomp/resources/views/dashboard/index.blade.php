@extends('layouts.app')

@section('title', 'Dashboard BComp - Garuda Daya Pratama Sejahtera')
@section('heading', 'Business Compliance Dashboard')

@section('content')

    {{-- Custom Styling for Centered Tabs & Hover Effects --}}
    <style>
        .dashboard-wrapper {
            font-size: 0.875rem; /* Max 14pt */
        }

        /* Centered Tabs Container */
        .dashboard-tabs-wrapper {
            display: flex;
            justify-content: center;
            width: 100%;
            margin-bottom: 1.75rem;
        }

        .dashboard-tabs {
            background: #ffffff;
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            padding: 6px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.03);
            display: inline-flex;
            gap: 4px;
        }

        .dashboard-tabs .nav-link {
            color: var(--text-muted, #64748B);
            font-weight: 600;
            font-size: 0.875rem;
            padding: 0.55rem 1.25rem;
            border-radius: 8px !important;
            border: none !important;
            transition: all 0.2s ease-in-out;
            background-color: transparent;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Hover: background turns light grey, text/icon turns navy blue */
        .dashboard-tabs .nav-link:hover {
            background-color: #F1F5F9 !important;
            color: var(--brand-navy, #1E2229) !important;
        }

        .dashboard-tabs .nav-link:hover i {
            color: var(--brand-navy, #1E2229) !important;
        }

        /* Active State */
        .dashboard-tabs .nav-link.active {
            background-color: var(--brand-blue, #0052B4) !important;
            color: #ffffff !important;
            box-shadow: 0 4px 10px rgba(0, 82, 180, 0.2);
        }

        .dashboard-tabs .nav-link.active i {
            color: #ffffff !important;
        }

        /* Content Container */
        .dashboard-card-container {
            background: #ffffff;
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
            padding: 20px;
        }
    </style>

    <div class="container-fluid px-0 dashboard-wrapper">

        {{-- CENTERED NAV TABS --}}
        <div class="dashboard-tabs-wrapper">
            <ul class="nav nav-pills dashboard-tabs" id="dashboardTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="incomplete-tab" data-bs-toggle="tab" data-bs-target="#incomplete" type="button" role="tab" aria-controls="incomplete" aria-selected="true">
                        <i class="bi bi-exclamation-circle fs-6"></i> Incomplete Data
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="statistics-tab" data-bs-toggle="tab" data-bs-target="#statistics" type="button" role="tab" aria-controls="statistics" aria-selected="false">
                        <i class="bi bi-bar-chart-fill fs-6"></i> Statistics & Charts
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="monitoring-tab" data-bs-toggle="tab" data-bs-target="#monitoring" type="button" role="tab" aria-controls="monitoring" aria-selected="false">
                        <i class="bi bi-check2-square fs-6"></i> Monitoring Checklist
                    </button>
                </li>
            </ul>
        </div>

        {{-- TAB CONTENT CONTAINER --}}
        <div class="tab-content" id="dashboardTabContent">

            {{-- TAB 1: INCOMPLETE DATA --}}
            <div class="tab-pane fade show active" id="incomplete" role="tabpanel" aria-labelledby="incomplete-tab" tabindex="0">
                <div class="dashboard-card-container">
                    @include('dashboard.tabs.incomplete')
                </div>
            </div>

            {{-- TAB 2: STATISTICS & CHARTS --}}
            <div class="tab-pane fade" id="statistics" role="tabpanel" aria-labelledby="statistics-tab" tabindex="0">
                <div class="dashboard-card-container">
                    @include('dashboard.tabs.statistics')
                </div>
            </div>

            {{-- TAB 3: MONITORING CHECKLIST --}}
            <div class="tab-pane fade" id="monitoring" role="tabpanel" aria-labelledby="monitoring-tab" tabindex="0">
                <div class="dashboard-card-container">
                    @include('dashboard.tabs.monitoring')
                </div>
            </div>

        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const documentData = @json($documentChart);

    // Singkatan nama dokumen pada sumbu X
    const labels = documentData.map(item => {
        const abbreviations = {
            'PROPOSAL': 'PROP',
            'KONTRAK': 'KON'
        };

        return abbreviations[item.code] || item.code;
    });

    const totalData = documentData.map(item => Number(item.total));
    const verifiedData = documentData.map(item => Number(item.verified));

    const canvas = document.getElementById('documentComparisonChart');

    if (!canvas) return;

    new Chart(canvas, {
        type: 'line',

        data: {
            labels: labels,

            datasets: [
                {
                    label: 'Total Data',
                    data: totalData,
                    borderColor: '#1e3a8a',
                    backgroundColor: 'rgba(30, 58, 138, 0.08)',
                    borderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: '#1e3a8a',
                    tension: 0.35,
                    fill: false
                },
                {
                    label: 'Terpenuhi',
                    data: verifiedData,
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.08)',
                    borderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: '#10b981',
                    tension: 0.35,
                    fill: false
                }
            ]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            interaction: {
                intersect: false,
                mode: 'index'
            },

            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        font: {
                            size: 11
                        }
                    }
                },

                tooltip: {
                    backgroundColor: '#1e293b',
                    padding: 12,
                    displayColors: true
                }
            },

            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Document Type'
                    }
                },

                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    },
                    title: {
                        display: true,
                        text: 'Number of Documents'
                    }
                }
            }
        }
    });

});
</script>

@endsection