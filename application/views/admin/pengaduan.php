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
									<div class="">
										<?= form_open('Admin/TanggapanController/tanggapan_detail'); ?>
											<input type="hidden" name="id" value="<?= $dp['id_pengaduan'] ?>">
											<button class="btn btn-primary" name="terima">Lihat Detail</button>
										<?= form_close(); ?>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<?php else : ?>
							<div class="text-center">Belum Ada Pengaduan</div>
					<?php endif; ?>
        </div>
        <!-- content-wrapper ends -->





		