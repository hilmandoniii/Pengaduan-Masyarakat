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
                      <img src="<?= base_url() ?>assets/uploads/<?= $tanggapan['gambar'] ?>" class="card-img" alt="..." style="height: 100%;">
                  </div>
                  <div class="card-body col-md-8">
                      <table class="table table-borderless">
                          <tr>
                              <th>Tanggal Pengaduan</th>
                              <th>:</th>
                              <th><?= $tanggapan['tgl_pengaduan'] ?></th>
                              </tr>
                          <tr>
                              <th>Status</th>
                              <th>:</th>
                              <th><?= $tanggapan['status'] ?></th>
                          </tr>
                              <tr>
                              <th>Isi Pengaduan</th>
                              <th>:</th>
                          </tr>
                      </table>
                          <h4 class="font-weight-bold" style="margin-left:2.8%;"><?= $tanggapan['isi_pengaduan'] ?></h4>
                  </div> 
              </div>
              <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      
                      <?= form_open('Admin/TanggapanController/edit_tanggapan'); ?>
                        <input type="hidden" name="id_pengaduan" value="<?= $tanggapan['id_pengaduan']; ?>">

                        <div class="form-group">
                          <label for="tanggapan" class="card-title">Tanggapan</label>
                          <textarea name="tanggapan" class="form-control" id="tanggapan" rows="10" value="<?= $tanggapan['tanggapan'] ?>" placeholder="Beri Tanggapan ..."></textarea>
                        </div>
                        <!-- <div class="form-group">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="custom-file">
                                        <input type="file" class="customfile-input" id="foto_profile" name="foto_profile">
                                        <label class="custom-file-label" for="foto_profile"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                        <?= form_open('Admin/TanggapanController/tanggapan_pengaduan_selesai'); ?>
                        <input type="hidden" name="id" value="<?= $data_pengaduan['id_pengaduan'] ?>">
                        <button class="btn btn-primary" name="selesai">Selesai</button>
                        <?= form_close(); ?>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button>                         -->
                      <?= form_close(); ?>
                    </div>
                  </div>
                </div>
              </div>

          </div>
        </div>
        <!-- content-wrapper ends -->