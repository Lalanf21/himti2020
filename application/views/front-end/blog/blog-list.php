<div class="container-fluid my-3">
    <div class="container">
        <div class="row bg-light">
            <div class="col-sm-6">
                <h3 class="text-uppercase text-shadow font-weight-bold"><strong class="text-warning">Artikel</strong></h3>
                <span class="text-muted text-capitalize"> update ilmu dengan artikel dari kami ! </span>
            </div>
            <div class="col-sm-6 align-self-center">
                <ul class="link-breadcrumb align-self-center">
                    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Artikel</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- events -->
<div class="container">
    <div class="row">
        <?php foreach($artikel as $value): ?>
        <div class="col-md-4 col-sm-6">
            <div class="card artikel mb-4">
                <img src="<?= base_url('assets/img/artikel/medium/'.$value->gambar) ?>" class="card-img-top">
                <div class="card-body text-right">
                    <a class="my-3 font-weight-bold text-decoration-none text-dark" href="<?= site_url('read-artikel/'.$value->slug) ?>">
                        <?= $value->judul ?>
                    </a>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-between text-muted">
                        <div class="col-lg-4">
                            <p> <i class="fas fa-edit small"></i> 
                                <?= $value->penulis ?>
                            </p>
                        </div>
                        <div class="col-lg-7">
                            <p> <i class="fas fa-calendar small"></i> 
                                <?= tanggal_indo($value->tanggal) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>

<?= $this->pagination->create_links() ?>