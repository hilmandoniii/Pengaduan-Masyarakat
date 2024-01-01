<!-- partials -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
              <div class="col-lg-6 justify-content-x">
                  <!-- <?= $this->session->flashdata('msg'); ?> -->
              </div>
          </div>
          
          <div class="card col-md-12">
            <div class="card-header mb-3">
                <h6 class="font-weight-bold text-primary">Di proses oleh - <?= $data_pengaduan['nama_petugas'] ?> (<?= $data_pengaduan['level'] ?>)</h6>
            </div>
            
            <div class="row justify-content-center">
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
            </div>
            
            <div class="card-body mb-4">
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
            </div>
          </div>

         
        </div>
        <!-- content-wrapper endssss -->