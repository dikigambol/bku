<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>BKU | {{ $title }}</title>
    <link rel="icon" href="{{asset('img/icon.png')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-table-sticky-header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-editable.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-modal.css') }}">
    <link rel="stylesheet" href="{{ asset('extensions/filter-control/bootstrap-table-filter-control.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('wc-datepicker/dist/themes/light.css') }}" /> -->
    <!-- <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}"> -->
    <style>
        /* .swal2-popup {
            font-size: 1.6rem !important;
        } */

        *::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        *::-webkit-scrollbar:hover {
            width: 20px;
            height: 20px;
        }

        *::-webkit-scrollbar-track {
            background: transparent;
        }

        *::-webkit-scrollbar-thumb {
            background-color: #b3b3b3;
            border: 0px;
        }

        @keyframes show {
            from {
                bottom: -10px;
            }

            to {
                bottom: 50px;
            }
        }

        #detail {
            position: fixed;
            bottom: 50px;
            right: 20px;
            z-index: 5;
            animation-name: show;
            animation-duration: 0.5s;
        }
    </style>
    @yield('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed @yield('navbar') @yield('sidemenu')">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('img/icon.png')}}" alt="AdminLTELogo" width="200">
            <p class="mt-2" style="font-size: 1.5em;">Sedang memuat harap tunggu</p>
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item d-inline-flex">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    <p style="font-size: 1.7em;" class="my-0">
                        <?php if (isset($title)) { ?>
                            <?= $title ?>
                        <?php } ?>
                    </p>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link text-decoration-none">
                <img src="{{asset('img/logo.jpg')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text <?= $title == 'Dashboard' ? 'font-weight-medium' : 'font-weight-light' ?>">BKU</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-1 mb-3 d-flex">
                    <div class="image">
                        <?php
                        $nmlk = $auth->fullname;
                        $words = explode(' ', $nmlk);
                        if (count($words) > 1) {
                            $nmini = strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1));
                        } else {
                            $nmini = strtoupper(substr($words[0], 0, 1));
                        }
                        ?>
                        <p class="img-circle elevation-2 inisial m-0 text-center py-1" style="color: white; width: 30px;"><?= $nmini ?></p>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block text-light text-decoration-none">
                            {{$auth->fullname}}
                        </a>
                        <small class="my-0 text-light">
                            @if (Auth::user()->role == 1)
                            {{'Administrator'}}
                            @elseif (Auth::user()->role == 2)
                            {{'BP'}}
                            @else
                            {{'BPP'}}
                            @endif
                        </small>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link d-flex @yield('v_kegiatan')" style="align-items: center;">
                                <ion-icon name="grid" class="nav-icon"></ion-icon>
                                @if (Auth::user()->role == 1 || Auth::user()->role == 2 )
                                <p>Upload RKAK/L</p>
                                @else
                                <p>RKAK/L</p>
                                @endif
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="{{ url('/report') }}" class="nav-link d-flex @yield('report')" style="align-items: center;">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Laporan</p>
                            </a>
                        </li> -->

                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); this.style.cssText = 'pointer-events:none;'" class="nav-link d-flex" style="align-items: center;">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <i class="fas fa-sign-out-alt nav-icon text-danger"></i>
                                <p>Logout</p>
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
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.20.2/dist/bootstrap-table.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('js/bootstrap-table-sticky-header.js') }}"></script>
    <script src="{{ asset('js/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table-editable.js') }}"></script>
    <script src="{{ asset('extensions/filter-control/bootstrap-table-filter-control.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
    <!-- <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('wc-datepicker/dist/esm/wc-datepicker.js') }}" type="module"></script>
    <script>
        var name = '@json($auth->fullname)'
        $(document).ready(function() {
            var randomNumber = name.charCodeAt(1)
            console.log(randomNumber)
            var myElement = document.querySelector(".inisial")
            myElement.style.background = `hsl(${randomNumber}, 100%, 40%)`
        })
    </script>
    @yield('script')
</body>

</html>