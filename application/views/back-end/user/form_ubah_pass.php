<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-12">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Change password</h4>
                <ul class="breadcrumbs pull-right">
                    <li><a href="<?= site_url('home') ?>">Home</a></li>
                    <li><span>Change password</span></li>
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
        <div class="col-lg-6 offset-lg-3">
            <?= $this->session->flashdata('alert') ?>
            <form method="post" action="<?= site_url('user/changePass') ?>">
                <div class="text-center text-uppercase mt-3">
                    <h5>Silahkan Reset ulang password anda !</h5>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password Lama</label>
                        <input type="password" id="exampleInputPassword1" name="pass_lama">
                        <?= form_error('pass_lama') ?>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword2"> Password baru</label>
                        <input type="password" id="exampleInputPassword2" name="pass_baru">
                        <?= form_error('pass_baru') ?>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword3"> Ulangi Password </label>
                        <input type="password" id="exampleInputPassword3" name="pass_baru2">
                        <?= form_error('pass_baru2') ?>
                    </div>
                    <div class="mt-5 text-center">
                        <button type="submit" class="btn btn-success">Reset <i class="ti-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- akhir kontent -->