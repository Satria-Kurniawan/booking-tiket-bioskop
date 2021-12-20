{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Signika' rel='stylesheet'>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.1.0/') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.1.0/') }}/dist/css/adminlte.min.css">

    {{-- CSS ku --}}
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}">

    {{-- Untuk Toastr --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body class="sidebar-mini">

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white" style="font-family: Signika">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" class="nav-link">Beranda</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline" method="GET" action="{{ url('/pencarian-data') }}">
                            <div class="input-group input-group-sm bg-white">
                                <input class="form-control form-control-navbar" name="kueri" type="search"
                                    placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-outline-danger" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="font-family: Signika">
            <!-- Brand Logo -->
            {{-- <img src="/img/LogoSat.png"  class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
            
            {{-- <div class="ml-4 mt-3 text-light">
                {{ Auth::user()->name }}
            </div> --}}

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item border-bottom">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user"></i>
                                <p>{{ Auth::user()->name }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/') }}"
                                class="nav-link">
                                <i class="fas fa-window-restore" style="color:rgb(0, 110, 255)"></i>
                                <p>| Beranda</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('kategori') }}"
                                class="nav-link {{ Route::is('kategori') ? 'active' : '' }}">
                                <i class="fas fa-list" style="color: rgb(255, 255, 255)"></i>
                                <p>| Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('film') }}"
                                class="nav-link {{ Route::is('postingan') ? 'active' : '' }}">
                                <i class="fa fa-film" style="color: rgb(115, 255, 0)"></i>
                                <p>| Manajemen Film</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pemesanan') }}"
                                class="nav-link {{ Route::is('postingan') ? 'active' : '' }}">
                                <i class="fa fa-shopping-cart" style="color: rgb(255, 94, 1)"></i>
                                <p>| Pemesanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('transaksi') }}"
                                class="nav-link {{ Route::is('postingan') ? 'active' : '' }}">
                                <i class="fas fa-pager" style="color: rgb(255, 0, 200)"></i>
                                <p>| History Transaksi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('detail-transaksi') }}"
                                class="nav-link {{ Route::is('postingan') ? 'active' : '' }}">
                                <i class="fas fa-pager" style="color: rgb(255, 2, 129)"></i>
                                <p>| Detail Transaksi</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>

            {{-- <footer class="footer py-3 bg-dark fixed-bottom">
      <div class="container-fluid">
          <div class="row">
              <div class="sosial col-12 text-right">
                  <a href="https://www.instagram.com/saatryaaa__/"><i class="fab fa-instagram mr-3"></i></a>
                  <a href="https://www.facebook.com/satria.kurniawan.3726"><i class="fab fa-facebook mr-3"></i></a>
                  <a href="#"><i class="fab fa-twitter mr-3"></i></a>
              </div>
          </div>
      </div>
    </footer> --}}

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('AdminLTE-3.1.0/') }}/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('AdminLTE-3.1.0/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('AdminLTE-3.1.0/') }}/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('AdminLTE-3.1.0/') }}/dist/js/demo.js"></script>
</body>

</html>

<script>
    @if (Session::has('success'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.success("{{ session('success') }}");
    @endif
    @if (Session::has('error'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.error("{{ session('error') }}");
    @endif
    @if (Session::has('info'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.info("{{ session('info') }}");
    @endif
    @if (Session::has('warning'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
    // Image Priview
    $(document).ready(function(e) {
        $('#image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>