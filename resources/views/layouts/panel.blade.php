<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Akada') }} | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('panel/plugins/fontawesome-free/css/all.min.css')}}">
  @yield('style')
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('panel/css/style.css')}}">

  
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-power-off"></i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{asset('panel/img/PanelLogo.png')}}" alt="Akada" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Akada') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          
          
          @if (Auth::guard('admin')->check())
            <img src="{{asset('panel/img/avatar5.png')}}" alt="..." class="img-circle elevation-2">
          @else
           @if (empty(auth()->user()->profile->profile_photo_path))
           <img src="{{asset('panel/img/avatar5.png')}}" alt="..." class="img-circle elevation-2">
           @else
           <img src="{{asset('panel/img/avatar5.png')}}" alt="..." class="img-circle elevation-2">
           @endif
          @endif
          
        </div>
        <div class="info">
          <a href="#" class="d-block">
            {{auth()->user()->username}}
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form 
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if (Auth::guard('admin')->check())
            <li class="nav-item">
              <a href="{{route('admin.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard 
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admission.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Admissions
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('classrooms.index')}}" class="nav-link">
                <i class="nav-icon fas fa-chalkboard"></i>
                <p>
                  Classrooms
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('employees.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Employees
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('subjects.index')}}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Subjects
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('timetables.index')}}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Timetable
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('settings.index')}}" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Settings
                </p>
              </a>
            </li>
            
            
          @elseif (Auth::guard('teacher')->check())
            <li class="nav-item">
              <a href="{{route('teacher.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard 
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('attendance.index')}}" class="nav-link">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Take Attendance 
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('classroom-result')}}" class="nav-link">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                  Classroom Result 
                </p>
              </a>
            </li>
            <li class="nav-item menu-open">
              <a href="" class="nav-link">
                <i class="nav-icon fas fa-book-reader"></i>
                <p>Subject Scores</p>
                <i class="right fas fa-angle-left"></i>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('subject-result')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Input scores
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('get.total.result.per.class')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Compile scores
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            
          @else
            <li class="nav-item">
              <a href="{{route('student.dashboard')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard 
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('student.timetable')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Timetable 
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('get.my.result')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Results
                </p>
              </a>
            </li>
          @endif
          <li class="nav-header"></li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
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
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('page_title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">@yield('breadcrumb')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      
      @yield('content')
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0
    </div>
    <strong>Copyright &copy; @php
       echo date('Y');
    @endphp</strong> {{ config('app.name', 'Akada') }}.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('panel/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('panel/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

@yield('script')
<!-- AdminLTE App -->
<script src="{{asset('panel/js/script.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('panel/js/demo.js')}}"></script>


</body>
</html>
