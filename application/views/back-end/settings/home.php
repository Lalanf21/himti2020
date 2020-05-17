<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-wrench"></i> Home Information
        <p class="text-muted">Setting untuk halaman beranda</p>
    </div> <!-- Page Heading -->

</div>
<!-- /.container-fluid -->

<!-- card form -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan') ?>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card shadow">
                <div class="card-body">
                    <form method="post" action="<?= site_url('setting-home/update') ?>">
                        <input type="hidden" name="id" value="<?= $value->id_home_setting ?>">
                        <div class="form-group row">
                            <label for="textWelcome" class="col-sm-4 col-form-label">Welcome Message</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="textWelcome" name="textWelcome">
                                    <?= $value->welcome_message ?>
                                </textarea>
                                <div class="text-danger small">
                                    <?= form_error('textWelcome') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="aboutMessage" class="col-sm-4 col-form-label">About Message</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="aboutMessage" name="aboutMessage">
                                    <?= $value->about_message ?>
                                </textarea>
                                <div class="text-danger small">
                                    <?= form_error('aboutMessage') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sosmed_fb" class="col-sm-4 col-form-label">Link Facebook</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sosmed_fb" value="<?= $value->link_fb ?>" id="sosmed_fb">
                                <div class="text-danger small">
                                    <?= form_error('sosmed_fb') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sosmed_yt" class="col-sm-4 col-form-label">Link Youtube</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sosmed_yt" value="<?= $value->link_yt ?>" id="sosmed_yt">
                                <div class="text-danger small">
                                    <?= form_error('sosmed_yt') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sosmed_ig" class="col-sm-4 col-form-label">Link Instagram</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sosmed_ig" value="<?= $value->link_ig ?>" id="sosmed_ig">
                                <div class="text-danger small">
                                    <?= form_error('sosmed_ig') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sosmed_email" class="col-sm-4 col-form-label">Link Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="sosmed_email" value="<?= $value->link_email ?>" id="sosmed_email">
                                <div class="text-danger small">
                                    <?= form_error('sosmed_email') ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"> Simpan</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- akhir card form -->