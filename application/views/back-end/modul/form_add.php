<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-book"></i> Form add modul
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
    <?= $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <?= form_open_multipart('save-modul') ?>
                    <div class="form-group">
                        <label for="modul">Upload modul</label>
                        <input type="file" name="modul" id="modul" class="form-control">
                        <small class="muted">*format modul harus .PDF , maksimal size 2MB</small>
                    </div>
                    <div class="form-group">
                        <label for="minat">Peminatan</label>
                        <select name="minat" id="minat" class="form-control">
                            <option value="">--PILIH--</option>
                            <?php foreach ($minat as $key) : ?>
                                <option value="<?= $key->nama_peminatan ?>">
                                    <?= $key->nama_peminatan ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="text-danger small">
                            <?= form_error('minat') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="download">download</label>
                        <input type="text" class="form-control" name="download" id="download" value="0" disabled>
                    </div>
                    <div class="form-group">
                        <label for="share">share</label>
                        <select name="share" id="share" class="form-control">
                            <option value="">--PILIH--</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                        <div class="text-danger small">
                            <?= form_error('share') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-save"> Simpan</i>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>