<div class="main-panel">        
        <div class="content-wrapper">
          <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Admin/Petugas</button>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Semua Pengaduan</h4>
                  <?= $this->session->flashdata('msg'); ?>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>No Telepon</th>
                          <th>Level</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1; 
                         foreach ($data_petugas as $dp) { ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $dp['nama_petugas']; ?></td>
                          <td><?= $dp['username']; ?></td>
                          <td><?= $dp['telp']; ?></td>
                          <td><?= $dp['level']; ?></td>
                          <td>
                            <?php if ($dp['username'] == $this->session->userdata('username')) : ?>
                              <small>Tidak ada aksi</small>
                            <?php else : ?>
                                <a href="<?= base_url('Admin/PetugasController/edit/' . $dp['id_petugas']) ?>" class="badge badge-success"><i class="fas fa-trash"></i> Edit</a>
                                <a href="<?= base_url('Admin/PetugasController/delete/' . $dp['id_petugas']) ?>" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                            <?php endif; ?>
                          </td>
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Admin/Petugas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?= form_open('Admin/PetugasController'); ?>

        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?= set_value('nama') ?>">
          <?= form_error('nama','<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="" value="<?= set_value('username') ?>">
          <?= form_error('username','<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <div class="form-group">
          <label for="password">Passsword</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="">
        </div>
        <div class="form-group">
          <label for="telp">Telp</label>
          <input type="text" class="form-control" id="telp" placeholder="" name="telp" value="<?= set_value('telp') ?>">
          <?= form_error('telp','<small class="text-danger pl-3">', '</small>'); ?>
        </div>

        <label for="">Level</label>
        <div class="form-group col-md-12">
          
          <div class="form-check">
            <input class="form-check-input" type="radio" name="level" id="admin" value="admin">
            <label class="form-check-label" for="admin">Admin</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="level" id="petugas" value="petugas" checked="">
            <label class="form-check-label" for="petugas">Petugas</label>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        <?php echo form_close(); ?>

      </div>
    </div>
  </div>
</div>