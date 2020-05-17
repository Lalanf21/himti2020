<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-folder"></i> edit events
        <p class="text-muted">Form untuk mengedit events HIMTI</p>
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
                    <form action="<?= site_url('update-events') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="events" class="form-control" placeholder="Nama events" id="events" value="<?= $events->nama_events ?>">
                            <input type="hidden" name="id" value="<?= $events->id_events ?>">
                            <div class="text-danger small">
                                <?= form_error('events') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="slug" value="<?= $events->slug ?>" class="form-control slug" style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal events</label>
                            <input type="date" name="tanggal" class="form-control" value="<?= $events->tanggal ?>">
                            <div class="text-danger small">
                                <?= form_error('tanggal') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="contents" id="summernote">
                                <?= $events->deskripsi ?>"
                            </textarea>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <p class="text-center">
                            <img src="<?= base_url('assets/img/events/small/') . $events->gambar ?>" alt="<?= $events->nama_events ?>" class="responsive-img img-thumbnail">
                        </p>
                        <label>Foto artikel</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="waktu">waktu</label>
                        <input type="text" class="form-control" name="waktu" value="<?= $events->waktu ?>">
                        <div class="text-danger small">
                            <?= form_error('waktu') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tempat" placeholder="Tempat" value="<?= $events->tempat ?>">
                        <div class="text-danger small">
                            <?= form_error('tempat') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="kuota" placeholder="Kuota, ex: 100" value="<?= $events->kuota ?>">
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
                            <input type="text" class="form-control" placeholder="100.000" name="harga" value="<?= $events->harga ?>">
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
                            <?php if ($events->publish == 1) : ?>
                                <option value="1" selected>Ya</option>
                                <option value="0">Tidak</option>
                            <?php else : ?>
                                <option value="1">Ya</option>
                                <option value="0" selected>Tidak</option>
                            <?php endif ?>
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