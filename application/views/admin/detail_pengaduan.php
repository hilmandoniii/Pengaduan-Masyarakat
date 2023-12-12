<!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
              <div class="col-lg-6 justify-content-x">
                  <!-- <?= $this->session->flashdata('msg'); ?> -->
              </div>
          </div>
          <div class="card mb-3 col-md-12">
            <div class="card-header mb-3">
                <h6 class="font-weight-bold text-primary">Di proses oleh - <?= $data_pengaduan['nama_petugas'] ?> (<?= $data_pengaduan['level'] ?>)</h6>
            </div>
            <div class="row no-gutters">
               <div class="col-md-4 mb-3">
                      <img src="<?= base_url() ?>assets/uploads/<?= $data_pengaduan['gambar'] ?>" class="card-img-top" style="width: 100%;">
                  </div>
              <div class="col-md-8">
                <div class="card-body">
                    <div class="card-body">
                      <h4 class="mb-3 font-weight-bold" style="font-size: 100%;"><span class="text-dark">Nama Pengadu : <?= $data_pengaduan['nama'] ?></span></h4>
                      <h4 class="mb-3 font-weight-bold" style="font-size: 100%;"><span class="text-dark">Email Pengadu : <?= $data_pengaduan['email'] ?></span></h4>
                      <h4 class="mb-3 font-weight-bold" style="font-size: 100%;"><span class="text-dark">Judul Pengaduan : <?= $data_pengaduan['judul_pengaduan'] ?></span></h4>
                      <h4 class="mb-3 font-weight-bold" style="font-size: 100%;"><span class="text-dark">Status Pengaduan :
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
                      </span></h4>
                      <h4 class="mb-3 font-weight-bold" style="font-size: 100%;">Tanggal Pengaduan :<span class="text-dark"> <?= $data_pengaduan['tgl_pengaduan'] ?></span></h4>
                      <h4 class="mb-3 font-weight-bold" style="font-size: 100%;"><span class="text-dark">Tanggal Tanggapan : <?= $data_pengaduan['tgl_tanggapan'] ?></span></h4>
                      <h4 class="mb-3 font-weight-bold" style="font-size: 100%;"><span class="text-dark">Tanggapan : <?= $data_pengaduan['tanggapan'] ?></span></h4>
                      
                      
                     
                    </div>
                </div>
              </div>
               <div class="col-md-12">
                  
                    
                  
              </div>
            </div>
          </div>

         
        </div>
        <!-- content-wrapper ends -->