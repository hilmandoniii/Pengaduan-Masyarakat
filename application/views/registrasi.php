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
              <!-- <h4>New here?</h4> -->
              <?= $this->session->flashdata('pesan'); ?>
              <h6 class="font-weight-light mb-3">Silahkan isi form register sebagai petugas dengan valid!</h6>
              <form class="user" method="post" action="<?= base_url('Auth/LoginController/registrasi'); ?>">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Nama" name="nama_petugas" value="<?= set_value('nama'); ?>">
                  <?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Username" name="username">
                  <?= form_error('username','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password1">
                  <?= form_error('password1','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Ulangi Password" name="password2">
                  <?= form_error('password2','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary">Daftar</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Sudah memiliki akun petugas? <a href="<?= base_url('Auth/LoginController') ?>" class="text-primary">Login</a>
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
