<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title><?= $judul; ?></title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.png" type="image/png">
        
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.css">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/magnific-popup.css">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/slick.css">
        
    <!--====== Line Icons CSS ======-->
    <link href="<?= base_url() ?>assets/css/LineIcons.css" rel="stylesheet">
        
    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/default.css">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">


    
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->    
   
   
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!--====== HEADER PART START ======-->
    
    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="<?= base_url('LandingController') ?>" style="color: white; font-weight: bold;">
                                LADUMAS
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="<?= base_url('LandingController') ?>">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#home">Form Pengaduan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="<?= base_url('PengaduanController/cek_pengaduan') ?>">Data Tanggapan</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                            
                           <!--  <div class="navbar-btn d-none d-sm-inline-block">
                                <a class="main-btn" data-scroll-nav="0" href="#pricing">MASUK</a>
                            </div> -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->





<div id="home" class="header-hero bg_cover" style="background-image: url(<?= base_url('assets/images/banner-bg.svg');?>)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center">
                            <h3 class="header-sub-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">Layanan</h3>
                            <h2 class="header-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">Pengaduan Masyarakat</h2>
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
                <div class="row pt-75">
                    <div class="col-lg-12">
                        <div class="subscribe-area wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="row">
                                <?= $this->session->flashdata('msg'); ?>
                                <h4 class="card-title">Detail Pengaduan Masyarakat</h4>
                                <div class="col-md-12">
                                    <div class="card-body">
                                      <div class="table-responsive">
                                        <table class="table" width="100%" cellspacing="0">
                                          <thead>
                                            <tr>
                                              <td>Nama Pengadu</td>
                                              <td>:</td>
                                              <td><?= $data_pengaduan['nama'] ?></td>
                                            </tr>
                                            <tr>
                                              <td>Email Pengadu</td>
                                              <td>:</td>
                                              <td><?= $data_pengaduan['email'] ?></td>
                                            </tr>
                                            <tr>
                                              <td>Judul Pengaduan</td>
                                              <td>:</td>
                                              <td><?= $data_pengaduan['judul_pengaduan'] ?></td>
                                            </tr>
                                            <tr>
                                              <td>Tanggal Pengaduan</td>
                                              <td>:</td>
                                              <td><?= $data_pengaduan['tgl_pengaduan'] ?></td>
                                            </tr>

                                            <tr>
                                              <td>Status Pengaduan</td>
                                              <td>:</td>
                                              <td>
                                                <?php
                                                  if ($data_pengaduan['status'] == '0') :
                                                    echo '<span class="badge badge-secondary">Sedang di verifikasi</span>';
                                                  elseif ($data_pengaduan['status'] == 'proses') :
                                                    echo '<span class="badge badge-primary">Sedang di proses</span>';
                                                  elseif ($data_pengaduan['status'] == 'selesai') :
                                                    echo '<span class="badge badge-success">Selesai di kerjakan</span>';
                                                  elseif ($data_pengaduan['status'] == 'tolak') :
                                                    echo '<span class="badge badge-danger">Pengaduan di tolak</span>';
                                                  else :
                                                    echo '-';
                                                  endif;
                                                ?>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>Tanggapan</td>
                                              <td>:</td>
                                              <td><?= $data_pengaduan['tanggapan'] ?></td>
                                            </tr>
                                            <tr>
                                              <td>Tanggal Tanggapan</td>
                                              <td>:</td>
                                              <td><?= $data_pengaduan['tgl_tanggapan'] ?></td>
                                            </tr>
                                          </thead>
                                        </table>
                                      </div>
                                    </div>
                              </div>
                            </div> <!-- row -->
                            <div class="row justify-content-center">
                              <div class="col-md-6">
                                  <img src="<?= base_url() ?>assets/uploads/<?= $data_pengaduan['gambar'] ?>" class="card-img-top h-100 mb-2">
                                  <h4 class="font-weight-bold font-italic text-center" style="font-size: 100%;"><span class="text-dark">Foto Pengaduan</span></h4>
                              </div>
                              <div class="col-md-6">
                                  <?php if ($data_pengaduan['image'] == '' ) : ?>
                                    <h6 class="text-center font-italic mb-5 mt-5 pt-5" style="font-size: 100%;"><small class="">Tidak ada gambar</small></h6>
                                    <h4 class="font-weight-bold font-italic text-center pt-5" style="font-size: 100%;"><span class="text-dark">Foto Tanggapan</span></h4>
                                  <?php else : ?>
                                      <img src="<?= base_url() ?>assets/uploads/<?= $data_pengaduan['image'] ?>" class="card-img-top h-100 mb-2">
                                      <h4 class="font-weight-bold font-italic text-center" style="font-size: 100%;"><span class="text-dark">Foto Tanggapan</span></h4>
                                  <?php endif; ?>
                              </div>
                          </div>
                        </div> <!-- subscribe area -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div id="particles-1" class="particles"></div>
        </div> <!-- header hero -->
    </header>
    
    <!--====== HEADER PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    
    


    