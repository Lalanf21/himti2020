<!-- carousel -->
<section class="slider">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 d-none d-md-block">
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
		</div>
		<!-- mobile -->
		<div class="container">
			<div class="row">
				<div class="col-12 d-block d-md-none">
					<img src="<?= base_url('assets/img/carousel/timeline_web_1.jpg') ?>" class="img-fluid">
				</div>
			</div>
		</div>
</section>
<!-- akhir carousel -->

<!-- Welcome -->
<section class="jumbotron">
	<div class="container">
		<div class="row">
			<div class="col text-dark text-center tulisan">
				<h1 class="display-4">Welcome !</h1>
				<p class="lead">
					<?= $value->welcome_message ?>
				</p>
			</div>
		</div>
	</div>
</section>
<!-- akhir Welcome -->

<!-- logo Himti -->
<section class="logo">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="<?= base_url('assets/img/himti.jpg') ?>" class="img-fluid">
			</div>
			<div class="col-md-6 align-self-center">
				<p class=""> <?= $value->about_message ?> </p>
			</div>
		</div>
	</div>
</section>
<!-- akhir logo Himti -->

<!-- events -->
<section class="events">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 text-center text-capitalize">
				<h2> Event terdekat </h2>
				<hr class="baris">
				<p class="small text-muted"> Jangan sampai ketinggalan events dari HIMTI-UMT </p>
			</div>
		</div>
		<div class="row mt-2">
			<?php foreach($events as $value): ?>
			<div class="col-md-4 mt-2">
				<div class="card beranda-events">
					<h3 class="card-title text-center">
						<?= $value->nama_events ?>
					</h3>
					<img src="<?= base_url('assets/img/events/large/'.$value->gambar) ?>" class="card-img-top" alt="...">
					<div class="card-body">
						<p class="card-text">
							<?= word_limiter($value->deskripsi,10) ?>
						</p>
						<p class="text-center"> 
							<a href="<?=site_url('read-events/'.$value->slug) ?>" class="btn btn-outline-primary">Selengkapnya </a> 
						</p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- akhir events -->

<!-- galery kegiatan -->
<section class="galery">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center text-capitalize">
				<h2> Galeri kegiatan </h2>
				<hr class="baris">
				<p class="small text-muted"> Foto dokumentasi event HIMTI UMT </p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-3 col-6">
				<a href="<?= base_url('assets/img/galeri/kunjus_1.jpg') ?>" data-toggle="lightbox" data-gallery="kunjus" data-title="Kunjungan Industri">
					<img src="<?= base_url('assets/img/galeri/kunjus_1.jpg') ?>" class="img-fluid">
				</a>
			</div>
			<div class="col-md-3 col-6">
				<a href="<?= base_url('assets/img/galeri/kunjus_2.jpg') ?>" data-toggle="lightbox" data-gallery="kunjus" data-title="Kunjungan Industri">
					<img src="<?= base_url('assets/img/galeri/kunjus_2.jpg') ?>" class="img-fluid">
				</a>
			</div>
			<div class="col-md-3 col-6">
				<a href="<?= base_url('assets/img/galeri/kunjus_3.jpg') ?>" data-toggle="lightbox" data-gallery="kunjus" data-title="Kunjungan Industri">
					<img src="<?= base_url('assets/img/galeri/kunjus_3.jpg') ?>" class="img-fluid">
				</a>
			</div>
			<div class="col-md-3 col-6">
				<a href="<?= base_url('assets/img/galeri/kunjus_4.jpg') ?>" data-toggle="lightbox" data-gallery="kunjus" data-title="Kunjungan Industri">
					<img src="<?= base_url('assets/img/galeri/kunjus_4.jpg') ?>" class="img-fluid">
				</a>
			</div>
		</div>

		<div class="row">
			<div class="col text-center mt-3">
				<a href="" class="btn btn-outline-success"> Selengkapnya <i class="fas fa-search"></i></a>
			</div>
		</div>
	</div>
</section>
<!-- akhir galery kegiatan -->