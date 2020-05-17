<div class="container-fluid my-3">
    <div class="container">
        <div class="row bg-light">
            <div class="col-sm-6">
                <h3 class="text-uppercase text-shadow font-weight-bold"><strong class="text-warning">Modul</strong> Sharing</h3>
                <span class="text-muted text-capitalize"> Download modul untuk menunjang kegiatan Sharing </span>
            </div>
            <div class="col-sm-6 align-self-center">
                <ul class="link-breadcrumb align-self-center">
                    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
                    <li class="breadcrumb-item active">modul</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="modul" style="min-height: 500px; margin-top: 30px">
    <div class="container">
        <?= $this->session->flashdata('pesan') ?>
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="accordionExample">
                    <?php foreach ($minat as $key) : ?>
                        <?php $i = 0 ?>
                        <div class="card">
                            <div class="card-header" id="h<?= $key->id_peminatan ?>">
                                <h2 class="mb-0 text-center">
                                    <button class="btn btn-link text-decoration-none text-dark" type="button" data-toggle="collapse" data-target="#collapse<?= $key->id_peminatan ?>" aria-expanded="true" aria-controls="collapse<?= $key->id_peminatan ?>">
                                        <?= $key->nama_peminatan ?>
                                    </button>
                                </h2>
                            </div>
                            <?php $listModul = modul($key->nama_peminatan) ?>
                            <div id="collapse<?= $key->id_peminatan ?>" class="collapse" aria-labelledby="heading<?= $key->id_peminatan ?>" data-parent="#accordionExample">
                                <div class="card-body">
                                    <ul>
                                        <?php foreach ($listModul as $value) : ?>
                                            <li>
                                                <a href="<?= site_url('download-modul/') . $value->modul ?>" class="card-link">
                                                    <?= $value->modul ?>
                                                </a>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>