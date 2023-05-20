<!DOCTYPE html>
<html lang="en">
@include('admin.layouts.head')
<body class="hold-transition @if (Auth::check()) sidebar-mini layout-fixed @else login-page @endif">
  @if (Auth::check())
    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{asset('/assets/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
      </div>
      
      @include('admin.layouts.navbar')
      
      <!-- Main Sidebar Container -->
    
      @include('admin.layouts.sidebar')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      
      @include('admin.layouts.header')
  @endif
    <!-- /.content-header -->
    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  

  @if (Auth::check())
      </div>
      <!-- footer -->
      @include('admin.layouts.footer')
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
      <!-- Right Sidebar in Dashboard -->
      </aside>
    <!-- /.control-sidebar -->
    </div>
  <!-- ./wrapper -->
  @endif
  <!-- foot -->
  @include('admin.layouts.foot')
</body>
</html>
