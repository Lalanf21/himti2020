<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login - HIMTI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="<?= base_url()?>/vendor/images/icon/favicon.ico">
  <link rel="stylesheet" href="<?= base_url()?>/vendor/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>/vendor/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url()?>/vendor/css/themify-icons.css">
  <!-- amchart css -->
  <!-- others css -->
  <link rel="stylesheet" href="<?= base_url()?>/vendor/css/default-css.css">
  <link rel="stylesheet" href="<?= base_url()?>/vendor/css/styles.css">
  <link rel="stylesheet" href="<?= base_url()?>/vendor/css/responsive.css">
  <!-- modernizr css -->
  <script src="<?= base_url()?>/vendor/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
  <!-- login area start -->
  <div class="login-area">
    <div class="container">
      <div class="login-box ptb--100">
        <form method="post" action="<?=base_url('Auth/login') ?>" >
          <div class="login-form-head text-light text-uppercase">
            <i class="fa fa-lock fa-2x"></i>
            <h3>Please Login !</h3>
          </div>
          <?= $this->session->flashdata('alert') ?>
          <div class="login-form-body">
            <div class="form-gp">
              <label for="username">Username</label>
              <input type="text" name="username">
              <i class="ti-user"></i>
            </div>
            <div class="form-gp">
              <label for="password">Password</label>
              <input type="password" name="password">
              <i class="ti-key"></i>
            </div>
            <div class="submit-btn-area">
              <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- login area end -->

  <!-- jquery latest version -->
  <script src="<?= base_url()?>/vendor/js/vendor/jquery-2.2.4.min.js"></script>
  <!-- bootstrap 4 js -->
  <script src="<?= base_url()?>/vendor/js/popper.min.js"></script>
  <script src="<?= base_url()?>/vendor/js/bootstrap.min.js"></script>
  <script src="<?= base_url()?>/vendor/js/metisMenu.min.js"></script>
  <script src="<?= base_url()?>/vendor/js/jquery.slimscroll.min.js"></script>
  <script src="<?= base_url()?>/vendor/js/jquery.slicknav.min.js"></script>

  <!-- others plugins -->
  <script src="<?= base_url()?>/vendor/js/plugins.js"></script>
  <script src="<?= base_url()?>/vendor/js/scripts.js"></script>
</body>

</html>