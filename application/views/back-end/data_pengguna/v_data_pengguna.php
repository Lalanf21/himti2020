<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-user-cog"></i> List pengguna
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
                            <?php if ($this->session->userdata('level') == 'superadmin') : ?>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Nama pengguna</th>
                                    <th rowspan="2">Level</th>
                                    <th rowspan="2">status</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                                <tr style="display: none">
                                    <th></th>
                                    <th></th>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <th>No</th>
                                    <th>Nama pengguna</th>
                                    <th>Level</th>
                                    <th>status</th>
                                </tr>
                            <?php endif; ?>
                        </thead>
                        <?php $i = 1 ?>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $user->nama_anggota ?></td>
                                    <td><?= $user->level ?></td>
                                    <td>
                                        <?php if ($user->status == '1') : ?>
                                            <i class="fas fa-check text-success"></i>
                                        <?php else : ?>
                                            <i class="fas fa-times text-danger"></i>
                                        <?php endif ?>
                                    </td>
                                    <?php if ($this->session->userdata('level') == 'superadmin') : ?>
                                        <td>
                                            <button class="btn- btn-sm btn-warning" data-toggle="modal" data-target="#m<?= $user->id_pengguna ?>">
                                                <i class="fas fa-edit text-white"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <form action="<?= site_url('delete-pengguna') ?>" method="post">
                                                <input type="hidden" name="id" value="<?= $user->id_pengguna ?>">
                                                <button onclick="return confirm('Anda yakin ?')" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash text-white"></i>
                                                </button>
                                            </form>
                                        </td>
                                    <?php endif; ?>
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
                <form action="<?= site_url('add-pengguna') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_pengguna">
                            Nama pengguna
                        </label>
                        <select name="nama_pengguna" id="nama_pengguna" class="form-control">
                            <option>--PILIH--</option>
                            <?php foreach ($pengguna as $key) : ?>
                                <option value="<?= $key->nama_anggota ?>">
                                    <?= $key->nama_anggota ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                        <div class="text-danger small">
                            <?= form_error('nama_pengguna') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nim">nim</label>
                        <input type="nim" value="" name="nim" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" value="" name="password" class="form-control" readonly>
                        <small class="form-text text-muted">
                            *Password default = nim anggota
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="level" id="level" class="form-control">
                            <option>--PILIH--</option>
                            <option value="superadmin">superadmin</option>
                            <option value="admin">admin</option>
                            <option value="penulis">penulis</option>
                            <option value="anggota">anggota</option>
                        </select>
                        <div class="text-danger small">
                            <?= form_error('level') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">status</label>
                        <select name="status" id="status" class="form-control">
                            <option>--PILIH--</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
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
<?php foreach ($users as $key) : ?>
    <div class="modal fade" id="m<?= $key->id_pengguna ?>" tabindex="-1" role="dialog" aria-labelledby="addCarouselLabel" aria-hidden="true">
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
                    <form action="<?= site_url('update-pengguna') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $key->id_pengguna ?>">
                        <div class="form-group">
                            <label for="nama_pengguna">
                                Nama pengguna
                            </label>
                            <input name="nama_pengguna" id="nama_pengguna" class="form-control" readonly value="<?= $key->nama_anggota ?>">
                            <div class="text-danger small">
                                <?= form_error('nama_pengguna') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" id="level" class="form-control">
                                <?php $level = ['superadmin', 'admin', 'penulis', 'anggota']; ?>
                                <option>--PILIH--</option>
                                <?php foreach ($level as $value) : ?>
                                    <?php if ($value == $key->nama_pengguna) : ?>
                                        <option value="<?= $value ?>" selected>
                                            <?= $value ?>
                                        </option>
                                        <?php continue ?>
                                    <?php endif ?>
                                    <option value="<?= $value ?>" selected>
                                        <?= $value ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <div class="text-danger small">
                                <?= form_error('level') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">status</label>
                            <select name="status" id="status" class="form-control">
                                <option>--PILIH--</option>
                                <?php if ($key->status == 1) : ?>
                                    <option value="1" selected>Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                <?php else : ?>
                                    <option value="1">Aktif</option>
                                    <option value="0" selected>Tidak Aktif</option>
                                <?php endif ?>
                            </select>
                            <div class="text-danger small">
                                <?= form_error('status') ?>
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

        $('#nama_pengguna').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?= site_url('get_nim'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    $('input[name=nim]').val(data.nim);
                    $('input[name=password]').val(data.nim);
                    // alert(data.nim);
                }
            });
            return false;
        });
    });
</script>