<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/') }}dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
{{--    <ul class="navbar-nav">--}}
{{--      <li class="nav-item">--}}
{{--        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>--}}
{{--      </li>--}}
{{--      <li class="nav-item d-none d-sm-inline-block">--}}
{{--        <a href="{{ asset('/') }}index3.html" class="nav-link">Home</a>--}}
{{--      </li>--}}
{{--      <li class="nav-item d-none d-sm-inline-block">--}}
{{--        <a href="#" class="nav-link">Contact</a>--}}
{{--      </li>--}}
{{--    </ul>--}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
          <a class="nav-link" href="{{ url('logout') }}" role="button">
              <i class="nav-icon fas fa-sign-out-alt"></i>Logout
          </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('/') }}dist/img/kp.png" alt="Logo Kulon Progo" class="brand-image elevation-5" style="opacity: .8">
      <span class="brand-text font-weight-light">Si-PANDU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('/') }}dist/img/nas.png" class="img-circle elevation-4" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">RSUD Nyi Ageng Serang</a>
        </div>
      </div>

{{--      <!-- SidebarSearch Form -->--}}
{{--      <div class="form-inline">--}}
{{--        <div class="input-group" data-widget="sidebar-search">--}}
{{--          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">--}}
{{--          <div class="input-group-append">--}}
{{--            <button class="btn btn-sidebar">--}}
{{--              <i class="fas fa-search fa-fw"></i>--}}
{{--            </button>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}

      <!-- Sidebar Menu -->
        @include('layout.menu')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
                @yield('judul')
            </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
        @yield('isi')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
</div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- jQuery -->
<script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="{{ asset('/') }}dist/js/demo.js"></script>--}}

</body>
</html>
