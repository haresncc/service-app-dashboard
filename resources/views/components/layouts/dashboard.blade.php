@props([
    'displayNav' => true,
    'defaultHeader' => true,
    'displayFooter' => true,
    'title' => '',
])
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    @if (app()->getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('dist/css/adminltertl.min.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @if ($title == 'Services')
        <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    @endif
</head>

<body @class([
    'hold-transition sidebar-mini',
    'dark-mode' => Auth::user()->mode === 'Dark',
])>
    <div class="wrapper">

        <!-- Navbar -->
        <nav @class([
            'main-header navbar navbar-expand py-0',
            'navbar-light' => Auth::user()->mode !== 'Dark',
            'navbar-dark' => Auth::user()->mode === 'Dark',
            'd-none' => !$displayNav,
            // 'bg-secondary' => env('APP_ENV') == 'local',
        ])>
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-sm-inline-block">
                    <div class="btn-group">
                        <div class="image" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="user-panel mt-1 d-flex">
                                <div class="image">
                                    <img src="{{ isset(Auth::user()->profile_img) ? asset('uploads/' . Auth::user()->profile_img) : asset('dist/img/user2-160x160.jpg') }}"
                                        class="img-circle elevation-2" style="height: 2.1rem" alt="User Image">
                                </div>
                                <p class="ml-2 my-0"><small>{{ Auth::user()->name }}</small></p>
                                <i class="fas fa-angle-down p-2"></i>
                            </div>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}"
                                target="_blank">{{ __('Profile') }}</a>
                            <div class="dropdown-divider my-1"></div>
                            <div class="dropdown-divider my-1"></div>
                            <form class="dropdown-item" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link class="dropdown-item py1 px-2" :href="route('logout')"
                                    onclick="event.preventDefault();this.closest('form').submit();">
                                    {{ __('LogOut') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->

                <!-- Messages Dropdown Menu -->
                <!-- Notifications Dropdown Menu -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside @class([
            'main-sidebar elevation-4',
            'sidebar-dark-primary bkgslide' => Auth::user()->mode !== 'Dark',
            'sidebar-dark' => Auth::user()->mode === 'Dark',
        ])>
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link py-2">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar" style="min-height: calc(100vh - 47px);">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.sub-categories.index') }}"
                                    class="nav-link {{ str_contains(Route::currentRouteName(), 'sub-categories') ? 'active' : '' }}">
                                    <i class="fas fa-stream nav-icon"></i>
                                    <p>{{ __('SubCategory') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.services.index') }}"
                                    class="nav-link {{ str_contains(Route::currentRouteName(), 'services') ? 'active' : '' }}">
                                    <i class="far fa-calendar-plus nav-icon"></i>
                                    <p>{{ __('Services') }}</p>
                                </a>
                            </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div @class([
            'content-wrapper',
            'bg-white' => Auth::user()->mode !== 'Dark',
        ])>
            <!-- Content Header (Page header) -->
            <div class="content-header py-2">
                <div class="container-fluid">
                    {{ $smart ?? '' }}
                    <div @class(['row mb-1', 'd-none' => !$defaultHeader])>
                        <div class="col-sm-4">
                            <h1 class="m-0 font-weight-normal">{{ $title ?? '' }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-4 text-center">
                            {{ $btn ?? '' }}
                        </div><!-- /.col -->
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('dashboard.index') }}">{{ __('Home') }}</a></li>
                                {{ $breadcrumb ?? '' }}
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div @class(['content', 'pb-3' => $title == 'Services'])>
                <div class="container-fluid">
                    {{ $slot }}
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer @class(['main-footer py-1', 'd-none' => !$displayFooter])>
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2022-2024 <a href="#">Eng: Hares Moahmed</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    @if ($title != 'Services')
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    @else
        <script src="{{ asset('plugins/jquery/jquery7.min.js') }}"></script>
        <script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
    @endif
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script>
        function confirmDelFn() {
            if (!confirm("{{ __('Are You Sure') . ' ' . __('Delete') }}"))
                event.preventDefault();
        }

        function confirmDownldFn() {
            if (!confirm("{{ __('Are You Sure') . ' ' . __('Download') }}"))
                event.preventDefault();
        }

        function confirmDeliverFn() {
            if (!confirm("{{ __('Are You Sure') . ' ' . __('deliver') }}"))
                event.preventDefault();
        }
    </script>
    @stack('custom-scripts')
</body>

</html>
