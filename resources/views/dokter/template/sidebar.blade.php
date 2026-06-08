<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dokter.dashboard') }}" class="brand-link">
        <i class="fas fa-hospital-user fa-lg" style="color: #ffffff;"></i>
        <span class="brand-text font-weight-light" style="margin-left: 8px;">Halaman Dokter</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Kelola data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dokter.antrian.index') }}" class="nav-link {{ request()->routeIs('dokter.spesialis.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-stethoscope"></i>
                                <p>Antrian</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>