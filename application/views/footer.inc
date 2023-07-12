
    <footer class="main-footer">
      <strong>Copyright &copy; 2023 <a href="https://tenent.ug/">Tenent</a>.</strong>
      All rights reserved.
     
    </footer>

    <!--<aside class="control-sidebar control-sidebar-dark">

    </aside> -->

  </div>


  <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/plugins/sparklines/sparkline.js'); ?>"></script>

  <script src="<?php echo base_url('assets/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>

  <script src="<?php echo base_url('assets/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/plugins/moment/moment.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>

  <script src="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/dist/js/adminlte2167.js?v=3.2.0'); ?>"></script>

  <!-- <script src="<?php echo base_url('assets/dist/js/demo.js'); ?>"></script> -->

  <script src="<?php echo base_url('assets/dist/js/pages/dashboard.js'); ?>"></script>

  <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/jszip/jszip.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/pdfmake/pdfmake.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/pdfmake/vfs_fonts.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>

  <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      /*"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]*/
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>

</html>