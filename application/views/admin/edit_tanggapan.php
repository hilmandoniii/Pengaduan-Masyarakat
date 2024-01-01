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
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      
                       <!-- <?php echo form_open('Admin/TanggapanController/edit/' . $tanggapan['id_tanggapan']); ?> -->
                        <?= form_open_multipart('Admin/TanggapanController/edit/' . $tanggapan['id_tanggapan']); ?>

                        <div class="form-group">
                          <label for="tanggapan" class="card-title">Tanggapan</label>
                          <input type="text" class="form-control" id="tanggapan" placeholder="tanggapan" name="tanggapan" value="<?= $tanggapan['tanggapan'] ?>">
                           <?= form_error('tanggapan','<small class="text-danger pl-3">', '</small>'); ?>                        
                        </div>
                        <div class="form-group">
                            
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/uploads/' . $tanggapan['image']) ?>" class="img-thumbnail" alt="">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="image"><?= $tanggapan['image']; ?></label>
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                                
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                       
                        <!-- <div class="form-group">
                          <label for="tanggapan" class="card-title">Tanggapan</label>
                          <textarea name="tanggapan" class="form-control" id="tanggapan" rows="10" placeholder="Beri Tanggapan ..." value="<?= $tanggapan['tanggapan'] ?>"></textarea>
                        </div> -->
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                        <div class="btn btn-dark">
                          <a href="<?= base_url('Admin/TanggapanController/proses/'); ?>" class="text text-white">Kembali</a>
                        </div>
                        
                        <?= form_close(); ?>
                       
                    </div>
                  </div>
                </div>
              </div>

          </div>
        </div>
        <!-- content-wrapper ends -->