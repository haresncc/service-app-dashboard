<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

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
    @stack('custom-style')
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
        ]) @yield('dishead')>
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard.index') }}" class="nav-link">Home</a>
      </li> --}}
                {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('profile.edit') }}" class="nav-link">{{ __('Profile') }}</a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button onclick="">logut</button>
        </form>
      </li> --}}
                <li class="nav-item d-sm-inline-block">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link class="nav-link" :href="route('logout')"
                            onclick="event.preventDefault();
                              this.closest('form').submit();">
                            {{ __('LogOut') }}
                        </x-dropdown-link>
                    </form>
                </li>
                {{-- @if (Auth::user()->type === 'Super Admin')
                    <li class="nav-item d-none d-sm-inline-block">
                        <x-nav-link class="nav-link" :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-nav-link>
                    </li>
                @endif --}}

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search" id="searchnav">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside @class([
            'main-sidebar elevation-4',
            'sidebar-dark-primary bkgslide' => Auth::user()->mode !== 'Dark',
            'sidebar-dark' => Auth::user()->mode === 'Dark',
        ])>
            {{-- @style(['background-color: #2f32a9' => Auth::user()->mode !== 'Dark'])> --}}
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link py-2">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar" style="min-height: calc(100vh - 47px);">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-1 pb-2 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" id="searchside">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        {{-- @dd(Route::currentRouteName()) --}}
                        {{-- @dd(in_array(Route::currentRouteName(),['a','x','c'])) --}}
                        {{-- @dd(str_contains(Route::currentRouteName(), 'tariffs')) --}}
                        @can('view settings')
                            @if (str_contains(Route::currentRouteName(), 'tariffs') or
                                    str_contains(Route::currentRouteName(), 'services') or
                                    str_contains(Route::currentRouteName(), 'lineaccounts') or
                                    str_contains(Route::currentRouteName(), 'levels') or
                                    str_contains(Route::currentRouteName(), 'levbranchs'))
                                <li class="nav-item menu-open">
                                @else
                                <li class="nav-item menu-close">
                            @endif
                            <a href="#" class="nav-link ">
                                {{-- <i class="fas fa-user-cog nav-icon"></i> --}}
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    {{ __('Settings') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('view tariffs')
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.tariffs.index') }}"
                                            class="nav-link {{ str_contains(Route::currentRouteName(), 'tariffs') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Tariffs') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view services')
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.services.index') }}"
                                            class="nav-link {{ str_contains(Route::currentRouteName(), 'services') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Services') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view lineaccounts')
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.lineaccounts.index') }}"
                                            class="nav-link {{ str_contains(Route::currentRouteName(), 'lineaccounts') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Line_Accounts') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view levels')
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.levels.index') }}"
                                            class="nav-link {{ str_contains(Route::currentRouteName(), 'levels') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Levels') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view levbranchs')
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.levbranchs.index') }}"
                                            class="nav-link {{ str_contains(Route::currentRouteName(), 'levbranchs') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Levels Branch') }}</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        @endcan
                        @can('view employees')
                            <li class="nav-item ">
                                <a href="{{ route('dashboard.employees.index') }}"
                                    class="nav-link {{ str_contains(Route::currentRouteName(), 'employees') ? 'active' : '' }}">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>{{ __('Employees') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('view supplies')
                            <li class="nav-item ">
                                <a href="{{ route('dashboard.supplies.index') }}"
                                    class="nav-link {{ str_contains(Route::currentRouteName(), 'supplies') ? 'active' : '' }}">
                                    <i class="fas fa-sort-amount-down-alt nav-icon"></i>
                                    <p>{{ __('Supplies') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('view serials')
                            <li class="nav-item ">
                                <a href="{{ route('dashboard.serials.index') }}"
                                    class="nav-link {{ str_contains(Route::currentRouteName(), 'serials') ? 'active' : '' }}">
                                    <i class="fas fa-sim-card nav-icon"></i>
                                    <p>{{ __('Serials') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('view lines')
                            <li class="nav-item ">
                                <a href="{{ route('dashboard.lines.index') }}"
                                    class="nav-link {{ str_contains(Route::currentRouteName(), 'lines') ? 'active' : '' }}">
                                    <i class="fas fa-mobile-alt nav-icon"></i>
                                    <p>{{ __('Lines') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('view customers')
                            <li class="nav-item ">
                                <a href="{{ route('dashboard.customers.index') }}"
                                    class="nav-link {{ str_contains(Route::currentRouteName(), 'customers') ? 'active' : '' }}">
                                    <i class="fas fa-user-tie nav-icon"></i>
                                    <p>{{ __('Customers') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('view sales')
                            <li class="nav-item ">
                                <a href="{{ route('dashboard.sales.index') }}"
                                    class="nav-link {{ str_contains(Route::currentRouteName(), 'sales') ? 'active' : '' }}">
                                    <i class="fas fa-shopping-cart nav-icon"></i>
                                    <p>{{ __('Sales') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('view orders')
                            <li class="nav-item ">
                                <a href="{{ route('dashboard.orders.index') }}"
                                    class="nav-link {{ str_contains(Route::currentRouteName(), 'orders') ? 'active' : '' }}">
                                    <i class="fas fa-exchange-alt nav-icon"></i>
                                    <p>{{ __('Orders') }}</p>
                                </a>
                            </li>
                        @endcan
                        @can('view finances')
                            @if (str_contains(Route::currentRouteName(), 'invoices') or str_contains(Route::currentRouteName(), 'payments'))
                                <li class="nav-item menu-open">
                                @else
                                <li class="nav-item menu-close">
                            @endif
                            <a href="#" class="nav-link ">
                                {{-- <i class="nav-icon fas fa-th"></i> --}}
                                <i class="nav-icon fas fa-money-bill-wave"></i>
                                <p>
                                    {{ __('Finances') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('view invoices')
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.invoices.index') }}"
                                            class="nav-link {{ str_contains(Route::currentRouteName(), 'invoices') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Invoices') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view payments')
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.payments.index') }}"
                                            class="nav-link {{ str_contains(Route::currentRouteName(), 'payments') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Payments') }}</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        @endcan
                        @can('view reports')
                            @if (str_contains(Route::currentRouteName(), 'myreports') or str_contains(Route::currentRouteName(), 'overviews'))
                                <li class="nav-item menu-open">
                                @else
                                <li class="nav-item menu-close">
                            @endif
                            <a href="#" class="nav-link ">
                                {{-- <i class="nav-icon fas fa-th"></i> --}}
                                <i class="fas fa-file-alt nav-icon"></i>
                                <p>
                                    {{ __('Reports') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('view reports-my')
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.myreports.index') }}"
                                            class="nav-link mb-0 py-1 {{ str_contains(Route::currentRouteName(), 'myreports') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('myreports') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view reports-ov')
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.overviews.index') }}"
                                            class="nav-link mb-0 py-1 {{ str_contains(Route::currentRouteName(), 'overviews') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>{{ __('Overviews') }}</p>
                                        </a>
                                    </li>
                                @endcan
                                {{-- <li class="nav-item ">
            <a href="{{ route('dashboard.reports.index') }}" class="nav-link {{ str_contains(Route::currentRouteName(), 'reports') ? 'active' : ''}}">
              <i class="fas fa-file-alt nav-icon"></i>
              <p>Reports</p>
            </a>
          </li> --}}
                            </ul>
                        @endcan
                        {{-- @can('view users')   --}}
                        @if (str_contains(Route::currentRouteName(), 'roles') or str_contains(Route::currentRouteName(), 'users'))
                            <li class="nav-item menu-open">
                            @else
                            <li class="nav-item menu-close">
                        @endif
                        <a href="#" class="nav-link ">
                            {{-- <i class="nav-icon fas fa-th"></i> --}}
                            <i class="nav-icon fas fa-money-bill-wave"></i>
                            <p>
                                {{ __('Users') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.roles.index') }}"
                                    class="nav-link {{ str_contains(Route::currentRouteName(), 'roles') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Roles') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.users.index') }}"
                                    class="nav-link {{ str_contains(Route::currentRouteName(), 'users') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Users') }}</p>
                                </a>
                            </li>
                        </ul>
                        {{-- @endcan --}}
                        @can('view smart')
                            <li class="nav-item ">
                                <a href="{{ route('dashboard.smart.index') }}"
                                    class="nav-link {{ str_contains(Route::currentRouteName(), 'smart') ? 'active' : '' }}">
                                    <i class="fas fa-swatchbook nav-icon"></i>
                                    <p>{{ __('Smart') }}</p>
                                </a>
                            </li>
                        @endcan
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
                    @yield('smart')
                    <div @yield('smartdis') class="row mb-1">
                        <div class="col-sm-4">
                            <h1 class="m-0 font-weight-normal">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-4 text-center">
                            @yield('btn')
                        </div><!-- /.col -->
                        <div class="col-sm-4">
                            <ol class="breadcrumb float-sm-right">
                                @section('breadcrumb')
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('dashboard.index') }}">{{ __('Home') }}</a></li>
                                @show
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content" @yield('contenthig')>
                <div class="container-fluid">
                    @yield('content')
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
        <footer class="main-footer py-1" @yield('footerdis')>
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
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script>
        function confirmDelFn() {
            if (!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }

        function confirmDownldFn() {
            if (!confirm("Are You Sure to Download File"))
                event.preventDefault();
        }
    </script>
    @stack('custom-scripts')
</body>

</html>
