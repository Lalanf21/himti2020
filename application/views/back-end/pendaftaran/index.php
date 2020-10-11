<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-fingerprint"></i> Data calon anggota
        <p class="text-muted">HIMTI 2020</p>
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <a href="<?=site_url('export-excel-calon-anggota') ?>" class="btn btn-small btn-primary my-3">
               <i class="fas fa-print"></i> Export to excel
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
                                <th rowspan="2">Kelas</th>
                                <th rowspan="2">semester</th>
                            </tr>
                            <tr style="display: none">
                                <th></th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            <?php foreach ($calon as $key) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $key->nama ?></td>
                                    <td><?= $key->email ?></td>
                                    <td><?= $key->no_hp ?></td>
                                    <td><?= $key->kelas ?></td>
                                    <td><?= $key->semester ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>