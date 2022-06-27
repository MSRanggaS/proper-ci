<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>

  <!-- css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="/resources/css/style.css">

  <!-- icon -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
  <nav class="navbar shadow-sm" style="padding: 0 1.5rem 0 1.5rem;">
    <div class="container" style="height: 58px; overflow: hidden; background-color: white;">
      <img src="<?=base_url('resources/img/brand.png')?>" alt="" height="30px" margn>
      <div class="d-flex">
        <span class="navbar-brand" style="font-weight: 600;">Cek Persiapan Proper<p class="brand-by"><?= $aspectproper[0]['name'] ?></p></span>
      </div>
    </div>
  </nav><br>

  <?=$this->renderSection('content');?>

  <footer class="footer shadow">
    <a class="link-ms" href="">
      <i class="fa fa-facebook-official fb" aria-hidden="true"></i>
    </a>
    <a class="link-ms" href="">
      <i class="fa fa-instagram ig" aria-hidden="true"></i>
    </a>
    <a class="link-ms" href="">
      <i class="fa fa-youtube-play yt" aria-hidden="true"></i>
    </a>
    <a class="link-ms" href="">
      <i class="fa fa-linkedin-square li" aria-hidden="true"></i>
    </a>
    <br><br>
    <a class="link-web" href="https://olahkarsa.com">Profil Olahkarsa</a>
    <span>•</span>
    <a class="link-web" href="http://impactholic.com">Impactholic</a>
    <br><br>
    <p style="margin: 0;">©PT Olahkarsa Inovasi Indonesia</p>
    <br>
  </footer>

  <!-- BS + Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
  <script src="<?=base_url('resources/js/main.js')?>"></script>

  <?=$this->renderSection('script');?>
</body>

</html>