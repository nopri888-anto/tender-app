<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="keywords"
    content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
  <meta name="description"
    content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
  <meta name="robots" content="noindex,nofollow" />
  <title>Portal Tender</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('vendor/template/assets/images/favicon.png')}}" />
  <link href="{{asset('vendor/template/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet"/>
  <!-- Custom CSS -->
  <link href="{{asset('vendor/template/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet" />
  <!-- Custom CSS -->
  <link href="{{asset('vendor/template/dist/css/style.min.css')}}" rel="stylesheet" />
</head>

<body>
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
          <a class="navbar-brand" href="#.html">
            <!-- Logo icon -->
            <b class="logo-icon ps-2">
              <img src="{{asset('vendor/template/assets/images/logo-icon.png')}}" alt="homepage" class="light-logo" width="25" />
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text ms-2">
              <!-- dark Logo text -->
              E-LELANG
            </span>
          </a>
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
              class="ti-menu ti-close"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          
          <ul class="navbar-nav float-start me-auto">
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
            </li>
          </ul>
          
          <ul class="navbar-nav float-end">
          
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="mdi mdi-bell font-24"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{asset('vendor/template/assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" width="31" />
              </a>
              <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
        
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off me-1 ms-1"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    
    <aside class="left-sidebar" data-sidebarbg="skin5">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav" class="pt-4">
            @if (Auth::user()->is_role == 1)
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false"><i
                  class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('superadmin.user.index')}}" aria-expanded="false"><i
                  class="mdi mdi-account-box"></i><span class="hide-menu">User</span></a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('superadmin.vendors.index')}}" aria-expanded="false"><i
                  class="mdi mdi-city"></i><span class="hide-menu">Vendor</span></a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('superadmin.tender.index')}}" aria-expanded="false"><i
                  class="mdi mdi-clipboard"></i><span class="hide-menu">Tender</span></a>
            </li>
            @elseif (Auth::user()->is_role == 2)
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i
                  class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.penyedia.index')}}" aria-expanded="false"><i
                  class="mdi mdi-view-dashboard"></i><span class="hide-menu">Pengguna Baru</span></a>
            </li>
            @elseif (Auth::user()->is_role == 3)
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.html" aria-expanded="false"><i
                  class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
            </li>
            @endif 
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>

        <main class="py-4">
            @yield('content')
        </main>
        @include('sweetalert::alert')
        
        <footer class="footer text-center">
            All Rights Reserved . 
            <a href="#">Portal Tender</a>.
          </footer>
        </div>
      </div>
      <script src="{{asset('vendor/template/assets/libs/jquery/dist/jquery.min.js')}}"></script>
      <!-- Bootstrap tether Core JavaScript -->
      <script src="{{asset('vendor/template/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('vendor/template/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
      <script src="{{asset('vendor/template/assets/extra-libs/sparkline/sparkline.js')}}"></script>
      <!--Wave Effects -->
      <script src="{{asset('vendor/template/dist/js/waves.js')}}"></script>
      <!--Menu sidebar -->
      <script src="{{asset('vendor/template/dist/js/sidebarmenu.js')}}"></script>
      <!--Custom JavaScript -->
      <script src="{{asset('vendor/template/dist/js/custom.min.js')}}"></script>
      <!--This page JavaScript -->
      <!-- Charts js Files -->
      <script src="{{asset('vendor/template/assets/libs/flot/excanvas.js')}}"></script>
      <script src="{{asset('vendor/template/assets/libs/flot/jquery.flot.js')}}"></script>
      <script src="{{asset('vendor/template/assets/libs/flot/jquery.flot.pie.js')}}"></script>
      <script src="{{asset('vendor/template/assets/libs/flot/jquery.flot.time.js')}}"></script>
      <script src="{{asset('vendor/template/assets/libs/flot/jquery.flot.stack.js')}}"></script>
      <script src="{{asset('vendor/template/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
      <script src="{{asset('vendor/template/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
      <script src="{{asset('vendor/template/dist/js/pages/chart/chart-page-init.js')}}"></script>

      <script src="{{asset('vendor/template/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
      <script>
      /****************************************
       *       Basic Table                   *
       ****************************************/
      $("#zero_config").DataTable();
      </script>
    </body>
    
    </html>
