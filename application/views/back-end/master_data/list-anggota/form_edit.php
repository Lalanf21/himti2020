<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-edit"></i> Form edit anggota
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
    <a href="<?= site_url('data-anggota') ?>" class="btn btn-primary my-3">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>
    <?= $this->session->flashdata('pesan') ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <?= form_open_multipart('update-anggota') ?>
                    <input type="hidden" name="id" value="<?= $anggota->id_anggota ?>">
                    <div class="form-group">
                        <label for="nim">nim</label>
                        <input type="text" class="form-control" name="nim" id="nim" value="<?= $anggota->nim ?>">
                        <div class="text-danger small">
                            <?= form_error('nim') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">nama anggota</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $anggota->nama_anggota ?>">
                        <div class="text-danger small">
                            <?= form_error('nama') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="divisi">Divisi / Jabatan</label>
                        <select name="divisi" id="divisi" class="form-control">
                            <option value="">--PILIH--</option>
                            <?php foreach ($divisi as $key) : ?>
                                <?php if ($key->nama_divisi == $anggota->nama_divisi) : ?>
                                    <option value="<?= $key->nama_divisi ?>" selected>
                                        <?= $key->nama_divisi ?>
                                    </option>
                                    <?php continue; ?>
                                <?php endif ?>
                                <option value="<?= $key->nama_divisi ?>">
                                    <?= $key->nama_divisi ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="text-danger small">
                            <?= form_error('divisi') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="minat">Peminatan</label>
                        <select name="minat" id="minat" class="form-control">
                            <option value="">--PILIH--</option>
                            <?php foreach ($minat as $key) : ?>
                                <?php if ($key->nama_peminatan == $anggota->minat) : ?>
                                    <option value="<?= $key->nama_peminatan ?>" selected>
                                        <?= $key->nama_peminatan ?>
                                    </option>
                                    <?php continue ?>
                                <?php endif ?>
                                <option value="<?= $key->nama_peminatan ?>">
                                    <?= $key->nama_peminatan ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="text-danger small">
                            <?= form_error('minat') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="angkatan">angkatan</label>
                        <select name="angkatan" id="angkatan" class="form-control">
                            <option value="">--PILIH--</option>
                            <?php foreach ($angkatan as $key) : ?>
                                <?php if ($key->tahun_angkatan == $anggota->angkatan) : ?>
                                    <option value="<?= $key->tahun_angkatan ?>" selected>
                                        <?= $key->tahun_angkatan ?>
                                    </option>
                                    <?php continue ?>
                                <?php endif ?>
                                <option value="<?= $key->tahun_angkatan ?>">
                                    <?= $key->tahun_angkatan ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="text-danger small">
                            <?= form_error('angkatan') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto">Upload foto</label>
                        <p class="text-center">
                            <img src="<?= base_url('assets/img/anggota/') . $anggota->foto ?>" alt="<?= $anggota->nama_anggota ?>" class="responsive-img img-thumbnail">
                        </p>
                        <input type="file" name="foto" id="foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-save"> Simpan</i>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>