<div class="container-fluid my-3">
    <div class="container">
        <div class="row bg-light">
            <div class="col-sm-6">
                <h3 class="text-uppercase text-shadow font-weight-bold"><strong class="text-warning">Pendaftaran </strong>calon anggota</h3>
                <span class="text-muted text-capitalize"> Jadilah bagian dari kami ! </span>
            </div>
            <div class="col-sm-6 align-self-center">
                <ul class="link-breadcrumb align-self-center">
                    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Form pendaftaran</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- konten -->
<div class="container">
    <div class="card border shadow-lg my-5">
    <?= $this->session->flashdata('pesan') ?>
      <div class="card-body p-0">
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image">
              <img src="<?=base_url('assets/img/register.png') ?>">
          </div>
          <div class="col-lg-7 my-5">
            <div class="p-5">
            <hr>
              <form class="user" action="<?=base_url('save-calon-anggota') ?>" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama">
                    <div class="text-danger small">
                        <?= form_error('nama') ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="no_hp" id="no_hp" placeholder="no hp">
                    <div class="text-danger small">
                        <?= form_error('no_hp') ?>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Alamat E-mail">
                  <div class="text-danger small">
                        <?= form_error('email') ?>
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select name="semester" id="semester" class="form-control">
                        <option value="-">==SEMESTER==</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    <div class="text-danger small">
                          <?= form_error('semester') ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="kelas" placeholder="Kelas" name="kelas">
                    <div class="text-danger small">
                        <?= form_error('kelas') ?>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Daftar <i class="fas fa-arrow-right"></i>
                </button>
                <hr>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
<!-- picture from freepic, thanks ! -->
  <!-- <a href="http://www.freepik.com">Designed by Freepik</a> -->