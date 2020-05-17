<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-fingerprint"></i> Data security 2020
        <p class="text-muted">Daftar Peserta</p>
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <a href="<?=site_url('export-excel') ?>" class="btn btn-small btn-primary my-3">
               <i class="fas fa-print"></i> Export to excel
            </a>
            <a href="#" class="btn btn-small btn-secondary my-3">
               <i class="fas fa-envelope"></i> Kirim email
            </a>
        </div>
    </div>
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
                                <th rowspan="2">Nama</th>
                                <th rowspan="2">Email</th>
                                <th rowspan="2">No Hp</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                            <tr style="display: none">
                                <th></th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            <?php foreach ($peserta as $key) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $key->nama ?></td>
                                    <td><?= $key->email ?></td>
                                    <td><?= $key->no_hp ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#m<?= $key->id_peserta_seminar ?>">
                                            <i class="fas fa-eye text-white"></i>
                                        </button>
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
<?php foreach ($peserta as $value) : ?>
    <div class="modal fade" id="m<?= $value->id_peserta_seminar ?>" tabindex="-1" role="dialog" aria-labelledby="pesertaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-header">
                        Detail peserta
                    </h4>
                    <button data-dismiss="modal" class="btn btn-danger float-right">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="text-capitalize table">
                        <tr>
                            <td> nama </td>
                            <td> : </td>
                            <td> <?= $value->nama;?> </td>
                        </tr>
                        <tr>
                            <td> Email </td>
                            <td> : </td>
                            <td> <?= $value->email;?> </td>
                        </tr>
                        <tr>
                            <td> Fakultas </td>
                            <td> : </td>
                            <td> <?= $value->fakultas;?> </td>
                        </tr>
                        <tr>
                            <td> Asal Kampus </td>
                            <td> : </td>
                            <td> <?= $value->asal_kampus;?> </td>
                        </tr>
                        <tr>
                            <td> No Hp </td>
                            <td> : </td>
                            <td> <?= $value->no_hp;?> </td>
                        </tr>
                    </table>
                </div>  
            </div>
        </div>
    </div>
<?php endforeach ?>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>