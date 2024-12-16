<!DOCTYPE html>
<html lang="id" class="light-style layout-menu-fixed" dir="ltr" 
      data-theme="theme-default" 
      data-assets-path="{{ asset('assets/') }}" 
      data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Aplikasi Farma Optical | Sistem Informasi Farma Optical</title>
    <meta name="description" content="Sistem manajemen karyawan terintegrasi" />

    <!-- Include your custom styles here -->
    @include('admin.styles.style')

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!-- Config: Mandatory theme config file -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('dashboard') }}" class="app-brand-link">
                        <h1 class="h4">Sistem Informasi Farma Optical</h1>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Menu SDM -->
                    <li class="menu-item">
                        <a href="#" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-group"></i>
                            <div data-i18n="Menu SDM">Sumber Daya Manusia</div>
                        </a>
                        <ul class="menu-sub">

                            @can('show employees') 
                            <li class="menu-item">
                                <a href="{{ route('employees.index') }}" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-user"></i>
                                    <div>Karyawan</div>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>

                    <!-- Customer Relationship Management -->
                    <li class="menu-item">
                        <a href="#" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user-voice"></i>
                            <div data-i18n="Menu CRM">Patient Relationship Management</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('pasiens.index') }}" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-user-plus fa-2x text-secondary"></i>
                                    <div>Data Patien</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('promotions.index') }}" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-gift"></i>
                                    <div>Promosi</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('lensas.index') }}" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-circle fa-2x text-purple"></i>
                                    <div>Lensa</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('frames.index') }}" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-glasses fa-2x text-dark"></i>
                                    <div>Frame</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('send-promotions.index') }}" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-mail-send"></i>
                                    <div>Kirim Promosi</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Manajemen Pengguna -->
                   
                    <li class="menu-item">
                        <a href="#" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-cog"></i>
                            <div data-i18n="Menu Pengaturan">Human Department</div>
                        </a>
                        <ul class="menu-sub">
                            @can('show users')
                            <li class="menu-item">
                                <a href="{{ route('users.index') }}" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-user"></i>
                                    <div>Pengguna</div>
                                </a>
                            </li>
                            @endcan

                            @can('show roles')
                            <li class="menu-item">
                                <a href="{{ route('roles.index') }}" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-key"></i>
                                    <div>Peran & Hak Akses</div>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Cari..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                    <small class="text-muted">{{ Auth::user()->roles->first()->name }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">Profil Saya</span>
                                        </a>
                                    </li>
                                    <li>
                                        {{-- <a class="dropdown-item" href="{{ route('profile.settings') }}"> --}}
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Pengaturan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}" 
                                               onclick="event.preventDefault(); this.closest('form').submit();">
                                                <i class="bx bx-power-off me-2"></i>
                                                <span class="align-middle">Keluar</span>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Main Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                    <!-- / Main Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                © <script>document.write(new Date().getFullYear());</script>
                                Sistem Informasi Farma Optical - Dibuat dengan <i class='bx bxs-heart' style='color:#ff0000'></i> oleh
                                <a href="#" target="_blank" class="footer-link fw-bolder">Tim Pengembang</a>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->
                    <div class="content-backdrop fade"></div>
                </div>
                <!-- / Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Include your custom scripts here -->
    @include('admin.scripts.script')

</body>
</html>