<div class="container-fluid my-3">
    <div class="container">
        <div class="row bg-light">
            <div class="col-sm-6">
                <h3 class="text-uppercase text-shadow font-weight-bold"><strong class="text-warning">Events</strong></h3>
                <span class="text-muted text-capitalize"> kegiatan yang akan datang </span>
            </div>
            <div class="col-sm-6 align-self-center">
                <ul class="link-breadcrumb align-self-center">
                    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Events</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- artikel -->
<div class="container">
    <div class="row">
        <?php foreach ($events as $key) : ?>
            <div class="col-md-4 col-sm-6">
                <div class="card events mb-4">
                    <img src="<?= base_url('assets/img/events/medium/' . $key->gambar) ?> " height="300" class="card-img-top">
                    <div class="card-body">
                        <div class="tanggal">
                            <p class="text-muted small text-right"><i class="fas fa-calendar"></i> <?= tanggal_indo($key->tanggal) ?></p>
                        </div>
                        <p class="my-3 text-center font-weight-bold card-footer">
                            <?= $key->nama_events ?>
                        </p>
                        <hr class="baris">
                        <p class="card-text">
                            <?= word_limiter($key->deskripsi, 15) ?>
                        </p>
                        <p class="card-link text-right">
                            <a href="<?= site_url('read-events/' . $key->slug) ?>">Selengkapnya</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->pagination->create_links() ?>