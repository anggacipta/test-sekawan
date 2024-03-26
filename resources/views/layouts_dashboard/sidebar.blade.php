<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                 class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                   data-bs-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                    <li>
                        <a href="/dashboard">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="badge bg-success rounded-pill float-end">4</span>
                            <span> Dashboards </span>
                        </a>
                    </li>
                @elseif(\Illuminate\Support\Facades\Auth::user()->role == 'atasan')
                    <li>
                        <a href="/atasan/dashboard">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="badge bg-success rounded-pill float-end">4</span>
                            <span> Dashboards </span>
                        </a>
                    </li>
                @endif


                <li class="menu-title mt-2">Apps</li>

                @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                    <li>
                        <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                            <i class="mdi mdi-car"></i>
                            <span> Kendaraan </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEcommerce">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('kendaraan.tambah') }}">Tambah Kendaraan</a>
                                </li>
                                <li>
                                    <a href="{{ route('kendaraan.index') }}">Tabel Kendaraan</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarCrm" data-bs-toggle="collapse">
                            <i class="mdi mdi-steering"></i>
                            <span> Pengendara </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarCrm">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('pengendara.tambah') }}">Tambah Pengendara</a>
                                </li>
                                <li>
                                    <a href="{{ route('pengendara.index') }}">Tabel Pengendara</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarEmail" data-bs-toggle="collapse">
                            <i class="mdi mdi-email-multiple-outline"></i>
                            <span> Persetujuan </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEmail">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('pemesanan.index') }}">Persetujuan</a>
                                </li>
                                <li>
                                    <a href="{{ route('pemesanan.tambah') }}">Tambah Pemesanan</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @elseif(\Illuminate\Support\Facades\Auth::user()->role == 'atasan')
                    <li>
                        <a href="#sidebarEmail" data-bs-toggle="collapse">
                            <i class="mdi mdi-email-multiple-outline"></i>
                            <span> Persetujuan </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarEmail">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('pemesanan.index.atasan') }}">Persetujuan</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif




            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
