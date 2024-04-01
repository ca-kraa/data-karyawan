<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard <sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if (request()->is('/')) active @endif">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Charts -->
    <li class="nav-item @if (request()->is('karyawan')) active @endif">
        <a class="nav-link" href="/karyawan">
            <i class="fas fa-fw fa-user"></i>
            <span>Karyawan</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item @if (request()->is('jabatan')) active @endif">
        <a class="nav-link" href="/jabatan">
            <i class="fas fa-fw fa-scroll"></i>
            <span>Jabatan</span></a>
    </li>

    <li class="nav-item @if (request()->is('jabatan')) active @endif">
        <a class="nav-link" href="/departmen">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Departemen</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
<!-- End of Sidebar -->