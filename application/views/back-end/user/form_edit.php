<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Form edit user</h4>
                <ul class="breadcrumbs pull-right">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Edit User</span></li>
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
            <table>
                <form action="<?=site_url('user/update') ?>" method="post">
                    <div class="form-group">
                        <label for="username" class="col-form-label"> Username </label>
                        <input type="hidden" name="id" value="<?= $query['id'] ?>">
                        <input class="form-control" type="text" name="username" value="<?= $query['username'] ?>">
                    </div>
                    <div class="form-group">
                        <?php $data = ['superadmin','admin','penulis'] ?>
                        <label class="col-form-label">level</label>
                        <select class="form-control" name="level">
                            <?php foreach($data as $d): ?>
                            <?php if($d == $query['level']): ?>
                                <option value="<?= $query['level'] ?>" selected> <?= $query['level'] ?></option>
                            <?php continue ?>
                            <?php endif ?>
                                <option value="<?= $d ?>"><?= $d ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Aktif</label>
                        <select class="form-control" name="aktif">
                            <?php if ( $query['is_active'] == '1' ): ?>
                                <option value="1" selected>aktif</option>
                                <option value="0">tidak</option>
                            <?php else: ?>
                                <option value="1" >aktif</option>
                                <option value="0" selected>tidak</option>
                            <?php endif ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </form>
            </table>
        </div>
    </div>
</div>
<!-- akhir kontent -->