<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-folder"></i> Add events
        <p class="text-muted">Form untuk menambah events HIMTI</p>
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
    <a href="<?= site_url('list-events') ?>" class="btn btn-primary mb-3">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>
    <?= $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?= site_url('save-events') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="events" class="form-control judul" placeholder="Nama events" id="events">
                            <div class="text-danger small">
                                <?= form_error('events') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="slug" class="form-control slug" style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal events</label>
                            <input type="date" name="tanggal" class="form-control">
                            <div class="text-danger small">
                                <?= form_error('tanggal') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="contents" id="summernote"></textarea>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Foto artikel</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="waktu">waktu</label>
                        <input type="text" class="form-control" name="waktu" placeholder="08:00 - 16:00">
                        <div class="text-danger small">
                            <?= form_error('waktu') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tempat" placeholder="Tempat">
                        <div class="text-danger small">
                            <?= form_error('tempat') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="kuota" placeholder="Kuota, ex: 100">
                        <div class="text-danger small">
                            <?= form_error('kuota') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                            <input type="text" class="form-control" placeholder="100.000" name="harga">
                        </div>
                        <small class="form-text text-muted">
                            penulisan harga jangan ada titik !
                        </small>
                        <div class="text-danger small">
                            <?= form_error('harga') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="publish">Publish</label>
                        <select name="publish" id="publish" class="form-control">
                            <option>--PILIH</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                        <div class="text-danger small">
                            <?= form_error('publish') ?>
                        </div>
                    </div>
                    <div class="btn-group d-block btn-group-justified" role="group">
                        <button type="submit" class="btn btn-outline-primary btn-lg" style="width:100%"><span class="fas fa-save"></span> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 400,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'hr']],
                ['view', ["fullscreen", "codeview", "help"]],
            ]
        });

        $('.judul').keyup(function() {
            var title = $(this).val().toLowerCase().replace(/[&\/\\#^, +()$~%.'":*?<>{}]/g, '-');
            $('.slug').val(title);
        });



    })
</script>