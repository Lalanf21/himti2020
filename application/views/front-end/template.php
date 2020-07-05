<!DOCTYPE html>

<html>



<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>HIMTI || UMT</title>



  <!-- bootstrap 4 css -->

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css') ?>">

  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->



  <!-- font awesome 5 -->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">



  <!-- lightbox -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">

  <!-- custom css -->

  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

</head>



<body>

  <!-- navbar 1 -->

  <nav class="navbar bg-dark justify-content-end">

    <div class="col text-white text-uppercase small mr-2">

      <span>

        Jl. Perintis Kemerdekaan I no. 33 Cikokol, Kota Tangerang - Banten

      </span>

    </div>



    <ul class="nav">

      <li class="nav-item sosmed">

        <a class="nav-link text-white" href="<?= $value->link_fb ?>" target="__blank">

          <i class="fab fa-facebook"></i>

        </a>

      </li>

      <li class="nav-item sosmed">

        <a class="nav-link" style="color: purple" target="__blank" href="<?= $value->link_ig ?>" target="__blank">

          <i class="fab fa-instagram"></i>

        </a>

      </li>

      <li class="nav-item sosmed">

        <a class="nav-link text-danger" href="<?= $value->link_yt ?>" target="__blank">

          <i class="fab fa-youtube"></i>

        </a>

      </li>

    </ul>

  </nav>

  <!-- akhir navbar 1 -->

  <!-- navbar 2 -->

  <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">

    <a class="navbar-brand text-uppercase">

      <img src="<?= base_url('assets/img/logo_1.png') ?>">

    </a>

    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

      <div class="navbar-nav mx-auto">

        <a class="nav-item nav-link ml-3 active" href="<?= site_url() ?>"> <i class="fas fa-home text-primary"></i> <span class="sr-only">(current)</span></a>

        <a class="nav-item nav-link ml-3" href="<?= site_url('artikel') ?>"> <i class="fas fa-newspaper"></i> ARTIKEL</a>

        <a class="nav-item nav-link ml-3" href="<?= site_url('events') ?>"> <i class="fas fa-calendar-week"></i> EVENTS</a>

        <li class="nav-item dropdown ml-3">

          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <i class="fas fa-book"></i> AKADEMIK

          </a>

          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

            <a class="dropdown-item" href="<?= site_url('modul') ?>">MODUL</a>

            <a class="dropdown-item" href="#">JADWAL SHARING</a>

          </div>

        </li>

        <li class="nav-item dropdown ml-3">

          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <i class="fas fa-info"></i> TENTANG HIMTI

          </a>

          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

            <a class="dropdown-item" href="<?= site_url('visi-misi-himti') ?>">VISI DAN MISI</a>

            <a class="dropdown-item" href="<?= site_url('struktural-himti') ?>">STRUKTURAL</a>

            <a class="dropdown-item" href="<?= site_url('galeri') ?>">GALERI</a>

          </div>

        </li>

        <a class="nav-item nav-link ml-3" href="<?= site_url('kontak-kami') ?>"> <i class="fas fa-address-book"></i> KONTAK</a>

        <!-- <a class="nav-item nav-link ml-3" href="<?= site_url('talkshow-data-security') ?>"> <i class="fas fa-fingerprint"></i> Data Security 2020</a> -->

        <a href="<?= base_url('login') ?>" class="btn btn-success mx-3">Login</a>

      </div>

    </div>

  </nav>

  <!-- akhir navbar 2 -->



  <!-- kontent -->

  <?php $this->load->view($konten) ?>

  <!-- akhir kontent -->



  <!-- footer -->

  <footer class="footer bg-dark text-white text-center">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">

          <span class="muted">

            &#169; HIMTI UMT <?= date('Y') ?> || All Rights Reserved.<br>

          </span>

        </div>

      </div>

      <div class="row">

        <div class="col-12">

          <span class="text-capitalize">

            Created with <i class="fas fa-heart"></i> Team web himti

          </span>

        </div>

      </div>

      <div class="row justify-content-end">

        <div class="col-3">

          <span> V 3.0</span>

        </div>

      </div>

    </div>

  </footer>

  <!-- akhir footer -->



  <div class="to_top"><i class="fas fa-arrow-up fa-2x text-warning"></i></div>



  <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->

  <script src="<?= base_url('assets/js/jquery.js') ?>"></script>

  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>

  <script>

    $('.to_top').hide();

    $(window).scroll(function() {

      if ($(this).scrollTop() > 300) {

        $('.to_top').fadeIn();

      } else {

        $('.to_top').fadeOut();

      }

    });



    $('.to_top').click(function() {

      $("html, body").animate({

        scrollTop: 0

      }, 1000);

      return false;

    });



    $(document).on('click', '[data-toggle="lightbox"]', function(event) {

      event.preventDefault();

      $(this).ekkoLightbox();

    });

  </script>

</body>



</html>