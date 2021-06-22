<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <base href="{{ url('/') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - {{ env('APP_NAME', 'CEGU') }} </title>
    <link rel="shortcut icon" href="favicon.ico" />

    <link href="dist/css/style.min.css" rel="stylesheet">

    @yield('css')
    
    <style>
        .bg-footer {
            background-color: #efefef;
        }
    </style>
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <a class="navbar-brand" href="{{ route('landing') }}">
                        <b class="logo-icon">
                            <img src="img/header-logo.png" alt="homepage" class="dark-logo" />
                            <img src="img/header-logo.png" alt="homepage" class="light-logo" />
                        </b>
                        <span class="logo-text">
                            <img src="img/header-text-dark.png" alt="homepage" class="dark-logo" />
                            <img src="img/header-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav float-right">
                        @guest
                        <li class="nav-item d-flex align-items-center">
                            @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="btn waves-effect waves-light btn-rounded btn-outline-light mr-2 px-5">Masuk</a>
                            @endif
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn waves-effect waves-light btn-rounded btn-danger px-5">Daftar</a>
                            @endif
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">

                                <span class="font-weight-bold text-light mr-2">{{ Auth::user()['name'] }}</span>
                                <img src="https://ui-avatars.com/api/?bold=true&background=FFFFFF&color=10bed2&name={{ Auth::user()['name'] }}" alt="user" class="rounded-circle" width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-info"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-info text-white m-b-10">
                                    <div class="">
                                        <img src="https://ui-avatars.com/api/?bold=true&background=FFFFFF&color=10bed2&name={{ Auth::user()['name'] }}" alt="user" class="rounded-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">{{ Auth::user()['name'] }}</h4>
                                        <p class=" m-b-0">{{ Auth::user()['email'] }}</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="ti-user m-r-5 m-l-5"></i>
                                    Profil Saya
                                </a>
                                <a class="dropdown-item" href="{{ route('booking.index') }}">
                                    <i class="ti-book m-r-5 m-l-5"></i>
                                    Riwayat Booking
                                </a>
                                <a class="dropdown-item" href="{{ route('notification.user') }}">
                                    <i class="ti-announcement m-r-5 m-l-5"></i>
                                    Notifikasi
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i>
                                    Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{ route('index') }}" aria-expanded="false"><i class="icon-File-Hide"></i><span class="hide-menu">List Gedung</span></a></li>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Personal</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-Car-Wheel"></i><span class="hide-menu">Dashboard </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{ route('index') }}" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Dashboard 1 </span></a></li>
                                <li class="sidebar-item"><a href="index2.html" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Dashboard 2 </span></a></li>
                                <li class="sidebar-item"><a href="index3.html" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu"> Dashboard 3 </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-Increase-Inedit"></i><span class="hide-menu">Multi Level DD</span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> item 1.1</span></a></li>
                                <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> item 1.2</span></a></li>
                                <li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-playlist-plus"></i> <span class="hide-menu">Menu 1.3</span></a>
                                    <ul aria-expanded="false" class="collapse second-level">
                                        <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> item 1.3.1</span></a></li>
                                        <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> item 1.3.2</span></a></li>
                                        <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> item 1.3.3</span></a></li>
                                        <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-octagram"></i><span class="hide-menu"> item 1.3.4</span></a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-playlist-check"></i><span class="hide-menu"> item 1.4</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 align-self-center">
                        <h3 class="page-title text-info font-weight-bold">@yield('header')</h3>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @include('alert')
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>


    <footer class="footer bg-footer">
        <div class="container">
            <div class="row py-4">
                <div class="col-12 col-lg-6">
                    <div class="d-flex mb-3">
                        <div class="mr-3 align-items-center">
                            <i class="ti-home text-info"></i>
                        </div>
                        <div class="align-items-center">
                            Jl. Telekomunikasi Jl. Terusan Buah Batu, Sukapura, Kec. Dayeuhkolot, Kota Bandung, Jawa Barat 40257
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="mr-3 align-items-center">
                            <i class="ti-pin-alt text-info"></i>
                        </div>
                        <div class="align-items-center">
                            +62812 1234 5678 9876
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 text-lg-right text-center">
                    <h3 class="text-info">
                        - Our Vision -
                    </h3>
                    <h5>Buatlah dirimu merasa aman dan nyaman dengan gedung dan ruangan kami</h5>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-center">
            All Rights Reserved by AdminBite admin. Designed and Developed by
            <a href="https://wrappixel.com">WrapPixel</a>.
        </div>
    </footer>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.init.horizontal.js"></script>
    <script src="dist/js/app-style-switcher.horizontal.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="dist/js/waves.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>

    @yield('js')

    <script>
        $('#main-wrapper').attr("data-header-position", 'fixed' );
        $('#main-wrapper').attr("data-sidebar-position", 'fixed' );
        $('.topbar .top-navbar .navbar-header').attr("data-navheader", 'fixed' );
    </script>

</body>
</html>
