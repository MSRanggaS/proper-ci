<?=$this->extend('layout/base');?>

<?=$this->section('content');?>
<section class="msform">
  <?php
    $index_prog = 0;
    $index_step = 1;
    $q_idx = 0;
    $sq_idx = 0;
  ?>

  <div class="container">
    <div class="container shadow-sm">
      <!-- progress -->
      <ul id="progressbar" style="text-align: center; padding: 2rem 0 1rem 0;">
        <?php foreach ($subaspect as $sa) :
        if ($index_prog == 0) { ?>
        <li class="bullet done prog"><?= $sa['name'] ?></li>
        <?php 
        $index_prog++;
        } else { ?>
        <li class="bullet"><?= $sa['name'] ?></li>
        <?php 
        $index_prog++;
        } 
      endforeach; ?>
      </ul>
    </div>

    <form action="/finishattemp" method="post">
      <?php foreach ($subaspect as $sa) :
      if ($index_step == 1) { ?>
      <div class="step active">
        <div class="container shadow-sm" style="margin-bottom: 2rem;">
          <div class="question-header" style="height: 329px; overflow: hidden;">
            <img class="header-question-pict" src="<?=base_url('resources/pictures/aspect-1.jpg')?>" alt="">
            <div class="header-question-overlay">
              <table style="height: 100%; margin-left: 5%;">
                <tbody>
                  <tr>
                    <td class="align-middle">
                      <h1 style="width: 80%; font-weight: 900; font-size: 41px; color: white;"><?= $sa['name'] ?></h1>
                      <br>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="question-item">
            <?php foreach ($questions as $q) :
            if ($q['is_parent'] == 1 && $q['id_subaspect'] == $sa['id_subaspect']) { ?>
            <div class="question-card">

              <div class="row">
                <div class="col" style="max-width: 30px;">
                  <h6><?= $q_idx+1 ?></h6>
                </div>
                <div class="col">
                  <div class="answer-radio">
                    <input type="hidden" name="idquestion-<?= $q_idx ?>" value="<?= $q['id_question'] ?>">
                    <h6 class="question"><?= $q['question'] ?></h6>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qanswer-<?= $q_idx ?>" id="ya-<?= $q_idx ?>"
                        value="1" onclick="showchild(<?= $q_idx ?>)" required>
                      <label class="form-check-label" for="ya-<?= $q_idx ?>">
                        Ya
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qanswer-<?= $q_idx ?>" id="tidak-<?= $q_idx ?>"
                        onclick="hidechild(<?= $q_idx ?>)" value="0">
                      <label class="form-check-label" for="tidak-<?= $q_idx ?>">
                        Tidak
                      </label>
                    </div>
                  </div>

                  <div class="child<?= $q_idx ?> d-none" id="child<?= $q_idx ?>">
                    <?php foreach ($questions as $sq) : 
                    if ($sq['parent'] == $q['id_question']) : ?>
                    <br>
                    <h6><?= $sq['question'] ?></h6>

                    <?php foreach ($questions as $que) : 
                    if ($que['parent'] == $sq['id_question']) { ?>
                    <div class="checkbox">
                      <label>
                        <input type="hidden" name="idsquestion-<?= $sq_idx ?>" value="<?=$que['id_question']?>">
                        <input type="checkbox" name="sqanswer-<?= $sq_idx ?>" value="1">
                        <?= $que['question'] ?>
                      </label>
                    </div>
                    <?php $sq_idx++; } 
                    endforeach;
                    endif;
                    endforeach;?>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <?php 
            $q_idx++;
            }
            endforeach; ?>

            <div class="button-container" style="margin-top: 2rem;">
              <button type="button" class="next-btn action-button">Berikutnya</button>
            </div>
          </div>
        </div>
      </div>
      <?php 
      $index_step++;
      } else if ($index_step == $index_prog) { ?>
      <div class="step">
        <div class="container shadow-sm" style="margin-bottom: 2rem;">
          <div class="question-header" style="height: 329px; overflow: hidden;">
            <img class="header-question-pict" src="<?=base_url('resources/pictures/aspect-1.jpg')?>" alt="">
            <div class="header-question-overlay">
              <table style="height: 100%; margin-left: 5%;">
                <tbody>
                  <tr>
                    <td class="align-middle">
                      <h1 style="width: 80%; font-weight: 900; font-size: 41px; color: white;"><?= $sa['name'] ?></h1>
                      <br>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="question-item">
            <?php foreach ($questions as $q) :
            if ($q['is_parent'] == 1 && $q['id_subaspect'] == $sa['id_subaspect']) { ?>
            <div class="question-card">

              <div class="row">
                <div class="col" style="max-width: 30px;">
                  <h6><?= $q_idx+1 ?></h6>
                </div>
                <div class="col">
                  <div class="answer-radio">
                    <input type="hidden" name="idquestion-<?= $q_idx ?>" value="<?= $q['id_question'] ?>">
                    <h6 class="question"><?= $q['question'] ?></h6>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qanswer-<?= $q_idx ?>" id="ya-<?= $q_idx ?>"
                        value="1" onclick="showchild(<?= $q_idx ?>)" required>
                      <label class="form-check-label" for="ya-<?= $q_idx ?>">
                        Ya
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qanswer-<?= $q_idx ?>" id="tidak-<?= $q_idx ?>"
                        onclick="hidechild(<?= $q_idx ?>)" value="0">
                      <label class="form-check-label" for="tidak-<?= $q_idx ?>">
                        Tidak
                      </label>
                    </div>
                  </div>

                  <div class="child<?= $q_idx ?> d-none" id="child<?= $q_idx ?>">
                    <?php foreach ($questions as $sq) : 
                    if ($sq['parent'] == $q['id_question']) : ?>
                    <br>
                    <h6><?= $sq['question'] ?></h6>

                    <?php foreach ($questions as $que) : 
                    if ($que['parent'] == $sq['id_question']) { ?>
                    <div class="checkbox">
                      <label>
                        <input type="hidden" name="idsquestion-<?= $sq_idx ?>" value="<?=$que['id_question']?>">
                        <input type="checkbox" name="sqanswer-<?= $sq_idx ?>" value="1">
                        <?= $que['question'] ?>
                      </label>
                    </div>
                    <?php $sq_idx++; } 
                    endforeach;
                    endif;
                    endforeach;?>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <?php 
            $q_idx++;
            }
            endforeach; ?>

            <div class="button-container" style="margin-top: 2rem;">
              <button type="button" class="previous-btn action-button">Kembali</button>
              <button type="button" class="action-button" data-bs-toggle="modal" data-bs-target="#submitconfirmation">
                Submit
              </button>
            </div>
          </div>
        </div>
      </div>
      <?php 
      $index_step++;
      } else { ?>
      <div class="step">
        <div class="container shadow-sm" style="margin-bottom: 2rem;">
          <div class="question-header" style="height: 329px; overflow: hidden;">
            <img class="header-question-pict" src="<?=base_url('resources/pictures/aspect-1.jpg')?>" alt="">
            <div class="header-question-overlay">
              <table style="height: 100%; margin-left: 5%;">
                <tbody>
                  <tr>
                    <td class="align-middle">
                      <h1 style="width: 80%; font-weight: 900; font-size: 41px; color: white;"><?= $sa['name'] ?></h1>
                      <br>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="question-item">
            <?php foreach ($questions as $q) :
            if ($q['is_parent'] == 1 && $q['id_subaspect'] == $sa['id_subaspect']) { ?>
            <div class="question-card">

              <div class="row">
                <div class="col" style="max-width: 30px;">
                  <h6><?= $q_idx+1 ?></h6>
                </div>
                <div class="col">
                  <div class="answer-radio">
                    <input type="hidden" name="idquestion-<?= $q_idx ?>" value="<?= $q['id_question'] ?>">
                    <h6 class="question"><?= $q['question'] ?></h6>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qanswer-<?= $q_idx ?>" id="ya-<?= $q_idx ?>"
                        value="1" onclick="showchild(<?= $q_idx ?>)" required>
                      <label class="form-check-label" for="ya-<?= $q_idx ?>">
                        Ya
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="qanswer-<?= $q_idx ?>" id="tidak-<?= $q_idx ?>"
                        onclick="hidechild(<?= $q_idx ?>)" value="0">
                      <label class="form-check-label" for="tidak-<?= $q_idx ?>">
                        Tidak
                      </label>
                    </div>
                  </div>

                  <div class="child d-none" id="child<?= $q_idx ?>">
                    <?php foreach ($questions as $sq) : 
                    if ($sq['parent'] == $q['id_question']) : ?>
                    <br>
                    <h6><?= $sq['question'] ?></h6>

                    <?php foreach ($questions as $que) : 
                    if ($que['parent'] == $sq['id_question']) { ?>
                    <div class="checkbox">
                      <label>
                        <input type="hidden" name="idsquestion-<?= $sq_idx ?>" value="<?=$que['id_question']?>">
                        <input type="checkbox" name="sqanswer-<?= $sq_idx ?>" value="1">
                        <?= $que['question'] ?>
                      </label>
                    </div>
                    <?php $sq_idx++; } 
                    endforeach;
                    endif;
                    endforeach;?>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <?php 
            $q_idx++;
            }
            endforeach; ?>

            <div class="button-container" style="margin-top: 2rem;">
              <button type="button" class="previous-btn action-button">Kembali</button>
              <button type="button" class="next-btn action-button">Berikutnya</button>
            </div>
          </div>
        </div>
      </div>
      <?php
      $index_step++;
      }
      endforeach; ?>

      <input type="hidden" name="aspectproper" value="<?= $aspectproper[0]['slug'] ?>">
      <input type="hidden" name="jmlsoal" value="<?= $q_idx ?>">
      <input type="hidden" name="jmlsubsoal" value="<?= $sq_idx ?>">

      <div class="modal" id="submitconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content" style="border: 0; border-radius: 0;">
            <div class="modal-header" style="background-color: #009ffd; color: #fff; border-radius: 0;">
              <h5 class="modal-title">Konfirmasi Jawaban</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <b>Selesaikan sekarang? Pastikan semua jawaban anda telah terisi.</b><br><br>
              <div class="alert alert-info" role="alert" style="border-radius: 0;">
                <div style="display: flex;">
                  <div style="display: flex;">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                  </div>
                  <div style="display: flex; margin-left: 10px;">
                    <p style="font-size: 14px; margin-bottom: 0;"> Jika tidak dapat melakukan submit silahkan periksa
                      kembali pertanyaan yang ada.</p>
                  </div>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="action-button bg-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="action-button">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>

<script>
function showchild(id) {
  let child = document.getElementById('child' + id);
  child.classList.remove("d-none");
}

function hidechild(id) {
  let child = document.getElementById('child' + id);
  child.classList.add("d-none");
}
</script>
<?=$this->endSection();?>