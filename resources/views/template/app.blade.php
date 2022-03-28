<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Peduli Diri</title>
  <style>
    img{
      width: 150px;
      height: 150px;
      border-radius: 50%;
    }
  </style>
  <!-- plugins:css -->
  <link rel="stylesheet" href={{asset('assets/vendors/feather/feather.css')}}>
  <link rel="stylesheet" href={{asset('assets/vendors/ti-icons/css/themify-icons.css')}}>
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href={{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}>
  <link rel="stylesheet" href={{asset('assets/vendors/ti-icons/css/themify-icons.css')}}>
  <link rel="stylesheet" type={{asset('assets/text/css')}} href={{asset('assets/js/select.dataTables.min.css')}}>
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href={{asset('assets/css/vertical-layout-light/style.css')}}>
  <!-- endinject -->
  <link rel="shortcut icon" href={{asset('assets/images/favicon.ico')}} />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="/home">Peduli Diri</a>
        <a class="navbar-brand brand-logo-mini" href="/home">PD</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src='{{ Auth::user()->getFoto()}}' alt="Foto"/>
            </a>
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->username }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="/home">
                <i class="icon-head text-primary"></i>
                MyProfile
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <i class="ti-power-off text-primary"></i>{{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/home">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">MyProfile</span>
            </a>
          </li>
          @if(auth()->user()->role == 'user')
          <li class="nav-item">
            <a class="nav-link" href="/perjalanan">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Perjalanan</span>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            @yield('content')
          </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">© 2022. Peduli Diri dari SMK Informatika Utama</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Dibuat Dengan Sepenuh <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by SMKI UTAMA</span> 
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src={{asset('assets/vendors/js/vendor.bundle.base.js')}}></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src={{asset('assets/vendors/chart.js/Chart.min.js')}}></script>
  <script src={{asset('assets/vendors/datatables.net/jquery.dataTables.js')}}></script>
  <script src={{asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}></script>
  <script src={{asset('assets/js/dataTables.select.min.js')}}></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src={{asset('assets/js/off-canvas.js')}}></script>
  <script src={{asset('assets/js/hoverable-collapse.js')}}></script>
  <script src={{asset('assets/js/template.js')}}></script>
  <script src={{asset('assets/js/settings.js')}}></script>
  <script src={{asset('assets/js/todolist.js')}}></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src={{asset('assets/js/dashboard.js')}}></script>
  <script src={{asset('assets/js/Chart.roundedBarCharts.js')}}></script>
  <!-- End custom js for this page-->
</body>

</html>