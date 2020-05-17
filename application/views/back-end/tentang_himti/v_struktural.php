<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-info-circle"></i> Struktural Himti
        <p class="text-muted">Untuk mengatur struktural</p>
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
    <?= $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalAdd">
                        <i class="fas fa-plus text-white"></i>
                        Add data
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center table-responsive-sm" width="100%" id="dataTable">
                        <thead class="thead-dark">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Nama anggota</th>
                                <th rowspan="2">Nama divisi</th>
                                <th rowspan="2">jabatan</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                            <tr style="display: none">
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            <?php foreach ($struktural as $key) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $key->nama_anggota ?></td>
                                    <td><?= $key->nama_divisi ?></td>
                                    <td><?= $key->jabatan ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#m<?= $key->id_struktural ?>">
                                            <i class="fas fa-edit text-white"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form action="<?= site_url('delete-struktural') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $key->id_struktural ?>">
                                            <button onclick="return confirm('Anda yakin ?')" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal add data -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="addCarouselLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCarouselLabel">
                    Add data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('add-struktural') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_anggota">
                            Nama anggota
                        </label>
                        <select name="nama_anggota" id="nama_anggota" class="form-control">
                            <option value="-"> -- PILIH --</option>
                            <?php foreach ($anggota as $key) : ?>
                                <option value="<?= $key->nama_anggota ?>">
                                    <?= $key->nama_anggota ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <div>
                            <?= form_error('nama_anggota') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_divisi">
                            Nama divisi
                        </label>
                        <select name="nama_divisi" id="nama_divisi" class="form-control">
                            <option value="-"> -- PILIH --</option>
                            <?php foreach ($divisi as $key) : ?>
                                <option value="<?= $key->nama_divisi ?>">
                                    <?= $key->nama_divisi ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <div>
                            <?= form_error('nama_divisi') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">
                            Jabatan
                        </label>
                        <select name="jabatan" id="jabatan" class="form-control">
                            <option> -- PILIH --</option>
                            <option value="koordinator">koordinator</option>
                            <option value="anggota">Anggota</option>
                        </select>
                        <div>
                            <?= form_error('jabatan') ?>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"> Simpan</i>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- akhir modal add data -->

<!-- modal edit data -->
<?php foreach ($struktural as $value) : ?>
    <div class="modal fade" id="m<?= $value->id_struktural ?>" tabindex="-1" role="dialog" aria-labelledby="addCarouselLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCarouselLabel">
                        edit data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('update-struktural') ?>" method="post">
                        <div class="form-group">
                            <label for="nama_anggota">
                                Nama anggota
                            </label>
                            <input type="hidden" name="id" value="<?= $value->id_struktural ?>">
                            <select name="nama_anggota" id="nama_anggota" class="form-control">
                                <option value="-"> -- PILIH --</option>
                                <?php foreach ($anggota as $key) : ?>
                                    <?php if ($value->nama_anggota === $key->nama_anggota) : ?>
                                        <option value="<?= $key->nama_anggota ?>" selected>
                                            <?= $key->nama_anggota ?>
                                        </option>
                                        <?php continue ?>
                                    <?php endif ?>
                                    <option value="<?= $key->nama_anggota ?>">
                                        <?= $key->nama_anggota ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <div>
                                <?= form_error('nama_anggota') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_divisi">
                                Nama divisi
                            </label>
                            <select name="nama_divisi" id="nama_divisi" class="form-control">
                                <option value="-"> -- PILIH --</option>
                                <?php foreach ($divisi as $key) : ?>
                                    <?php if ($value->nama_divisi == $key->nama_divisi) : ?>
                                        <option value="<?= $key->nama_divisi ?>" selected>
                                            <?= $key->nama_divisi ?>
                                        </option>
                                        <?php continue ?>
                                    <?php endif ?>
                                    <option value="<?= $key->nama_divisi ?>">
                                        <?= $key->nama_divisi ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <div>
                                <?= form_error('nama_divisi') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">
                                Jabatan
                            </label>
                            <select name="jabatan" id="jabatan" class="form-control">
                                <option> -- PILIH --</option>
                                <?php if ($value->jabatan == 'koordinator') : ?>
                                    <option value="koordinator" selected>koordinator</option>
                                    <option value="anggota">Anggota</option>
                                <?php else : ?>
                                    <option value="koordinator">koordinator</option>
                                    <option value="anggota" selected>Anggota</option>
                                <?php endif ?>
                            </select>
                            <div>
                                <?= form_error('jabatan') ?>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"> Simpan</i>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- akhir modal edit data -->

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>