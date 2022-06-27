<!DOCTYPE html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Hasil Cek Persiapan Proper - Print</title>
  <style type="text/css">
  @page {
    margin: 0.5cm;
  }

  body {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
    line-height: 1.25rem;
  }

  footer {
    position: fixed;
    padding-left: 1rem;
    bottom: 0px;
    left: 0px;
    right: 0px;
    height: 40px;
    background-color: #03a9f4;
    color: white;
  }

  .tabel table,
  .tabel th,
  .tabel td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: left;
  }

  .tabel th,
  .tabel td {
    padding: 2px 10px 2px 10px;
  }

  .progress {
    padding: 0;
    width: 350px;
    height: 11px;
    overflow: hidden;
    background: #e5e5e5;
    border-radius: 6px;
  }

  .bar {
    position: relative;
    float: left;
    min-width: 1%;
    height: 100%;
    background: cornflowerblue;
  }
  </style>
</head>

<body style="margin: 0;">
  <table style="width: 100%;">
    <tr>
      <td style="text-align: left; padding: 1rem; width: 180px;"><img
          src="https://olahkarsa.com/resources/img/logo-olahkarsa.png" alt="" height="40px"></td>
      <td
        style="font-family: Arial, Helvetica, sans-serif; margin: 0; padding: 1rem; background-color: #009ffd; color: #fff; font-size: 35px; text-align: right; ">
        <strong>Hasil Cek Persiapan Proper</strong>
      </td>
    </tr>
  </table>
  <div style="padding: 1rem;">
    <h6 style="margin: 0 0 1rem 0; font-size: 16px;">Informasi Tes</h6>
    <table style="margin-top: 5px; width: 100%;">
      <tr>
        <td style="width: 140px;">Nama Perusahaan</td>
        <td>: <?= $attemp[0]['name'] ?></td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td>: <?= $attemp[0]['email'] ?></td>
      </tr>
      <tr>
        <td>Aspek Proper</td>
        <td>: <?= $attemp[0]['aspect'] ?></td>
      </tr>
      <tr>
        <td>Tanggal Uji</td>
        <td>: <?= $attemp[0]['attemp_date'] ?></td>
      </tr>
    </table><br><br>

    <h6 style="margin: 0 0 1rem 0; font-size: 16px;">Hasil Pengujian</h6>

    <?php for ($i=0; $i < count($label) ; $i++) { ?>
    <div style="display: block; width: 100%; height: 30px;">
      <p style="display: inline-block; margin: 0; width: 280px;"><?= $label[$i] ?></p>
      <div style="display: inline-block; width: 400; text-align: right;">
        <div class="progress" style="display: inline-block; ">
          <div class="bar" style="width:<?=$perpoint[$i]?>%"></div>
        </div>
        <p style="display: inline-block; margin: 0 0 0 10px;">
          <strong><?= $attemppointaspect[$i] ?>/<?= $questionpointaspect[$i] ?></strong> poin
        </p>
      </div>
    </div>
    <?php } ?>

    <div style="width:0%"></div><br><br>
    <h6 style="margin: 0 0 1rem 0; font-size: 16px;">Saran Pengembangan</h6>

    <?php foreach ($label as $lb) : 
    foreach ($handle as $hd) :
    $ks = true;
    if ($lb == $hd['name']) {
      $ks = false;
    } 
    
    if ($ks == false) : ?>
    <div>
      <div class="tabel">
        <table style="width: 100%;">
          <tr>
            <th style="width: 100px;">Aspek</th>
            <td><?= $lb ?></td>
          </tr>
          <tr>
            <th>Saran</th>
            <td>
              <ul style="position: relative; padding-left: 20px; text-align: left;">
                <?php foreach ($handle as $hd) : 
                if ($lb == $hd['name']) : ?>
                <li><?= $hd['handle'] ?></li>
                <?php endif;
                endforeach; ?>
              </ul>
            </td>
          </tr>
        </table>
        <br>
      </div>
    </div>
    <?php 
    break;
    endif;
    endforeach;
    endforeach;?>

    <i style="margin-left: 3px;">Detai lengkap kunjungi <strong><?=$access?></strong></i><br>
    <i style="margin-left: 3px;">Dicetak oleh <strong> <?= $ipaddress ?> </strong> dengan <strong> <?= $browser ?>
      </strong> pada <strong>
        <?=$time?> </strong></i>
  </div>

  <footer>
    <p>Salinan dari <strong><?=$attemp[0]['aspect']?></strong> [<?=$attemp[0]['slug']?>]</p>
  </footer>
</body>

</html>