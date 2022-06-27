<?=$this->extend('layout/base-2');?>

<?=$this->section('content');?>

<div class="container-fluid">
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="height: 620px; overflow: hidden;">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?=base_url('resources/img/aspek-1.png')?>" class="d-block w-100" alt="img1">
        <div class="header-overlay" style="height: 630px;top: -698px;">
          <div style="color:white;">
            <h1><?= $aspectproper[0]['name'] ?></h1><br>
            <p class="body-1"><?= $aspectproper[0]['detail'] ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container" style="top: -210px; position: relative;">
  <div class="row">
    <div class="col-lg-4 d-flex align-items-stretch">
      <div class="aspek">
        <h3 class="sub-head-1">Aspek yang direview</h3>
        <ol type="1" class="body-1">
          <?php 
          foreach ($subaspect as $sa) : ?>
          <li class="jarak"><?= $sa['name'] ?></li>
          <?php 
          endforeach ?>
        </ol>
      </div>
    </div>
    <div class="col-md-8 d-flex align-items-stretch" style="padding-left: 0;">
      <div class="form-awal">
        <h1 class="text-center" style="color:#2BB0FF;">Mulai tes sekarang!</h1>
        <p class="text-center">Isi form dibawah ini untuk memulai tes persiapan proper.</p>
        <?php if (!empty(session()->getFlashdata('error'))): ?>
        <div class="alert alert-danger" role="alert">
          <h4>Error</h4>
          </hr />
          <?php echo session()->getFlashdata('error'); ?>
        </div>
        <?php elseif (!empty(session()->getFlashdata('loginfirst'))) : ?>
        <div class="alert alert-danger">
          Silahkan <strong>isi form</strong> terlebih dahulu
        </div>
        <?php endif;?>
        <form action="/start" method="POST">
          <?=csrf_field();?>
          <input type="hidden" value="<?= $aspectproper[0]['slug'] ?>" name="slug">
          <div class="my-3">
            <p class="sub-head-5">Data Pribadi</p>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="nama" name="respondent" placeholder="Masukkan Nama" value="<?=old('respondent')?>" required>
              <label for="nama">Nama</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="jabatan" name="position" placeholder="Masukkan Jabatan di Perusahaan" value="<?=old('position')?>" required>
              <label for="jabatan">Jabatan di Perusahaan</label>
            </div>
            <div class="row g-2" aria-describedby="Help">
              <div class="col-md">
                <div class="form-floating">
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukkan Nomor Telepon" value="<?=old('phone')?>" required>
                  <label for="phone">No. HP</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" <?=old('email')?> required>
                  <label for="email">Alamat Email</label>
                </div>
              </div>
            </div>
            <div id="Help" class="form-text">Kami tidak akan memberitahu data pribadi anda kepada siapapun. 
              Hasil dari tes akan dikirimkan ke akamat email anda.</div>
          </div>
          <div class="my-3">
            <p class="sub-head-5">Data Perusahaan</p>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="namaPerusahaan" name="name" placeholder="Masukkan Nama Perusahaan" value="<?=old('name')?>" required>
              <label for="namaPerusahaan">Nama Perusahaan</label>
            </div>
            <div class="row g-2 mb-3" aria-describedby="Help">
              <div class="col-md">
                <div class="form-floating">
                  <select class="form-select" id="province" name="province"
                    aria-label="FloatingSelect label select example">
                    <option>Pilih Provinsi</option>
                    <?php foreach ($province['provinsi'] as $prov): ?>
                    <option value="<?=$prov['id']?>"><?=$prov['nama']?></option>
                    <?php endforeach;?>
                  </select>
                  <label for="provinsi">Provinsi</label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-floating">
                  <select class="city form-select" id="city" name="city" aria-label="FloatingSelect label select example">
                    <option>Pilih Kota</option>
                  </select>
                  <label for="kota">Kota</label>
                </div>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="alamat" name="street_name" placeholder="Masukkan Alamat Lengkap" value="<?=old('street_name')?>" required>
              <label for="alamat">Alamat lengkap</label>
            </div>
          </div>
          <div class="form-check mb-2">
            <input type="checkbox" class="form-check-input" id="setuju" name="agreement" value="1" required>
            <label for="setuju" class="form-check-label">Saya menyetujui Persyaratan Layanan dan Kebijakan Privasi Olahkarsa</label>
          </div>
          <div class="form-check mb-5">
            <input type="checkbox" class="form-check-input" id="benar" name="emailcheck" value="1" required>
            <label for="benar" class="form-check-label">Saya memastikan data yang tertera adalah benar</label>
          </div>
          <button class="btn btn-primary start btn-lg float-end" type="submit">
            Mulai Tes <i class="fa fa-arrow-right" aria-hidden="true"></i>
          </button>            
        </form>
      </div>
    </div>
  </div>
</div>
<?=$this->endSection();?> 

<?=$this->section('script');?>
<script>
$(document).ready(function() {
  $('#province').change(function() {
    $.ajax({
      url: "<?=base_url('pages/get_city')?>",
      method: "get",
      data: {
        id: $("#province").val(),
      },
      async: false,
      dataType: 'json',
      success: function(data) {
        var html = '';
        var i;
        html += '<option value"">Pilih Kota</option>';
        for (i = 0; i < data.length; i++) {
          html += '<option value="' + data[i].nama + '">' + data[i].nama + '</option>';
        }
        $('.city').html(html);
      }
    });
  });
});
</script>
<?=$this->endSection();?>