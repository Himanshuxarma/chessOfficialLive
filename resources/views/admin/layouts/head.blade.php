<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chess Official</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
  <link href="{{asset('/assets/front/img/chess_board.png')}}" rel="icon">
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('/assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!--public iCheck -->
    <link rel="stylesheet" href="{{asset('/assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap --public>
    <link rel="stylesheet" href="{{asset('public/assets/admin/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/assets/admin/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('/assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('/assets/admin/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('/assets/admin/plugins/summernote/summernote-bs4.min.css')}}">
      <!-- Select2 -->
      <link rel="stylesheet" href="{{asset('/assets/admin/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
    
    <link rel="stylesheet" href="{{asset('/assets/admin/plugins/datatables-checkboxes/css/dataTables.checkboxes.css')}}">
  
    
    @yield('customstyle')
    <script src="{{asset('/assets/admin/plugins/jquery/jquery.min.js')}}"></script>
</head>