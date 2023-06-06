        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <div class="sidebar-brand-text mx-3">MONAA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

			<!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('stat') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Statistic</span></a>
            </li>


			<!-- Divider -->
            <hr class="sidebar-divider">

			<!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('locadm') }}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Daftar Lokasi ADM</span></a>
            </li>

			<!-- Divider -->
            <hr class="sidebar-divider">

			<!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('inputdata') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Input Data</span></a>
            </li>

			{{-- <!-- Divider -->
            <hr class="sidebar-divider">

			<!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('user') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User</span></a>
            </li> --}}

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->