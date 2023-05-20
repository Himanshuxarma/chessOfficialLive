<script> var ajaxUrl = "{{url('/')}}"; </script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/assets/admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/assets/admin/dist/js/adminlte.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  //$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('/assets/admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('/assets/admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('/assets/admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/assets/admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('/assets/admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('/assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('/assets/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/assets/admin/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{asset('/assets/admin/dist/js/pages/dashboard.js')}}"></script> -->
<script src="{{asset('/assets/admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
<!-- Select2 -->
<script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
<script src="{{asset('/assets/admin/plugins/select2/js/select2.full.min.js')}}"></script>

<script src="{{asset('/assets/admin/plugins/datatables-checkboxes/js/dataTables.checkboxes.min.js')}}"></script>

    
    

@yield('customscript')