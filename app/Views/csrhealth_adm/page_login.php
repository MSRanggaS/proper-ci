<!doctype html>
<html class="fixed">

<head>

  <!-- Basic -->
  <meta charset="UTF-8">

  <meta name="keywords" content="HTML5 Admin Template" />
  <meta name="description" content="Porto Admin - Responsive HTML5 Template">
  <meta name="author" content="okler.net">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <!-- Web Fonts  -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet"
    type="text/css">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="<?=base_url('resources/csrhealth_adm/vendor/bootstrap/css/bootstrap.css')?>" />
  <link rel="stylesheet" href="<?=base_url('resources/csrhealth_adm/vendor/font-awesome/css/font-awesome.css')?>" />
  <link rel="stylesheet" href="<?=base_url('resources/csrhealth_adm/vendor/magnific-popup/magnific-popup.css')?>" />

  <!-- Theme CSS -->
  <link rel="stylesheet" href="<?=base_url('resources/csrhealth_adm/stylesheets/theme.css')?>" />

  <!-- Skin CSS -->
  <link rel="stylesheet" href="<?=base_url('resources/csrhealth_adm/stylesheets/skins/default.css')?>" />

  <!-- Theme Custom CSS -->
  <link rel="stylesheet" href="<?=base_url('resources/csrhealth_adm/stylesheets/theme-custom.css')?>">

  <!-- Head Libs -->
  <script src="<?=base_url('resources/csrhealth_adm/vendor/modernizr/modernizr.js')?>"></script>

  <?php
  $session = \Config\Services::session();
  ?>
</head>

<body>
  <!-- start: page -->
  <section class="body-sign">
    <div class="center-sign">
      <a href="#" class="logo pull-left">
        <img src="<?=base_url('resources/pictures/logo.png')?>" height="54" alt="Porto Admin" />
      </a>

      <div class="panel panel-sign">
        <div class="panel-title-sign mt-xl text-right">
          <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
        </div>
        <div class="panel-body">
          <?php if (!empty(session()->getFlashdata('loginfirst'))) : ?>
          <div class="alert alert-danger">
            Please <strong>login first</strong>
          </div>
          <?php elseif (!empty(session()->getFlashdata('wrongpass'))) : ?>
          <div class="alert alert-danger">
            We don't recognize the <strong>email</strong> or <strong>password</strong> 
          </div>
          <?php endif ?>
          <form action="/csr_adm/conf_admin/login" method="post">
            <div class="form-group mb-lg">
              <label>Email</label>
              <div class="input-group input-group-icon">
                <input name="email" type="email" class="form-control input-lg" required />
                <span class="input-group-addon">
                  <span class="icon icon-lg">
                    <i class="fa fa-user"></i>
                  </span>
                </span>
              </div>
            </div>

            <div class="form-group mb-lg">
              <div class="clearfix">
                <label class="pull-left">Password</label>
              </div>
              <div class="input-group input-group-icon">
                <input name="password" type="password" class="form-control input-lg" required />
                <span class="input-group-addon">
                  <span class="icon icon-lg">
                    <i class="fa fa-lock"></i>
                  </span>
                </span>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-8"></div>
              <div class="col-sm-4 text-right">
                <button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
              </div>
            </div><br>
          </form>
        </div>
      </div>

      <p class="text-center text-muted mt-md mb-md">&copy; Olahkarsa 2021</p>
    </div>
  </section>
  <!-- end: page -->

  <!-- Vendor -->
  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery/jquery.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery-browser-mobile/jquery.browser.mobile.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/bootstrap/js/bootstrap.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/nanoscroller/nanoscroller.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/magnific-popup/magnific-popup.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery-placeholder/jquery.placeholder.js')?>"></script>

  <!-- Theme Base, Components and Settings -->
  <script src="<?=base_url('resources/csrhealth_adm/javascripts/theme.js')?>"></script>

  <!-- Theme Custom -->
  <script src="<?=base_url('resources/csrhealth_adm/javascripts/theme.custom.js')?>"></script>

  <!-- Theme Initialization Files -->
  <script src="<?=base_url('resources/csrhealth_adm/javascripts/theme.init.js')?>"></script>

</body><img src="http://www.ten28.com/fref.jpg">

</html>