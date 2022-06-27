<?=$this->extend('layout/base');?>

<?=$this->section('content');?>
<div class="floating-button">
  <a class="btn btn-print d-flex justify-content-between"
    href="<?=base_url('printpdf?ap='.$attemp[0]['aspect'].'&slug='.$attemp[0]['slug'])?>" target="_blank" role="button">
    <div>
      <i class="fa fa-print" aria-hidden="true" style="font-size: 26px; width: 60px;"></i>
    </div>
    <div style="overflow: hidden; text-align: center; width: 100%;">
      <strong>Print Report</strong>
    </div>
  </a>
</div>

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
          <table class="table table-bordered" style="font-size: 14px; margin-bottom: 0;">
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
        </div>

        <div class="result shadow-sm mb-4"
          style="display: flex; flex-direction: column; height: 100%; justify-content: space-between;">
          <p class="title mb-2">TOTAL PEROLEHAN POIN</p>
          <?php
          $prcpoint = $attemppoints / $totalpoints * 100;
          if ($prcpoint >= 80) { ?>
          <div style="align-self: center;">
            <h1 class="d-inline" style="font-size: 72px; font-weight: 900; color: limegreen;"><?= $attemppoints ?></h1>
            <h5 class="d-inline" style="font-weight: 900; color: #263238;"> /<?= $totalpoints ?> point</h5>
          </div>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"
              aria-valuenow="<?=$prcpoint?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$prcpoint?>%"></div>
          </div>
          <?php } elseif ($prcpoint < 80 && $prcpoint > 40) { ?>
          <div style="align-self: center;">
            <h1 class="d-inline" style="font-size: 72px; font-weight: 900; color: #ffcc00;"><?= $attemppoints ?></h1>
            <h5 class="d-inline" style="font-weight: 900; color: #263238;"> /<?= $totalpoints ?> point</h5>
          </div>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar"
              aria-valuenow="<?=$prcpoint?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$prcpoint?>%"></div>
          </div>
          <?php } else { ?>
          <div style="align-self: center;">
            <h1 class="d-inline" style="font-size: 72px; font-weight: 900; color: red;"><?= $attemppoints ?></h1>
            <h5 class="d-inline" style="font-weight: 900; color: #263238;"> /<?= $totalpoints ?> point</h5>
          </div>
          <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"
              aria-valuenow="<?=$prcpoint?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$prcpoint?>%"></div>
          </div>
          <?php } ?>
        </div>

        <div class="result shadow-sm" style="display: flex; flex-direction: column;">
          <p class="title">DETAIL POIN</p>
          <div style="display: flex; flex-direction: column;">
            <?php
            $label = json_decode($js_label); 
            $perc = json_decode($js_perpoint);
            for ($i=0; $i < count($label); $i++) : ?>
            <div style="display: flex; justify-content: space-between;">
              <p style="margin: 1rem 0 4px; font-size: 11px; font-weight: 500; color: #3a3b3c; text-align: right;">
                <?= strtoupper($label[$i]) ?></p>
              <p style="margin: 1rem 0 4px; font-size: 11px; font-weight: 900; color: #3a3b3c; text-align: right;">
                <?= $attemppointaspect[$i] ?>/<?= $questionpointaspect[$i] ?></p>
            </div>
            <div class="progress" style="height: 5px;">
              <?php if ($perc[$i] >= 80) { ?>
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar"
                aria-valuenow="<?= $perc[$i] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $perc[$i] ?>%">
              </div>
              <?php } else if ($perc[$i] < 80 && $perc[$i] >= 50) { ?>
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar"
                aria-valuenow="<?= $perc[$i] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $perc[$i] ?>%">
              </div>
              <?php } else { ?>
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar"
                aria-valuenow="<?= $perc[$i] ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $perc[$i] ?>%">
              </div>
              <?php } ?>
            </div>
            <?php endfor?>
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

  <div class="container shadow-sm mb-4">
    <div style="padding: 1rem; background-color: #fff; text-align: center;">
      <h3 style="font-weight: 600; margin: 0; color: #009ffd;">Saran Pengembangan</h3><br>
      <div class="continer-saran" style="text-align: left;">
        <div class="row row-cols-1 row-cols-md-2 g-4">
          <?php foreach ($label as $lb) : 
          foreach ($handle as $hd) :
          $ks = true;
          if ($lb == $hd['name']) {
            $ks = false;
          } 
          
          if ($ks == false) : ?>
          <div class="col">
            <div class="card h-100 border-0 rounded-0 flex-row overflow-hidden">
              <div style="width: 6px; background-color: #009ffd;"></div>
              <div class="card-body pt-0 pb-0" style="width: 100%;">
                <h5 class="card-title"><?= $lb ?></h5>
                <ul class="mb-0">
                  <?php foreach ($handle as $hd) : 
                  if ($lb == $hd['name']) : ?>
                  <li><?= $hd['handle'] ?></li>
                  <?php endif;
                  endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
          <?php 
          break;
          endif;
          endforeach;
          endforeach;?>
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