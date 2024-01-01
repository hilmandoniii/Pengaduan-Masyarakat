<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $judul; ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/tmp-admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/tmp-admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/tmp-admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/tmp-admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/png">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?= base_url() ?>assets/tmp-admin/images/logo.svg" alt="logo">
              </div>
              <h4>Hello! untuk melanjutkan</h4>
              <h6 class="font-weight-light mb-4">Silahkan login</h6>
              <?= $this->session->flashdata('msg'); ?>

              <form class="user" method="post" action="<?= base_url('Auth/LoginController'); ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="username" placeholder="Masukan Username" name="username">
                  <?= form_error('username','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" placeholder="Masukan Password" name="password">
                  <?= form_error('password','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary">Masuk</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Daftar sebagai petugas? <a href="<?= base_url('Auth/LoginController/registrasi') ?>" class="text-primary">Register</a>
                </div>
                <div class="text-center mt-2 font-weight-light">
                  Kembali ke <a href="<?= base_url('LandingController') ?>" class="text-primary">Beranda</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url() ?>assets/tmp-admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url() ?>assets/tmp-admin/js/off-canvas.js"></script>
  <script src="<?= base_url() ?>assets/tmp-admin/js/hoverable-collapse.js"></script>
  <script src="<?= base_url() ?>assets/tmp-admin/js/template.js"></script>
  <script src="<?= base_url() ?>assets/tmp-admin/js/settings.js"></script>
  <script src="<?= base_url() ?>assets/tmp-admin/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
