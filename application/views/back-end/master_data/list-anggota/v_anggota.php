<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-users"></i> Data anggota
        <p class="text-muted">Data anggota HIMTI</p>
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
    <?= $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= site_url('add-anggota') ?>" class="btn btn-sm btn-success">
                        <i class="fas fa-plus text-white"></i>
                        Add data
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center table-responsive-sm" id="dataTable" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Nim</th>
                                <th rowspan="2">Nama divisi</th>
                                <th rowspan="2">Angkatan</th>
                                <th colspan="3">Aksi</th>
                            </tr>
                            <tr style="display: none">
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            <?php foreach ($anggota as $key) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $key->nim ?></td>
                                    <td><?= $key->nama_anggota ?></td>
                                    <td><?= $key->angkatan ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#m<?= $key->id_anggota ?>m">
                                            <i class="fas fa-eye text-white"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form action="<?= site_url('edit-anggota') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $key->id_anggota ?>">
                                            <button class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="<?= site_url('delete-anggota') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $key->id_anggota ?>">
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

<!-- modal view data -->
<?php foreach ($anggota as $key) : ?>
    <div class="modal fade" id="m<?= $key->id_anggota ?>m" tabindex="-1" role="dialog" aria-labelledby="addCarouselLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCarouselLabel">
                        Detail anggota
                    </h5>
                </div>
                <div class="modal-body">
                    <p class="text-center">
                        <img src="<?= base_url('assets/img/anggota/') . $key->foto ?>" alt="<?= $key->nama_anggota ?>" class="img-thumbnail mb-2">
                    </p>
                    <table class="table table-striped table-bordered text-capitalize">
                        <tr>
                            <th>nim</th>
                            <td> <?= $key->nim ?> </td>
                        </tr>
                        <tr>
                            <th> nama </th>
                            <td> <?= $key->nama_anggota ?> </td>
                        </tr>
                        <tr>
                            <th>divisi</th>
                            <td> <?= $key->nama_divisi ?> </td>
                        </tr>
                        <tr>
                            <th>Angkatan</th>
                            <td> <?= $key->angkatan ?> </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-warning">
                        <i class="fas fa-times"> close</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- akhir modal view data -->

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>