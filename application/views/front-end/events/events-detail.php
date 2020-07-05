<?php foreach ($events as $key) : ?>
    <div class="container-fluid my-3">
        <div class="container">
            <div class="row bg-light">
                <div class="col-sm-12">
                    <ul class="link-breadcrumb text-left">
                        <li class="breadcrumb-item"><a href="<?= site_url('') ?>">Home</a></li>
                        <li class="breadcrumb-item"> <a href="<?= site_url('events') ?>">Events</li></a>
                        <li class="breadcrumb-item active">
                            <?= word_limiter($key->nama_events, 2) ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- events detaile -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="<?= base_url('assets/img/events/large/' . $key->gambar) ?>" data-toggle="lightbox">
                    <img src="<?= base_url('assets/img/events/large/' . $key->gambar) ?>" class="img-fluid">
                </a>
            </div>

            <div class="col-md-6 mt-3 py-2">
                <div class="card">
                    <div class="card-footer text-center bg-success text-light">
                        <h3>
                            <?= $key->nama_events ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <p class="small text-right"><i class="fas fa-calendar text-danger"></i> <?= tanggal_indo($key->tanggal) ?></p>
                        <h4>Deskripsi</h4>
                        <p style="text-indent: 20px">
                            <?= $key->deskripsi ?>
                        </p>
                        <ul style="list-style: none">
                            <li>
                                <i class=" fas fa-angle-right text-success"></i> Waktu :
                                <span class="text-right"> <?= $key->waktu ?> </span>
                            </li>
                            <li>
                                <i class=" fas fa-angle-right text-success"></i> Tempat :
                                <span class="text-right"> <?= $key->tempat ?> </span>
                            </li>
                            <li>
                                <i class=" fas fa-angle-right text-success"></i> Kuota :
                                <span class="text-right"> <?= $key->kuota ?> Orang </span>
                            </li>
                            <li>
                                <i class=" fas fa-angle-right text-success"></i> Harga :
                                <span class="text-right"> Rp <?= number_format($key->harga, 2, ',', '.') ?> </span>
                            </li>
                        </ul>
                    </div>
                    <p class="text-center">
                        <a href="" class="btn btn-small btn-outline-success">
                            Daftar sekarang !
                        </a>
                    </p>
                </div>
            </div>
        <?php endforeach ?>
        </div>
    </div>
    </div>

    <!-- events lainya -->
    <div class="container">
        <div class="row my-4">
            <div class="col-12">
                <div class="card-footer">
                    <h3 class="text-center text-capitalize">
                        Event lainnya
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($other_events as $value) : ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card events mb-4">
                        <img src="<?= base_url('assets/img/events/medium/' . $value->gambar) ?> " class="card-img-top img-fluid">
                        <div class="card-body">
                            <div class="tanggal">
                                <p class="text-muted small text-right"><i class="fas fa-calendar"></i> <?= tanggal_indo($value->tanggal) ?></p>
                            </div>
                            <p class="text-center">
                                <a href="<?= site_url('read-events/' . $value->slug) ?>" class="my-3 font-weight-bold card-footer">
                                    <?= $value->nama_events ?>
                                </a>
                            </p>
                            <hr class="baris">
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <!-- akhir event lainnya -->