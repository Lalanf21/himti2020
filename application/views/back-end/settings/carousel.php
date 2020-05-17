<div class="container-fluid">
    <div class="alert alert-secondary" role="alert">
        <i class="fas fa-wrench"></i> Carousel Image
        <p class="text-muted">Setting untuk gambar Carousel</p>
    </div> <!-- Page Heading -->
</div>

<div class="container-fluid">
    <?= $this->session->flashdata('pesan') ?>
    <div class="row">
        <h3 class="muted ml-3">Preview Carousel</h3>
        <div class="col-12">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $i = 0; ?>
                    <?php foreach ($carousel as $key) : ?>
                        <?php if ($i == 0) : ?>
                            <div class="carousel-item active">
                                <?php else : ?>;
                                <div class="carousel-item">
                                <?php endif ?>
                                <img src="<?= base_url('assets/img/carousel/') . $key->image ?>" class="d-block w100 responsive-img">
                                </div>
                                <?php $i++;  ?>
                            <?php endforeach ?>
                            </div>

                            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center my-3">
            <div class="col-8">
                <div class="card shadow">
                    <div class="card-header">
                        <h3> List Carousel </h3>
                    </div>
                    <div class="card-body">
                        <a href="" class="btn btn-small btn-primary mb-3" data-toggle="modal" data-target="#addCarousel">
                            <i class="fas fa-plus"> Add</i>
                        </a>
                        <table class="table table-responsive-sm table-striped text-center" width="100%" id="dataTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th rowspan="2">NO</th>
                                    <th rowspan="2"> preview </th>
                                    <th colspan="3"> Aksi </th>
                                </tr>
                                <tr style="display: none">
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php $i = 1 ?>
                            <tbody>
                                <?php foreach ($carousel as $key) : ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td>
                                            <img src="<?= base_url('assets/img/carousel/') . $key->image ?>" width="80" height="80">
                                        </td>
                                        <td>
                                            <button class="btn- btn-sm btn-warning" data-toggle="modal" data-target="#m<?= $key->id_carousel ?>">
                                                <i class="fas fa-edit text-white"></i>
                                            </button>
                                        </td>
                                        <td>
                                            <form action="<?= site_url('delete-carousel') ?>" method="post">
                                                <input type="hidden" name="id" value="<?= $key->id_carousel ?>">
                                                <button onclick="return confirm('Anda yakin ?')" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash text-white"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal add data -->
    <div class="modal fade" id="addCarousel" tabindex="-1" role="dialog" aria-labelledby="addCarouselLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCarouselLabel">
                        Tambah gambar carousel
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('save-carousel') ?>
                    <div class="form-group">
                        <label for="foto">Upload file foto</label>
                        <input type="file" class="form-control-file" id="foto" name="foto">
                        <small class="form-text text-muted">
                            *Gambar harus berukuran 1500 x 500 px dan maksimal size 2MB
                        </small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"> Simpan</i>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- akhir modal add data -->

    <!-- modal update data -->
    <?php foreach ($carousel as $key) : ?>
        <div class="modal fade" id="m<?= $key->id_carousel ?>" tabindex="-1" role="dialog" aria-labelledby="addCarouselLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCarouselLabel">
                            Edit gambar carousel
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="<?= base_url('assets/img/carousel/' . $key->image) ?>" class="img-thumbnail text-center">
                        <?= form_open_multipart('update-carousel') ?>
                        <input type="hidden" name="id" value="<?= $key->id_carousel ?>">
                        <div class="form-group">
                            <label for="foto">Upload file foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                            <small class="form-text text-muted">
                                *Gambar harus berukuran 1500 x 500 px dan maksimal size 2MB
                            </small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-edit"> Edit</i>
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- akhir modal update data -->

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>