      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Petugas</h4>
                  <?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>') ?>
                  <?= $this->session->flashdata('msg'); ?>
                  <?= form_open_multipart('Admin/PetugasController/edit/' . $petugas['id_petugas']); ?>
                    
                    <?php if ($this->session->userdata('level') == 'admin') : ?>
                    <label for="">Level</label>
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="level" id="admin" value="admin" <?= $petugas['level'] == 'admin' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="admin">Admin</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="level" id="petugas" value="petugas" <?= $petugas['level'] == 'petugas' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="petugas">Petugas</label>
                      </div>
                    </div>
                  <?php else : ?>
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="hidden" name="level" id="petugas" value="petugas" <?= $petugas['level'] == 'petugas' ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="petugas">Petugas</label>
                      </div>
                    </div>
                  <?php endif; ?>

                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <!-- <button class="btn btn-light text-decoration-none"><a class="text text-dark" href="<?= base_url('User/ProfileController') ?>">Cancel</a></button> -->
                  <?= form_close(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->