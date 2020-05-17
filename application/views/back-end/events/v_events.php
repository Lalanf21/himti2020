<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-folder"></i> Data Events
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
    <?= $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?= site_url('add-events') ?>" class="btn btn-sm btn-success">
                        <i class="fas fa-plus text-white"></i>
                        Add data
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-striped table-hover text-center" id="dataTable" width="100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th rowspan="2">Nama events</th>
                                <th rowspan="2">tanggal events</th>
                                <th rowspan="2">gambar</th>
                                <th rowspan="2">view</th>
                                <th rowspan="2">publish</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                            <tr style="display: none">
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            <?php foreach ($events as $key) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $key->nama_events ?></td>
                                    <td><?= tanggal_indo($key->tanggal) ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/img/events/small/' . $key->gambar) ?>" class="img-fluid">
                                    </td>
                                    <td><?= $key->view ?></td>
                                    <td>
                                        <?php if ($key->publish == 1) : ?>
                                            <i class="fas fa-check text-success"></i>
                                        <?php else : ?>
                                            <i class="fas fa-times text-danger"></i>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <form action="<?= site_url('edit-events') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $key->id_events ?>">
                                            <button class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="<?= site_url('delete-events') ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $key->id_events ?>">
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

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>