<!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
              <div class="col-lg-6 justify-content-x">
                  <!-- <?= $this->session->flashdata('msg'); ?> -->
              </div>
          </div>
          <div class="card col-md-12">
              <div class="row">          
                  <div class="col-md-4">
                      <img src="<?= base_url() ?>assets/uploads/<?= $data_pengaduan['gambar'] ?>" class="card-img" alt="..." style="height: 100%;">
                  </div>
                  <div class="card-body col-md-8">
                      <table class="table table-borderless">
                          <tr>
                              <th>Tanggal Pengaduan</th>
                              <th>:</th>
                              <th><?= $data_pengaduan['tgl_pengaduan'] ?></th>
                              </tr>
                          <tr>
                              <th>Status</th>
                              <th>:</th>
                              <th><?= $data_pengaduan['status'] == 0 ? 'Belum di verifikasi' : ''; ?></th>
                          </tr>
                              <tr>
                              <th>Isi Pengaduan</th>
                              <th>:</th>
                          </tr>
                      </table>
                          <h4 class="font-weight-bold" style="margin-left:2.8%;"><?= $data_pengaduan['isi_pengaduan'] ?></h4>
                  </div> 
              </div>
              <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <?= form_open('Admin/TanggapanController/tambah_tanggapan'); ?>
                      <form>
                        <input type="hidden" name="id" value="<?= $data_pengaduan['id_pengaduan']; ?>">

                        <label for="" class="card-title">Lanjut Beri Tanggapan?</label>
                        <div class="form-group col-md-12">
                          
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status-setuju" value="proses" checked="">
                            <label class="form-check-label" for="status-setuju">Lanjut</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status-tolak" value="tolak">
                            <label class="form-check-label" for="status-tolak">Tolak</label>
                          </div>  
                        </div>

                        <div class="form-group">
                          <label for="tanggapan" class="card-title">Tanggapan</label>
                          <textarea name="tanggapan" class="form-control" id="tanggapan" rows="10" placeholder="Beri Tanggapan ..."></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>                        
                      <?= form_close(); ?>
                    </div>
                  </div>
                </div>
              </div>

          </div>
        </div>
        <!-- content-wrapper ends -->