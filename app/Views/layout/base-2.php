<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?></title>

  <!-- css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="/resources/css/style-2.css">

  <!-- icon -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 

</head>

<body>
  <nav class="navbar sticky-top navbar-light bg-light shadow-sm">
    <div class="container-fluid" style="margin-left: 80px;margin-right: 80px;height: 70px;">
      <a class="navbar-brand" href="#" style="margin-left: 16px;">
        <img src="/resources/img/brand.png" alt="" height="30">
      </a>
      <ul class="navbar-nav mb-2 mb-lg-0 justify-content-end align-items-center" style="height: 70px;">
        <li class="nav-item">
          <a class="nav-link" href="#">Info PROPER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Olahkarsa in PROPER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Webinar PROPER</a>
        </li>
        <li class="nav-item">
          <a href="/" type="button" class="btn btn-primary">Cek Persiapan PROPER</a>
        </li>
      </ul>
    </div>
  </nav>

  <?=$this->renderSection('content');?>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <h5 class="mb-3">PT Olahkarsa Inovasi Indonesia</h5>
          <p>End-to-end solution for CSR Management. With CSR we bring the company to sustainable business</p>
          <br>
          <h5 class="mb-3">Olahkarsa Office</h5>
          <p>Olahkarsa Lab - Jl. Irigasi II No. 36 Margasari, Buah Batu, Kota Bandung 40286</p><br>
          <h5 class="mb-3">Follow Us</h5>
          <div class="d-flex">
            <a href="https://www.instagram.com/olahkarsa/" class="me-3"><img src="https://olahkarsa.com/resources/img/link-ig.png" alt="" style="width: 20px;"></a>
            <a href="https://www.facebook.com/olahkarsaofficial/" class="me-3"><img src="https://olahkarsa.com/resources/img/link-fb.png" alt="" style="width: 20px;"></a>
            <a href="https://www.youtube.com/channel/UC9xlJmKIoOYoMrNEcstDYeg" class="me-3"><img src="https://olahkarsa.com/resources/img/link-yt.png" alt="" style="width: 20px;"></a>
            <a href="https://id.linkedin.com/company/olahkarsa" class="me-3"><img src="https://olahkarsa.com/resources/img/link-in.png" alt="" style="width: 20px;"></a>
          </div>
        </div>
        <div class="col-md">
          <h5 class="mb-3">Contact Us</h5>
          <div>
            <div class="py-2">
              <i class="fa fa-envelope-o" aria-hidden="true"></i>
              <a href="mailto:contact@olahkarsa.com" class="body-2" style="left: 10px;position: relative;">
                contact@olahkarsa.com</a>
            </div>
            <div class="py-2">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <a class="body-2" style="left: 10px;position: relative;">(022) 87530272</a>
            </div>
            <div class="py-2">
              <i class="fa fa-whatsapp" aria-hidden="true"></i>
              <a href="https://api.whatsapp.com/send?phone=6285157958448" class="body-2" style="left: 10px;position: relative;">
                +62851 5795 8448</a>
            </div>
          </div><br>
          <h5>Group</h5>
          <div class="p-3 mb-4" style="background-color: #fff; border-radius: 5px; width: max-content; max-width: 100%;">
            <a href="https://sbmedia.id">
              <img src="https://olahkarsa.com/resources/img/logo_sbmedia.png" alt="logo sbmedia.com" style="max-width: 100%;">
            </a>
          </div>
        </div>
        <div class="col-md">
          <h5 class="mb-3">Company Link</h5>
          <ul class="companylink align-items-stretch">
            <li><a href="https://olahkarsa.com/about">About Olahkarsa</a></li>
            <li><a href="https://olahkarsa.com/product">Product</a></li>
            <li><a href="https://blog.olahkarsa.com/" target="_blank">Blog</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <div style="background-color: #009DFB; padding: 1.5rem 0; color: white;">
    <div class="container text-center">
      <span class="mb-0">Copyrights © 2021 PT Olahkarsa Inovasi Indonesia</span>
    </div>
  </div>

  <!-- BS + Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
  <script src="<?=base_url('/resources/js/main.js')?>"></script>

  <?=$this->renderSection('script');?>
</body>

</html>