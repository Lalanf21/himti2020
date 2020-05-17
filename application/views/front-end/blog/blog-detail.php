<?php foreach ($artikel as $key) : ?>
    <div class="container-fluid my-3">
        <div class="container">
            <div class="row bg-light">
                <div class="col-12">
                    <ul class="link-breadcrumb align-self-center text-left">
                        <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
                        <li class="breadcrumb-item"> <a href="<?= site_url('artikel') ?>">Artikel</a> </li>
                        <li class="breadcrumb-item active">
                            <?= word_limiter($key->judul,2) ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- events -->
    <div class="container">
        <div class="row justify-content-between">
            <!-- column artikel -->
            <div class="col-md-7">

                <h4 class="text-capitalize">
                    <?= $key->judul ?>
                </h4>
                <div class="text-dark text-muted py-2 my-2">
                    <span><i class="fas fa-calendar"></i> <?= tanggal_indo($key->tanggal) ?></span>
                    <span class="separator">|</span>
                    <span><i class="fas fa-user"></i>
                        <?= $key->penulis ?>
                    </span>
                    <span class="separator">|</span>
                    <span>
                        <i class="fa fa-eye"></i> <?= $key->view ?>
                    </span>
                </div>
                <!-- image -->
                <img src="<?= base_url('assets/img/artikel/large/' . $key->gambar) ?>" height="320" width="100%" class="img-fluid">
                <!-- akhir image -->

                <!-- isi artikel -->
                <div class="text-justify my-3 p-2 bg-white">
                    <?= $key->isi ?>
                </div>
                <!-- akhir isi artikel -->
            <?php endforeach; ?>
            <!-- akhir column artikel -->
            </div>

            <!-- column sidebar artikel -->
            <div class="col-md-4">
                <div class="row bg-primary text-light">
                    <div class="col-12">
                        <h3 class="text-center">Artikel Lainnya</h3>
                    </div>
                </div>
                <div class="row mt-3 align-content-center">
                    <?php foreach ($other_artikel as $value) : ?>
                        <div class="col-12">
                            <img src="<?= base_url('assets/img/artikel/medium/' . $value->gambar) ?>" width="100%" class="img-fluid">
                            <p class="text-center">
                                <a href="<?= site_url('read-artikel/' . $value->slug) ?>" class="text-decoration-none text-dark">
                                    <?= $value->judul ?>
                                </a>
                            </p>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <!-- column sidebar artikel -->
        </div>
    </div>