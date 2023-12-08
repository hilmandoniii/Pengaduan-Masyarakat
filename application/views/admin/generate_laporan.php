<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Semua Pengaduan</h4>
                  <!-- <style type="text/css">
                    .pagination {
                      display: none;
                    }

                    .buttons-print {
                      background-color: #4e73df;
                      ;
                      color: white;
                      border: none;
                    }

                    .buttons-pdf {
                      background-color: #e74a3b;
                      ;
                      color: white;
                      border: none;

                    }

                    .buttons-excel {
                      background-color: #30ad6d;
                      ;
                      color: white;
                      border: none;
                    }
                  </style> -->
                  <div class="table-responsive">
                    <table class="table table-bordered" id="exampleLaporan" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          
                          <th>Nama</th>
                          <th>E-mail</th>
                          <th>Tanggal Pengaduan</th>
                          <th>Judul Pengaduan</th>
                          <th>Status</th>
                          <th>Tanggal Tanggapan</th>
                          <th>Nama Petugas</th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          
                          foreach ($data_pengaduan as $dp) { ?>
                        <tr>
                          
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
                          <th><?= $dp['tgl_tanggapan']; ?></th>
                          <th><?= $dp['nama_petugas']; ?></th>
                          
                          
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