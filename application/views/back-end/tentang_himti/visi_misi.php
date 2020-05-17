<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-info-circle"></i> Visi Misi Himti
        <p class="text-muted">Untuk mengatur Visi misi himti</p>
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
    <?= $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-lg-6">
            <h3 class="muted ml-3">List Visi misi </h3>
            <table class="table table-striped text-center table-responsive table-responsive-sm" width="100%" id="dataTable">
                <thead class="thead-dark">
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Visi Misi</th>
                        <th colspan="2"> Aksi </th>
                    </tr>
                    <tr style="display: none">
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <?php $i = 1 ?>
                <tbody>
                    <?php foreach ($value as $key) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td>
                                <?= $key->visi_misi ?>
                            </td>
                            <td>
                                <button class="btn- btn-sm btn-warning" data-toggle="modal" data-target="#m<?= $key->id_visi_misi ?>">
                                    <i class="fas fa-edit text-white"></i>
                                </button>
                            </td>
                            <td>
                                <form action="<?= site_url('delete-visi-misi') ?>" method="post">
                                    <input type="hidden" name="id" value="<?= $key->id_visi_misi ?>">
                                    <button onclick="return confirm('Anda yakin ?')" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash text-white"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div class="col-lg-6">
            <h3 class="muted ml-3">Form add Visi misi </h3>
            <div class="card shadow">
                <div class="card-body">
                    <form action="<?= site_url('save-visi-misi') ?>" method="post">
                        <div class="form-group">
                            <label for="visiMisi">Visi Misi</label>
                            <textarea name="visiMisi" id="visiMisi" class="form-control"></textarea>
                            <div class="text-danger small">
                                <?= form_error('visiMisi') ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"> Simpan</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal update data -->
<?php foreach ($value as $key) : ?>
    <div class="modal fade" id="m<?= $key->id_visi_misi ?>" tabindex="-1" role="dialog" aria-labelledby="addCarouselLabel" aria-hidden="true">
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
                    <form action="<?= site_url('update-visi-misi') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $key->id_visi_misi ?>">
                        <div class="form-group">
                            <label for="visiMisi">Visi Misi</label>
                            <textarea name="visiMisi" id="visiMisi" class="form-control" rows="10"><?= $key->visi_misi ?></textarea>
                            <div class="text-danger small">
                                <?= form_error('visiMisi') ?>
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