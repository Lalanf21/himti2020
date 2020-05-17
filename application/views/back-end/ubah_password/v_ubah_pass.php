<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-edit"></i> Ganti password
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="<?= site_url('save-pass') ?>" method="post">
                <div class="form-group">
                    <label for="password_lama">Password Lama</label>
                    <input autofocus type="password" class="form-control" id="password_lama" placeholder="Masukkan Password lama anda" name="password_lama">
                    <span class="helper-text text-danger"> 
                        <?= form_error('password_lama') ?> 
                    </span>
                </div>

                <div class="form-group">
                    <label for="password_baru1">Password baru</label>
                    <input type="password" class="form-control" id="password_baru1" placeholder="minimal 4 karakter" name="password_baru1">
                    <span class="helper-text text-danger"> <?= form_error('password_baru1') ?> </span>
                </div>

                <div class="form-group">
                    <label for="password_baru2">Ulangi Password</label>
                    <input type="password" class="form-control" id="password_baru2" placeholder="Minimal 4 karakter" name="password_baru2">
                    <span class="helper-text text-danger"> <?= form_error('password_baru2') ?> </span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-large btn-success">UBAH PASSWORD</button>
                </div>
            </form>
        </div>
    </div>
</div>