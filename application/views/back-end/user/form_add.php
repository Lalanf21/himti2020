<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Form tambah user</h4>
                <ul class="breadcrumbs pull-right">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Tambah User</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- page title area end -->

<!-- konten -->
<div class="main-content-inner">
    <div class="row mt-2">
        <div class="col-lg-3">
            <a href="<?= site_url('user') ?>" class="btn btn-secondary" title="kembali"><i class="fa fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2 text-uppercase">
                <form action="<?= site_url('user/add') ?>" method="post">
                    <div class="form-group">
                        <label for="username" class="col-form-label"> Username </label>
                        <input class="form-control" type="text" name="username" autofocus>
                        <span class="form-text text-muted">
                            <?= form_error('username') ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="password1" class="col-form-label"> Password </label>
                        <input class="form-control" type="password" name="password1">
                        <span class="form-text text-muted">
                            <?= form_error('password1') ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="password2" class="col-form-label"> ulangi Password </label>
                        <input class="form-control" type="password" name="password2">
                        <span class="form-text text-muted">
                            <?= form_error('password2') ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">level</label>
                        <select class="form-control" name="level">
                            <option>--pilih--</option>
                            <option value="superadmin">superadmin</option>
                            <option value="admin">admin</option>
                            <option value="penulis">penulis</option>
                        </select>
                        <span class="form-text text-muted">
                            <?= form_error('level') ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Aktif</label>
                        <select class="form-control" name="aktif">
                            <option>--pilih--</option>
                            <option value="1">aktif</option>
                            <option value="0">tidak</option>
                        </select>
                        <span class="form-text text-muted">
                            <?= form_error('aktif') ?>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </form>
        </div>
    </div>
</div>
<!-- akhir kontent -->