<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome <?= $user['level']; ?> - <?= $user['nama_petugas']; ?> </h3>
                  <!-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> -->
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total Pengaduan Masuk</p>
                      <p class="fs-30 mb-2"><?= number_format($pengaduan) ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Pengaduan Selesai</p>
                      <p class="fs-30 mb-2"><?= number_format($pengaduan_selesai) ?></p>
                      
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Total Pengaduan di Tolak</p>
                      <p class="fs-30 mb-2"><?= number_format($pengaduan_tolak) ?></p>
                      
                    </div>
                  </div>
                </div>
                <div class="col-md-3 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Pengaduan Proses</p>
                      <p class="fs-30 mb-2"><?= number_format($pengaduan_proses) ?></p>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Semua Pengaduan</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>E-mail</th>
                          <th>Tanggal Pengaduan</th>
                          <th>Judul Pengaduan</th>
                          <th>Status</th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $a = 1;
                          foreach ($data_pengaduan as $dp) { ?>
                        <tr>
                          <th><?= $a++; ?></th>
                          <th><?= $dp['nama']; ?></th>
                          <th><?= $dp['email']; ?></th>
                          <th><?= $dp['tgl_pengaduan']; ?></th>
                          <th><?= $dp['judul_pengaduan']; ?></th>
                          <th>
                            <?php
                              if ($dp['status'] == '0') :
                                echo '<span class="badge badge-warning">Sedang di verifikasi</span>';
                              elseif ($dp['status'] == 'proses') :
                                echo '<span class="badge badge-primary">Sedang di proses</span>';
                              elseif ($dp['status'] == 'selesai') :
                                echo '<span class="badge badge-success">Selesai di kerjakan</span>';
                              elseif ($dp['status'] == 'tolak') :
                                echo '<span class="badge badge-danger">Pengaduan di tolak</span>';
                              else :
                                echo '-';
                              endif;
                            ?>
                          </th>

                          
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <!-- content-wrapper ends -->