<?=$this->extend('layout/base');?>

<?=$this->section('content');?>
<div class="container shadow-sm mb-4 mt-3">
  <div style="padding: 2rem; background-color: #fff; text-align: center;">
    <h1 class="title" style="font-weight: 900; margin: 0; color: #009ffd;">Hasil Cek Persiapan Proper</h1>
  </div>
</div>

<section class="resultbox">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4" style="display: flex; flex-direction: column; flex: 1;">
        <div class="result shadow-sm mb-4" style="display: flex; flex-direction: column">
          <p class="title mb-2">INFORMASI TES</p>
          <table class="table table-bordered" style="font-size: 14px;">
            <tbody>
              <tr>
                <td>Nama Perusahaan</td>
                <td><?= $attemp[0]['name'] ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><?= $attemp[0]['email'] ?></td>
              </tr>
              <tr>
                <td>Aspek Proper</td>
                <td><?= $attemp[0]['aspect'] ?></td>
              </tr>
              <tr>
                <td>Tanggal Uji</td>
                <td><?= $attemp[0]['attemp_date'] ?></td>
              </tr>
            </tbody>
          </table>
          <div style="padding: 1rem; background-color: #009ffd; text-align: center;">
            <h6 style="padding: 0; color: white;"><strong>🛈 Hasil lengkap dari test dikirimkan ke email yang diinputkan
                pada form.</strong></h6>
          </div>
        </div>

        <div class="result shadow-sm" style="display: flex; flex-direction: column; height: 100%;">
          <p class="title mb-2">TOTAL POIN</p>
          <div style="margin: auto; text-align: center;"><br>
          <?php
            $prcpoint = $attemppoints / $totalpoints * 100;
            if ($prcpoint >= 80) { ?>
            <h1 class="d-inline" style="font-weight: 900; font-size: 120px; color: limegreen;"><?= $attemppoints ?></h1>
            <h1 class="d-inline" style="font-weight: 900; color: #263238;">/<?= $totalpoints ?></h1>
            <br>
            <h1 style="color: limegreen; font-weight: 600;">poin total</h1><br>
            <?php } elseif ($prcpoint < 80 && $prcpoint > 40) { ?>
            <h1 class="d-inline" style="font-weight: 900; font-size: 120px; color: #ffcc00;"><?= $attemppoints ?></h1>
            <h1 class="d-inline" style="font-weight: 900; color: #263238;">/<?= $totalpoints ?></h1>
            <br>
            <h1 style="color: #ffcc00; font-weight: 600;">poin total</h1><br>
            <?php } else { ?>
            <h1 class="d-inline" style="font-weight: 900; font-size: 120px; color: red;"><?= $attemppoints ?></h1>
            <h1 class="d-inline" style="font-weight: 900; color: #263238;">/<?= $totalpoints ?></h1>
            <br>
            <h1 style="color: red; font-weight: 600;">poin total</h1><br>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="col-md-8 mb-4" style="display: flex; flex-direction: column;">
        <div class="result shadow-sm" style="padding: 1rem 2rem; display: flex; flex-direction: column; height: 100%;">
          <p class="title mb-2">GRAFIK HASIL CEK PERSIAPAN PROPER</p>
          <div class="chart-container" style="display: flex; height: 100%;">
            <canvas id="radarChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js"></script>
<script>
var ctx = document.getElementById('radarChart').getContext('2d');
var radarChart = new Chart(ctx, {
  type: 'radar',
  data: {
    labels: <?php echo $js_label; ?>,
    datasets: [{
      label: 'Aspect Result',
      data: <?php echo $js_perpoint; ?>,
      fill: true,
      backgroundColor: 'rgba(0, 159, 253, 0.2)',
      borderColor: 'rgb(0, 159, 253)',
      pointBackgroundColor: 'rgb(0, 159, 253)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(255, 99, 132)'
    }]
  },
  options: {
    scales: {
      r: {
        suggestedMin: 0,
        suggestedMax: 100
      }
    },
    elements: {
      line: {
        borderWidth: 3
      }
    }
  }
});
</script>
<?=$this->endSection();?>