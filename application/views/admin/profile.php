<!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
              <div class="col-lg-6 justify-content-x">
                  <?= $this->session->flashdata('msg'); ?>
              </div>
          </div>
          <div class="card mb-3" style="max-width: 75%;">
              <div class="row no-gutters">
                  <div class="col-md-4">
                      <img src="<?= base_url('assets/uploads/' . $user['foto_profile']) ?>" class="card-img" alt="..." style="height: 100%;">
                  </div>
                  <div class="col-md-8">
                      <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <th><?= $user['nama_petugas']; ?></th>
                              </tr>
                              <tr>
                                <th>Username</th>
                                <th>:</th>
                                <th><?= $user['username']; ?></th>
                              </tr>
                              <tr>
                                <th>Level</th>
                                <th>:</th>
                                <th><?= $user['level']; ?></th>
                              </tr>
                              <tr>
                                <th>No Telp</th>
                                <th>:</th>
                                <th><?= $user['telp']; ?></th>
                              </tr>
                            </thead>
                          </table>
                          
                      </div>
                      <div class="btn btn-primary ml-3 my-3">
                          <a href="<?= base_url('User/ProfileController/editProfil/' . $user['id_petugas']) ?>"
                          class="text text-white">Ubah Profil</a>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <!-- content-wrapper ends -->