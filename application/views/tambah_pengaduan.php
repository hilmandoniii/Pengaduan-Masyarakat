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
                                <div class="col-lg-12">
                                        <?= form_open_multipart('PengaduanController'); ?>
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <input type="text" id="nama" class="form-control" name="nama" placeholder="Masukan Nama...">
                                                    <?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <input type="email" id="email" class="form-control" name="email" placeholder="Masukan E-mail...">
                                                    <?= form_error('email','<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <input type="text" id="telp" class="form-control" name="telp" placeholder="Masukan No Telepon...">
                                                    <?= form_error('telp','<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <input type="text" id="judul_laporan" class="form-control" name="judul_laporan" placeholder="Masukan Judul Laporan...">
                                                    <?= form_error('judul_laporan','<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <textarea name="isi_laporan" class="form-control" rows="10" placeholder="Isi Pengaduan..."></textarea>
                                                    <small class="form-text text-muted">Isi lengkap pengaduan dengan menyertakan alamat lengkap pengadu</small>
                                                    <?= form_error('isi_laporan','<small class="text-danger pl-3">', '</small>'); ?>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="custom-file">
                                                      <input type="file" class="custom-file-input" id="foto" name="foto">
                                                      <label class="custom-file-label" for="foto">Choose file</label>
                                                      <small class="form-text text-muted">Hanya JPG|PNG|JPEG yang dapat diupload, max size 3 MB</small>
                                                      <?= form_error('foto','<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div> 
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                                

                                            </div>
                                        <?php echo form_close(); ?>
                                </div>
                            </div> <!-- row -->
                        </div> <!-- subscribe area -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div id="particles-1" class="particles"></div>
        </div> <!-- header hero -->
    </header>
    
    <!--====== HEADER PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    
    


    