<!-- Backdrop Gelap untuk Sidebar Mobile -->
<div class="sidebar-backdrop" id="sidebarBackdrop"></div>

<!-- Top Navigation Bar -->
<nav class="navbar navbar-expand-lg top-navbar sticky-top">
    <div class="container-fluid px-4 px-lg-5">
        
        <!-- Kiri: Tombol Hamburger (Layar Kecil) & Brand Logo -->
        <div class="d-flex align-items-center gap-2">
            <button class="navbar-toggler border-0 p-1 shadow-none" type="button" id="sidebarToggle" aria-label="Toggle navigation">
                <i class="bi bi-list fs-2 text-dark"></i>
            </button>

            <a class="navbar-brand me-lg-4" href="{{ route('dashboard') }}">
                <div class="brand-logo-wrapper">
                    <img src="{{ asset('images/gdps-icon.webp') }}" alt="GDPS Logo">
                </div>
                <span style="letter-spacing: 0.8px;">BCOMP</span>
            </a>
        </div>

        <!-- Menu Utama: Di Desktop tampil horizontal, di Layar Kecil jadi Sidebar Kiri -->
        <div class="collapse navbar-collapse order-3 order-lg-2" id="topNavMenu">
            
            <!-- Header Sidebar (Hanya muncul saat layar diperkecil) -->
            <div class="sidebar-header-mobile">
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <div class="brand-logo-wrapper">
                        <img src="{{ asset('images/gdps-icon.webp') }}" alt="GDPS Logo">
                    </div>
                    <span style="letter-spacing: 0.8px;">BCOMP</span>
                </a>
                <button type="button" class="btn-close shadow-none" id="sidebarClose" aria-label="Close"></button>
            </div>

            <!-- Link Navigasi -->
            <ul class="navbar-nav me-auto mb-3 mb-lg-0 gap-1">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" 
                       class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2-fill"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('projects.index') }}" 
                       class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                        <i class="bi bi-folder-check"></i> Project
                    </a>
                </li>
            </ul>

            <!-- Search Bar & Modul Badge (Ikut masuk ke Sidebar saat layar kecil) -->
            <div class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center gap-2 gap-lg-3 me-lg-3 mt-auto mt-lg-0 pt-3 pt-lg-0 border-top border-lg-0">
                <!-- Search Bar Cepat -->
                <div class="navbar-search">
                    <i class="bi bi-search text-muted"></i>
                    <input type="text" placeholder="Search">
                    <kbd class="d-none d-lg-inline">Ctrl K</kbd>
                </div>

                <!-- Modul Badge -->
                <div class="module-badge justify-content-center justify-content-lg-start">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                    <span>BComp</span>
                </div>
            </div>
        </div>

        <!-- Bagian Kanan: Notifikasi & Profil (Tetap di Navbar Kanan, TIDAK masuk sidebar) -->
        <div class="d-flex align-items-center gap-2 gap-sm-3 order-2 order-lg-3">
            
            <!-- Notifikasi -->
            <div class="nav-icon-btn" title="Notifikasi">
                <i class="bi bi-bell"></i>
                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
            </div>

            <!-- Profil Pengguna -->
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar-initials">
                        {{ auth()->check() ? strtoupper(substr(auth()->user()->name ?? 'GD', 0, 2)) : 'GD' }}
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-3 mt-2">
                    <li>
                        <h6 class="dropdown-header">{{ auth()->user()->name ?? 'Garuda Daya Pratama' }}</h6>
                    </li>
                    <li>
                        <a class="dropdown-item py-2" href="#"><i class="bi bi-person-circle me-2"></i> Profil Saya</a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger py-2">
                                <i class="bi bi-box-arrow-right me-2"></i> Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</nav>