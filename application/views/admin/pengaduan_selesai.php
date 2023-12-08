<!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
        	<?= $this->session->flashdata('msg'); ?>
					<?php if (!empty($data_pengaduan)) : ?>

        	<div class="row no-gutters">

						<?php foreach ($data_pengaduan as $dp) : ?>

						<div class="col-md-4">
							<div class="card shadow mb-4" style="width: 18rem;">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary"><?= $dp['nama'] ?></h6>
								</div>
								<img height="150" src="<?= base_url() ?>assets/uploads/<?= $dp['gambar'] ?>" class="card-img-top">
								<div class="card-body">
									<span class="text-dark">Judul Pengaduan :</span>
									<p><?= $dp['judul_pengaduan'] ?></p>
									<span class="text-dark">Telp :</span>
									<p><?= $dp['notelp'] ?></p>
									<span class="text-dark">Tanggal Pengaduan :</span>
									<p><?= $dp['tgl_pengaduan'] ?></p>
								</div>
								<div class="text-center mb-2">
									<!-- <div class="">
										<button class="btn btn-success" name="terima">Lihat Detail</button>
									</div> -->
									
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<?php else : ?>
							<div class="text-center">Belum Ada Pengaduan</div>
					<?php endif; ?>


					<!-- <?php if (!empty($data_pengaduan)) : ?> -->
					<!-- <div class="row">
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
                          

                          
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <!-- <?php else : ?>
							<div class="text-center">Belum Ada Pengaduan</div>
					<?php endif; ?> -->

        </div>
        <!-- content-wrapper ends -->





		