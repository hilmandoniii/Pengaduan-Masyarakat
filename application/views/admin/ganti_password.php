<!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ganti Password</h4>
                  <?= $this->session->flashdata('msg'); ?>
                  <?= form_open('Auth/ChangePasswordController') ?>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Password Sekarang</label>
                      <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password Sekarang" name="current_password">

                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password Baru</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password Baru" name="new_password">
                      <?= form_error('new_password','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Konfirmasi Password Baru</label>
                      <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Ulangi Password Baru" name="confirm_password">
                      <small class="form-text text-muted">Jangan pernah beritahukan password kepada siapapun.</small>
                      <?= form_error('confirm_password','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  <?= form_close(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->