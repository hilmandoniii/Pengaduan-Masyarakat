      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ubah Profile</h4>
                  <?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>') ?>
                  <?= $this->session->flashdata('msg'); ?>
                  <?= form_open_multipart('User/ProfileController/editProfil/' . $petugas['id_petugas']); ?>
                    <div class="form-group">
                      <label for="exampleInputName1">Nama</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="nama" value="<?= $petugas['nama_petugas'] ?>">
                      <?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= $petugas['username'] ?>">
                      <?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">No Telp</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="no_telp" name="no_telp" value="<?= $petugas['telp'] ?>">
                      <?= form_error('no_telp','<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/uploads/' . $petugas['foto_profile']) ?>" class="img-thumbnail" alt="">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="customfile-input" id="foto_profile" name="foto_profile">
                                        <label class="custom-file-label" for="foto_profile"><?= $petugas['foto_profile'] ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light text-decoration-none"><a class="text text-dark" href="<?= base_url('User/ProfileController') ?>">Cancel</a></button>
                  <?= form_close(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper endss -->