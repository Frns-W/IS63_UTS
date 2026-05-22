<!-- Sidebar (Navigasi Samping) -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-coffee"></i>
        </div>
        <div class="sidebar-brand-survey mx-3">Cafe Kita</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">Manajemen Data</div>

    <!-- Nav Item - Menu -->
    <li class="nav-item {{ Request::is('menu*') ? 'active' : '' }}">
        <a class="nav-link" href="/menu">
            <i class="fas fa-fw fa-list"></i>
            <span>Daftar Menu</span></a>
    </li>

    <!-- Nav Item - Kategori -->
    <li class="nav-item {{ Request::is('categories*') ? 'active' : '' }}">
        <a class="nav-link" href="/categories">
            <i class="fas fa-fw fa-tags"></i>
            <span>Data Kategori</span></a>
    </li>

    <!-- Nav Item - Orders -->
    <li class="nav-item {{ Request::is('orders') ? 'active' : '' }}">
        <a class="nav-link" href="/orders">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Riwayat Order</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
</ul>
<!-- End of Sidebar -->
