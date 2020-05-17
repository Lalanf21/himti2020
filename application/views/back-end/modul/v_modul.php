<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-folder"></i> Modul
        <p class="text-muted">Upload modul untuk sharing</p>
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
    <?= $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center table-responsive-sm"  width="100%" id="dataTable">
                        <thead class="thead-dark">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Modul</th>
                                <th rowspan="2">Peminatan</th>
                                <th rowspan="2">Download</th>
                                <th rowspan="2">Share</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                            <tr style="display: none">
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            <?php foreach ($modul as $key) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $key->modul ?></td>
                                    <td><?= $key->nama_peminatan ?></td>
                                    <td><?= $key->download . ' x di download' ?></td>
                                    <td>
                                        <?php if ($key->share == 1) : ?>
                                            <i class="fas fa-check text-success"></i>
                                        <?php else : ?>
                                            <i class="fas fa-times text-danger"></i>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#m<?= $key->id_modul ?>">
                                            <i class="fas fa-edit text-white"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form action="<?= site_url('delete-modul') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $key->id_modul ?>">
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

<!-- modal edit data -->
<?php foreach ($modul as $value) : ?>
    <div class="modal fade" id="m<?= $value->id_modul ?>" tabindex="-1" role="dialog" aria-labelledby="addCarouselLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCarouselLabel">
                        Edit modul
                    </h5>
                    <button data-dismiss="modal" class="btn btn-danger">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('update-modul') ?>" method="post">
                        <div class="form-group">
                            <label for="minat">Peminatan</label>
                            <input type="hidden" name="id" value="<?= $value->id_modul ?>">
                            <select name="minat" id="minat" class="form-control">
                                <option value="">--PILIH--</option>
                                <?php foreach ($minat as $key) : ?>
                                    <?php if ($key->nama_peminatan == $value->nama_peminatan) : ?>
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
                            <label for="share">share</label>
                            <select name="share" id="share" class="form-control">
                                <option value="">--PILIH--</option>
                                <?php if ($value->share == 1) : ?>
                                    <option value="1" selected>Ya</option>
                                    <option value="0">Tidak</option>
                                <?php else : ?>
                                    <option value="1">Ya</option>
                                    <option value="0" selected>Tidak</option>
                                <?php endif ?>
                            </select>
                            <div class="text-danger small">
                                <?= form_error('share') ?>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-edit"> edit</i>
                    </button>

                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>