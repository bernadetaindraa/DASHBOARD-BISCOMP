<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Business Compliance Dashboard')</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --brand-navy: #1E2229;
            --brand-blue: #0052B4;
            --brand-teal: #00A389;
            --bg-light: #F8FAFC;
            --text-main: #1E293B;
            --text-muted: #64748B;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-main);
            font-size: 14px; /* Maksimal font 14pt */
            -webkit-font-smoothing: antialiased;
        }

        /* Top Navbar Sederhana & Bersih */
        .top-navbar {
            background: #ffffff;
            border-bottom: 1px solid #E2E8F0;
            padding: 0.55rem 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.01);
            z-index: 1030;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1rem; /* 14pt */
            letter-spacing: 0.5px;
            color: var(--brand-navy) !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-logo-wrapper img {
            height: 26px;
            width: auto;
        }

        /* Menu Navigasi & Hover Lembut */
        .top-navbar .nav-link {
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.875rem; /* 14pt */
            padding: 0.5rem 0.85rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .top-navbar .nav-link:hover {
            color: var(--brand-blue);
            background: #F1F5F9;
        }

        .top-navbar .nav-link.active {
            color: #ffffff !important;
            background: var(--brand-blue);
            box-shadow: 0 4px 12px rgba(0, 82, 180, 0.2);
        }

        /* Search Bar Sederhana */
        .navbar-search {
            background: #F8FAFC;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            padding: 5px 12px;
            display: flex;
            align-items: center;
            width: 200px;
        }

        .navbar-search input {
            background: transparent;
            border: none;
            outline: none;
            font-size: 0.85rem;
            width: 100%;
            color: var(--text-main);
            padding-left: 6px;
        }

        .navbar-search kbd {
            background: #E2E8F0;
            color: #475569;
            font-size: 10px;
            padding: 2px 5px;
            border-radius: 4px;
            font-weight: 600;
        }

        /* Tombol Ikon & Profil */
        .nav-icon-btn {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: #F8FAFC;
            border: 1px solid #E2E8F0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            position: relative;
            cursor: pointer;
            transition: all 0.2s;
        }

        .nav-icon-btn:hover {
            background: #F1F5F9;
            color: var(--brand-blue);
        }

        .avatar-initials {
            width: 35px;
            height: 35px;
            background: #475569;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.8rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dropdown-menu {
            font-size: 0.875rem; /* 14pt */
        }

        .module-badge {
            background: rgba(0, 82, 180, 0.08);
            color: var(--brand-blue);
            border: 1px solid rgba(0, 82, 180, 0.15);
            font-size: 0.75rem;
            font-weight: 700;
            padding: 5px 10px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Responsif: Layar < 992px Navbar berubah menjadi Sidebar di Kiri */
        @media (max-width: 991.98px) {
            .top-navbar .navbar-collapse {
                position: fixed;
                top: 0;
                left: -280px;
                width: 270px;
                height: 100vh;
                background: #ffffff;
                box-shadow: 4px 0 20px rgba(15, 23, 42, 0.12);
                transition: left 0.3s ease-in-out;
                display: flex !important;
                flex-direction: column;
                align-items: stretch;
                padding: 1.25rem 1rem;
                z-index: 1050;
                overflow-y: auto;
            }

            .top-navbar .navbar-collapse.show {
                left: 0;
            }

            .sidebar-header-mobile {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding-bottom: 1rem;
                margin-bottom: 1rem;
                border-bottom: 1px solid #E2E8F0;
            }

            .navbar-search {
                width: 100%;
            }

            .sidebar-backdrop {
                position: fixed;
                inset: 0;
                background: rgba(15, 23, 42, 0.45);
                z-index: 1040;
                display: none;
            }

            .sidebar-backdrop.show {
                display: block;
            }
        }

        @media (min-width: 992px) {
            .sidebar-header-mobile,
            .sidebar-backdrop {
                display: none !important;
            }
            .border-lg-0 {
                border: none !important;
            }
        }

        /* Header Section */
        .page-header {
            background: #ffffff;
            border-bottom: 1px solid #E2E8F0;
            padding: 1.25rem 0;
            margin-bottom: 1.75rem;
        }

        .page-header h4 {
            font-size: 1rem; /* Maksimal 14pt */
        }

        /* Content Card Modern */
        .content-card {
            background: #ffffff;
            border: none;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
            margin-bottom: 24px;
        }

        .stat-card {
            border: none;
            border-radius: 16px;
            padding: 22px;
            height: 100%;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            position: relative;
            overflow: hidden;
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
        }

        .stat-card-primary {
            background: linear-gradient(135deg, var(--brand-navy) 0%, var(--brand-blue) 100%);
            color: #ffffff;
        }
        .stat-card-primary .stat-label { color: rgba(255, 255, 255, 0.8); }
        .stat-card-primary .stat-icon { background: rgba(255, 255, 255, 0.18); color: #ffffff; }

        .stat-card-teal {
            background: linear-gradient(135deg, #0D9488 0%, var(--brand-teal) 100%);
            color: #ffffff;
        }
        .stat-card-teal .stat-label { color: rgba(255, 255, 255, 0.85); }
        .stat-card-teal .stat-icon { background: rgba(255, 255, 255, 0.2); color: #ffffff; }

        .stat-card-accent-blue {
            border-top: 4px solid var(--brand-blue);
        }
        .stat-card-accent-blue .stat-icon {
            background: rgba(0, 82, 180, 0.1);
            color: var(--brand-blue);
        }

        .stat-card-accent-teal {
            border-top: 4px solid var(--brand-teal);
        }
        .stat-card-accent-teal .stat-icon {
            background: rgba(27, 197, 155, 0.12);
            color: #0F9D7A;
        }

        .stat-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            margin-top: 8px;
            line-height: 1.2;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .table thead th {
            background-color: #F8FAFC;
            color: var(--brand-navy);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #E2E8F0;
            padding: 14px 16px;
        }

        .table tbody td {
            padding: 14px 16px;
            vertical-align: middle;
            border-bottom: 1px solid #F1F5F9;
        }

        .alert {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        }
    </style>
</head>
<body>

    <!-- Memuat Navbar dari file terpisah -->
    @include('layouts.navbar')

    <!-- Page Sub-Header -->
    <div class="page-header">
        <div class="container-fluid px-4 px-lg-5">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
                <div>
                    <h4 class="fw-bold mb-1" style="color: var(--brand-navy);">@yield('heading', 'Dashboard Overview')</h4>
                </div>
                <div>
                    @yield('header-actions')
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container-fluid px-4 px-lg-5 pb-5">
        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
                <i class="bi bi-check-circle-fill fs-5 me-2"></i>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger mb-4" role="alert">
                <div class="d-flex align-items-center fw-bold mb-1">
                    <i class="bi bi-exclamation-triangle-fill fs-5 me-2"></i>
                    <span>Periksa kembali data yang diinput:</span>
                </div>
                <ul class="mb-0 ps-4">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navMenu = document.getElementById('topNavMenu');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarClose = document.getElementById('sidebarClose');
            const sidebarBackdrop = document.getElementById('sidebarBackdrop');

            function toggleSidebar() {
                navMenu.classList.toggle('show');
                sidebarBackdrop.classList.toggle('show');
            }

            if (sidebarToggle) sidebarToggle.addEventListener('click', toggleSidebar);
            if (sidebarClose) sidebarClose.addEventListener('click', toggleSidebar);
            if (sidebarBackdrop) sidebarBackdrop.addEventListener('click', toggleSidebar);
        });
    </script>
    @stack('scripts')
</body>
</html>