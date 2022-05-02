<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ $path_main }}">
        <div class="sidebar-brand-icon">
            <!-- <i class="fas fa-laugh-wink"></i> -->
            <img src ="{{ $path_img }}/Logo_Mitra_lingkaran.png" alt="" width="50%">
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ $path_main }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Admin Screens:</h6>
                <a class="collapse-item" href="{{ $path_registrasi }}">Register</a>
                <a class="collapse-item" href="{{ $path_login }}">Login</a>
                {{-- <a class="collapse-item" href="#">Forgot Password</a> --}}
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="{{ $path_web_gemol}}">Website Gemol</a>
                <!-- <a class="collapse-item" href="404.php">404 Page</a>
                <a class="collapse-item" href="blank.php">Blank Page</a> -->
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-table"></i>
            <span>Edit</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Items:</h6>
                <a class="collapse-item" href="{{ $path_brg }}">barang</a>
                {{-- <a class="collapse-item" href="#">jenis barang</a> --}}
                <a class="collapse-item" href="{{ $path_pembeli }}">pembeli</a>
                <a class="collapse-item" href="{{ $path_penjualan }}">penjualan</a>
                <a class="collapse-item" href="{{ $path_pengeluaran }}">pengeluaran</a>
                <a class="collapse-item" href="{{ $path_ulasan }}">ulasan</a>
                <a class="collapse-item" href="{{ $path_testimoni }}">testimoni</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
