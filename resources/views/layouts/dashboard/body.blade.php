<!-- jQuery -->
<script src="{{ asset('assets/dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/dashboard/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/dashboard/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/dashboard/plugins/sparklines/sparkline.js') }}"></script>
<!-- Format Money -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<!-- JQVMap -->
<script src="{{ asset('assets/dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/dashboard/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/dashboard/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- Summernote -->
<script src="{{ asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dashboard/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dashboard/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dashboard/dist/js/demo.js') }}"></script>
<!-- DataTables -->
{{-- <script src="{{ asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script> --}}

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('assets/dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Custom Script Js -->
<script src="{{ asset('js/script.js') }}"></script>
<script>
    $(function () {
        $("#tables").DataTable({
            "responsive": true,
            "autoWidth": false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel'
            ]
        });
        
    var table = $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('a.toggle-vis').on( 'click', function (e) {
    e.preventDefault();

    // Get the column API object
    var column = table.column( $(this).attr('data-column') );

    // Toggle the visibility
    column.visible( ! column.visible() );
    } );
    $('.select2').select2();
    //Initialize Select2 Elements
    $('.select2bs4').select2({
    theme: 'bootstrap4'
    })
  });
</script>
