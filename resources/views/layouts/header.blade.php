<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <!-- Logo -->
            <a class="navbar-brand" href="dashboard.html">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('admin/plugins/images/logo-icon.png') }}" alt="homepage" />
                </b>
                <!--End Logo icon -->

                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <img src="{{ asset('admin/plugins/images/logo-text.png') }}" alt="homepage" />
                </span>
            </a>
            <!-- End Logo -->

            <!-- toggle and nav items -->
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav d-none d-md-block d-lg-none">
                <li class="nav-item">
                    <a class="nav-toggler nav-link waves-effect waves-light text-white" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </li>
            </ul>

            <!-- Right side toggle and nav items -->
            <ul class="navbar-nav ms-auto d-flex align-items-center">

                <!-- Search -->
                {{-- <li class=" in">
                    <form role="search" class="app-search d-none d-md-block me-3">
                        <input type="text" placeholder="Search..." class="form-control mt-0">
                        <a href="" class="active">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </li> --}}

                <!-- User profile and search -->
                <li>
                    <div class="dropdown">
                        <a class="profile-pic dropdown-toggle"  href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('admin/plugins/images/users/varun.jpg') }}" alt="user-img" width="36" class="img-circle">
                            <span class="text-white font-medium">{{ Auth::user()->username }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/profile" class="dropdown-item">Profile</a></li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <li><button class="dropdown-item" type="submit">Logout</button></li>
                            </form>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
