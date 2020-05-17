<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-info-circle"></i> Divisi Himti
        <p class="text-muted">Master data divisi Himti</p>
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
                    <table class="table table-responsive-sm table-striped table-hover text-center" id="dataTable" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th rowspan="2">no</th>
                                <th rowspan="2">nama Divisi</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                            <tr style="display: none">
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            <?php foreach ($divisi as $key) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $key->nama_divisi ?></td>
                                    <td>
                                        <button class="btn- btn-sm btn-warning" data-toggle="modal" data-target="#m<?= $key->id_divisi ?>">
                                            <i class="fas fa-edit text-white"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form action="<?= site_url('delete-divisi') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $key->id_divisi ?>">
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
                <form action="<?= site_url('add-divisi') ?>" method="post">
                    <div class="form-group">
                        <label for="divisi">
                            Nama divisi
                        </label>
                        <input type="text" class="form-control" name="divisi" id="divisi">
                        <div class="text-danger small">
                            <?= form_error('visiMisi') ?>
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
<?php foreach ($divisi as $key) : ?>
    <div class="modal fade" id="m<?= $key->id_divisi ?>" tabindex="-1" role="dialog" aria-labelledby="addCarouselLabel" aria-hidden="true">
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
                    <form action="<?= site_url('update-divisi') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $key->id_divisi ?>">
                        <div class="form-group">
                            <label for="divisi">
                                Nama divisi
                            </label>
                            <input type="text" class="form-control" name="divisi" id="divisi" value="<?= $key->nama_divisi ?>">
                            <div class="text-danger small">
                                <?= form_error('divisi') ?>
                            </div>
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