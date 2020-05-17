<div class="container-fluid my-3">
    <div class="container">
        <div class="row bg-light">
            <div class="col-sm-12">
                <ul class="link-breadcrumb text-left">
                    <li class="breadcrumb-item"><a href="<?= site_url('') ?>">Home</a></li>
                    <li class="breadcrumb-item"> <a href="<?= site_url('events') ?>">Events</li></a>
                    <li class="breadcrumb-item active">
                        Pendaftaran talkshow Data Security 2020
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- card form -->
<div class="container-fluid">
    <div class="row justify-content-center my-3 p-4">
        <div class="col-md-8">
            <?= $this->session->flashdata('pesan') ?>
            <div class="card shadow">
                <div class="card-body">
                    <form method="post" action="<?= site_url('save-peserta') ?>">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label">Nama lengkap</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" autofocus>
                                <div class="text-danger small">
                                    <?= form_error('nama') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="semester" class="col-sm-4 col-form-label">Semester</label>
                            <div class="col-sm-8">
                                <select class="custom-select" name="semester">
                                    <option value="pilih">==PILIH==</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                                <div class="text-danger small">
                                    <?= form_error('semester') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="asal_kampus" class="col-sm-4 col-form-label">Asal Kampus</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="asal_kampus" placeholder="Universitas Muhammadiyah Tangerang" id="asal_kampus">
                                <div class="text-danger small">
                                    <?= form_error('asal_kampus') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fakultas" class="col-sm-4 col-form-label">Fakultas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="fakultas" id="fakultas">
                                <div class="text-danger small">
                                    <?= form_error('fakultas') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">E-mail</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="email" placeholder="example@gmail.com" id="email">
                                <div class="text-danger small">
                                    <?= form_error('email') ?>
                                </div>
                                <small class="form-text text-info">
                                    Pastikan Email Aktif
                                </small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-4 col-form-label">No hp</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_hp" id="no_hp">
                                <div class="text-danger small">
                                    <?= form_error('no_hp') ?>
                                </div>
                                <small class="form-text text-info">
                                    Pastikan no hp Aktif
                                </small>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-pencil-alt"> Daftar</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- akhir card form -->