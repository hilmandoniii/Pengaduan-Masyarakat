<!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
        	<?= $this->session->flashdata('msg'); ?>
					<?php if (!empty($data_pengaduan)) : ?>
					<div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Semua Pengaduan</h4>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>E-mail</th>
                          <th>Tanggal Pengaduan</th>
                          <th>Judul Pengaduan</th>
                          <th>Status</th>
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
                          <th><h5 class="badge badge-success"><?= $dp['status']; ?></h5></th>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php else : ?>
							<div class="text-center">Belum Ada Pengaduan</div>
					<?php endif; ?>

        </div>
        <!-- content-wrapper ends -->





		