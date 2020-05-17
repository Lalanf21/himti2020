<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-newspaper"></i> Edit artikel
        <p class="text-muted">Form untuk edit artikel HIMTI</p>
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
    <a href="<?= site_url('list-artikel') ?>" class="btn btn-primary mb-3">
        <i class="fas fa-arrow-left"></i>
        Kembali
    </a>
    <?= $this->session->flashdata('pesan') ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="<?= site_url('update-artikel') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="judul" class="form-control judul" placeholder="Judul" id="judul" value="<?= $artikel->judul ?>">
                            <input type="hidden" name="id" value="<?= $artikel->id_artikel ?>">
                            <div class="text-danger small">
                                <?= form_error('judul') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="slug" class="form-control slug" style="background-color: #F8F8F8;outline-color: none;border:0;color:blue;" value="<?= $artikel->slug ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label>Isi artikel</label>
                            <textarea name="contents" id="summernote">
                                <?= $artikel->isi ?>
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
                            <img src="<?= base_url('assets/img/artikel/medium/') . $artikel->gambar ?>" alt="<?= $artikel->judul ?>" class="responsive-img img-thumbnail">
                        </p>
                        <label>Foto artikel</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" class="form-control" value="<?= $this->session->userdata('nama') ?>" name="penulis" readonly>
                    </div>
                    <div class="form-group">
                        <label for="publish">Publish</label>
                        <select name="publish" id="publish" class="form-control">
                            <option>--PILIH</option>
                            <?php if ($artikel->publish == 1) : ?>
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
                        <button type="submit" class="btn btn-outline-warning btn-lg" style="width:100%"><span class="fas fa-edit"></span> Edit</button>
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