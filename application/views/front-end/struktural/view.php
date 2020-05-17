<div class="container-fluid my-3">
    <div class="container">
        <div class="row bg-light">
            <div class="col-sm-6">
                <h3 class="text-uppercase text-shadow font-weight-bold"><strong class="text-warning">Struktural</strong> HIMTI</h3>
                <span class="text-muted text-capitalize"> Struktur Kepengurusan HIMTI-UMT tahun 2019-2020 </span>
            </div>
            <div class="col-sm-6 align-self-center">
                <ul class="link-breadcrumb align-self-center">
                    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Struktural</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="struktural bg-light">
    <div class="container">
        <!-- row kahim dan wakahim -->
        <div class="row mt-3 py-3">
            <div class="col-6 text-center">
                <figure class="figure">
                    <img src="<?= base_url('assets/img/anggota/') . $kahim->foto ?>" class="figure-img img-fluid">
                    <figcaption class=" figure-caption">
                        <p><?= $kahim->nama_divisi ?></p>
                        <p><?= $kahim->nama_anggota ?></p>
                        <p><?= $kahim->minat ?></p>
                        <p><?= $kahim->angkatan ?></p>
                    </figcaption>
                </figure>
            </div>
            <div class="col-6 text-center">
                <figure class="figure">
                    <img src="<?= base_url('assets/img/anggota/') . $wakahim->foto ?>" class="figure-img img-fluid">
                    <figcaption class="figure-caption">
                        <p><?= $wakahim->nama_divisi ?></p>
                        <p><?= $wakahim->nama_anggota ?></p>
                        <p><?= $wakahim->minat ?></p>
                        <p><?= $wakahim->angkatan ?></p>
                    </figcaption>
                </figure>
            </div>
        </div>
        <!-- akhir row kahim dan wakahim -->

        <!-- row divisi dan anggota -->
        <div class="row">
            <?php foreach ($divisi as $key) : ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-header text-white bg-warning text-center">
                            <?= $key->nama_divisi ?>
                        </div>
                        <div class="list-group list-group-flush">
                            <?php $anggota = anggota_divisi($key->nama_divisi) ?>
                            <?php foreach ($anggota as $value) : ?>
                                <button class="list-group-item list-group-item-action" data-toggle="modal" data-target="#m<?= $value->id_struktural ?>">
                                    <?= $value->nama_anggota ?>
                                    <span class="badge badge-info badge-pill float-right">
                                        <?= $value->jabatan ?>
                                    </span>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                
                <!-- perulangan modal -->
                <?php foreach($anggota as $key): ?>
                <?php $detail = detail_anggota($key->nama_anggota) ?>
                <!-- modal detail -->
                <div class="modal fade" id="m<?= $key->id_struktural ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="card hovercard">
                                <div class="cardheader bg-warning">

                                </div>
                                <div class="avatar">
                                    <img src="<?= base_url('assets/img/anggota/'.$detail->foto) ?>" class="figure-img img-fluid">
                                </div>
                                <div class="info text-capitalize">
                                    <div class="title">
                                        <h3><?= $key->nama_anggota ?></h3>
                                    </div>
                                    <div class="desc">
                                        <?= $key->jabatan.' divisi '.$detail->nama_divisi ?>
                                    </div>
                                    <div class="desc">
                                        <?= $detail->minat ?>
                                    </div>
                                    <div class="desc">
                                        <?= $detail->angkatan ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir modal detail -->
                <?php endforeach ?>
                <!-- akhir perulangan modal -->
            <?php endforeach ?>

            <!-- akhir colom divisi dan anggota -->
        </div>
        <!-- akhir row divisi dan anggota -->
    </div>
    <!-- akhir container -->
</section>
<!-- akhir section -->


<!-- modal detail anggota -->

<!-- akhir modal detail anggota -->