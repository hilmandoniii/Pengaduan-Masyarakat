<!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
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
  <script src="<?= base_url() ?>assets/tmp-admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= base_url() ?>assets/tmp-admin/vendors/chart.js/Chart.min.js"></script>
  <script src="<?= base_url() ?>assets/tmp-admin/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?= base_url() ?>assets/tmp-admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?= base_url() ?>assets/tmp-admin/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url() ?>assets/tmp-admin/js/off-canvas.js"></script>
  <script src="<?= base_url() ?>assets/tmp-admin/js/hoverable-collapse.js"></script>
  <script src="<?= base_url() ?>assets/tmp-admin/js/template.js"></script>
  <script src="<?= base_url() ?>assets/tmp-admin/js/settings.js"></script>
  <script src="<?= base_url() ?>assets/tmp-admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url() ?>assets/tmp-admin/js/dashboard.js"></script>
  <script src="<?= base_url() ?>assets/tmp-admin/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->

  <!-- Page level plugins -->
  <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="<?= base_url() ?>assets/demo/datatables-demo.js"></script>

  <!-- export plugin -->
  <script src="<?= base_url('assets/') ?>extra/jquery.dataTables.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/') ?>extra/dataTables.bootstrap4.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/') ?>extra/dataTables.buttons.min.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/') ?>extra/buttons.print.min.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/') ?>extra/jszip.min.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/') ?>extra/pdfmake.min.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/') ?>extra/vfs_fonts.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/') ?>extra/buttons.html5.min.js" crossorigin="anonymous"></script>
  <!-- script -->

  <script type="text/javascript" class="init">
    $(document).ready(function() {
      $('#exampleLaporan').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'print',
            title: 'Data Pengaduan',
            customize: function(win) {
              $(win.document.body).find("")
                .css('font-size', '10pt')
                .append(
                  '<img src="http://localhost/andi/aplikasi-pengaduan-masyarakat//assets/gambar/bantu_java_code_1.png" />'
                );

              $(win.document.body).find('table')
                .addClass('compact')
                .css('font-size', 'inherit');
            }
          },
          {
            extend: 'pdf',
            orientation: 'portrait',
            pageSize: 'LEGAL',
            title: 'Data Pengaduan'
          },
          {
            extend: 'excel',
            title: 'Data Pengaduan'
          }
        ]
      });
    });
  </script>

</body>

</html>