<div class="container-fluid my-3">
    <div class="container">
        <div class="row bg-light">
            <div class="col-sm-6">
                <h3 class="text-uppercase text-shadow font-weight-bold"><strong class="text-warning">Visi Misi</strong> HIMTI</h3>
                <span class="text-muted text-capitalize"> Visi dan Misi Himpunan Mahasiswa Teknik Informatika </span>
            </div>
            <div class="col-sm-6 align-self-center">
                <ul class="link-breadcrumb align-self-center">
                    <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
                    <li class="breadcrumb-item active">Visi - Misi</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="visi-misi" style="min-height: 400px; ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="mt-3 py-3 list-group">
                    <?php foreach($visiMisi as $key): ?>
                    <li class="list-group-item list-group-item-action">
                       <?= $key->visi_misi ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>