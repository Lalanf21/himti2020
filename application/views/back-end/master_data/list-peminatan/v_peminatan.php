<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-info-circle"></i> Peminatan
        <p class="text-muted">Master data Peminatan</p>
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
    <?= $this->session->flashdata('pesan') ?>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <button class="btn- btn-sm btn-success" data-toggle="modal" data-target="#modalAdd">
                        <i class="fas fa-plus text-white"></i>
                        Add data
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped table-hover text-center" width="100%" id="dataTable">
                        <thead class="thead-dark">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Nama peminatan</th>
                                <th rowspan="2">status</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                            <tr style="display: none">
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            <?php foreach ($minat as $key) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $key->nama_peminatan ?></td>
                                    <td>
                                        <?php if ($key->status == '1') : ?>
                                            <i class="fas fa-check text-success"></i>
                                        <?php else : ?>
                                            <i class="fas fa-times text-danger"></i>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <button class="btn- btn-sm btn-warning" data-toggle="modal" data-target="#m<?= $key->id_peminatan ?>">
                                            <i class="fas fa-edit text-white"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form action="<?= site_url('delete-peminatan') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $key->id_peminatan ?>">
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

<!-- modal-add data -->
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
                <form action="<?= site_url('add-peminatan') ?>" method="post">
                    <div class="form-group">
                        <label for="peminatan">
                            Nama peminatan
                        </label>
                        <input type="text" class="form-control" name="peminatan" id="peminatan" autofocus>
                        <div class="text-danger small">
                            <?= form_error('peminatan') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">
                            Status
                        </label>
                        <select name="status" id="status" class="form-control">
                            <option>--PILIH--</option>
                            <option value="1">Aktif</option>
                            <option value="0">Non Aktif</option>
                        </select>
                        <div class="text-danger small">
                            <?= form_error('status') ?>
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
<!-- akhir modal-add data -->

<!-- modal update data -->
<?php foreach ($minat as $key) : ?>
    <div class="modal fade" id="m<?= $key->id_peminatan ?>" tabindex="-1" role="dialog" aria-labelledby="addCarouselLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCarouselLabel">
                        Edit data
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('update-peminatan') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $key->id_peminatan ?>">
                        <div class="form-group">
                            <label for="peminatan">
                                Nama peminatan
                            </label>
                            <input type="text" class="form-control" name="peminatan" id="divisi" value="<?= $key->nama_peminatan ?>">
                            <div class="text-danger small">
                                <?= form_error('peminatan') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status"> Status </label>
                            <select class="form-control" name="status">
                                <?php if ($key->status == '1') : ?>
                                    <option value="1" selected>aktif</option>
                                    <option value="0">tidak</option>
                                <?php else : ?>
                                    <option value="1">aktif</option>
                                    <option value="0" selected>tidak</option>
                                <?php endif ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-edit"> Edit</i>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- akhir modal update data -->

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>