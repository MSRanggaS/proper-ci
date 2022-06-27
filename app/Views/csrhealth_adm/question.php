<!doctype html>
<html class="fixed">

<head>

  <!-- Basic -->
  <meta charset="UTF-8">

  <title>CSR Admin | Question</title>
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

  <!-- Specific Page Vendor CSS -->
  <link rel="stylesheet" href="<?=base_url('resources/csrhealth_adm/vendor/select2/select2.css')?>" />
  <link rel="stylesheet"
    href="<?=base_url('resources/csrhealth_adm/vendor/jquery-datatables-bs3/assets/css/datatables.css')?>" />

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
  <section class="body">

    <!-- start: header -->
    <header class="header">
      <div class="logo-container">
        <a href="<?=base_url('csr_adm/adm_index')?>" class="logo">
          <img src="<?=base_url('resources/pictures/logo.png')?>" height="35" alt="JSOFT Admin" />
        </a>
        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
          data-fire-event="sidebar-left-opened">
          <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
      </div>

      <!-- start: search & user box -->
      <div class="header-right">

        <span class="separator"></span>

        <div id="userbox" class="userbox">
          <a href="#" data-toggle="dropdown">
            <figure class="profile-picture">
              <img src="<?=base_url('resources/csrhealth_adm/images/!logged-user.jpg')?>" alt="Joseph Doe"
                class="img-circle"
                data-lock-picture="<?=base_url('resources/csrhealth_adm/images/!logged-user.jpg')?>" />
            </figure>
            <div class="profile-info" data-lock-name="<?=$session->get('name');?>"
              data-lock-email="<?=$session->get('email');?>">
              <span class="name"><?=$session->get('name');?></span>
              <span class="role">administrator</span>
            </div>

            <i class="fa custom-caret"></i>
          </a>

          <div class="dropdown-menu">
            <ul class="list-unstyled">
              <li class="divider"></li>
              <li>
                <a role="menuitem" tabindex="-1" href="<?=base_url('logout')?>"><i class="fa fa-power-off"></i>
                  Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
      <!-- start: sidebar -->
      <aside id="sidebar-left" class="sidebar-left">

        <div class="sidebar-header">
          <div class="sidebar-title">
            CSR Health Admin
          </div>
          <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
            data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
          </div>
        </div>

        <div class="nano">
          <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
              <ul class="nav nav-main">
                <li>
                  <a href="<?=base_url('csr_adm/adm_index')?>">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Dashboard</span>
                  </a>
                </li>

                <div class="sidebar-header">
                  <div class="sidebar-title">
                    Navigation
                  </div>
                </div>

                <li>
                  <a href="<?=base_url('csr_adm/adm_aspect')?>">
                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                    <span>Aspect</span>
                  </a>
                </li>
                <li class="nav-active">
                  <a href="<?=base_url('csr_adm/adm_question')?>">
                    <i class="fa fa-question" aria-hidden="true"></i>
                    <span>Question</span>
                  </a>
                </li>
                <li class="nav-parent">
                  <a>
                  <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Respondent</span>
                  </a>
                  <ul class="nav nav-children">
                    <li>
                      <a href="<?=base_url('csr_adm/adm_respondent/review')?>">
                        In Review Respondent
                      </a>
                    </li>
                    <li>
                      <a href="<?=base_url('csr_adm/adm_respondent/validated')?>">
                        Validated Respondent
                      </a>
                    </li>
                    <li>
                      <a href="<?=base_url('csr_adm/adm_respondent/draft')?>">
                        In Draft Respondent
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="<?=base_url('csr_adm/adm_result')?>">
                    <i class="fa fa-table" aria-hidden="true"></i>
                    <span>Result</span>
                  </a>
                </li>

                <div class="sidebar-header">
                  <div class="sidebar-title">
                    Configuration
                  </div>
                </div>

                <li>
                  <a href="<?=base_url('csr_adm/conf_admin')?>">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <span>User Admin</span>
                  </a>
                </li>
              </ul>
            </nav>

            <hr class="separator" />

          </div>

        </div>

      </aside>
      <!-- end: sidebar -->

      <section role="main" class="content-body">
        <header class="page-header">
          <h2>Question</h2>

          <div class="right-wrapper pull-right" style="margin-right: 2rem;">
            <ol class="breadcrumbs">
              <li>
                <a href="<?=base_url('csr_adm/adm_index')?>">
                  <i class="fa fa-home"></i>
                </a>
              </li>
              <li><span>Question</span></li>
            </ol>
          </div>
        </header>

        <!-- start: page -->
        <section class="panel">
          <header class="panel-heading">
            <div class="panel-actions">
              <a href="#" class="fa fa-caret-down"></a>
            </div>

            <h2 class="panel-title">Question List</h2>
          </header>
          <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-details">
              <thead>
                <tr>
                  <th>Question</th>
                  <th>Aspect</th>
                  <th>Point</th>
                  <th>Actions</th>
                  <th class="d-none">Type</th>
                  <th class="d-none">Handle</th>
                  <th class="d-none">Expand</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($questions as $q) :?>
                <tr>
                  <td><?= $q['question'] ?></td>
                  <td><?= $q['name'] ?></td>
                  <td class="center"><?= $q['point'] ?></td>
                  <td class="actions">
                    <a href="<?=base_url('csr_adm/adm_question/edit/'.$q['id_question'])?>"
                      class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                    <form action="<?=base_url('csr_adm/adm_question/'.$q['id_question'])?>" method="POST"
                      style="display: inline;">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" class="btn-delete"
                        onclick="return confirm('Are you sure you want to delete this question?');"><i
                          class="fa fa-trash-o"></i></button>
                    </form>
                  </td>
                  <td class="d-none"><?= $q['is_parent'] ?></td>
                  <td class="d-none"><?= $q['handle'] ?></td>
                  <td class="d-none"><?= $q['parent'] ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </section>

        <form class="form-horizontal form-bordered" action="/csr_adm/adm_question/add" method="POST">
          <?= csrf_field(); ?>
          <section class="panel">
            <header class="panel-heading">
              <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
              </div>

              <h2 class="panel-title">Add Question</h2>
            </header>

            <div class="panel-body">
              <?php if (!empty(session()->getFlashdata('error'))) : ?>
              <div class="alert alert-danger alert-dismissible show" role="alert">
                <h4>Add Question Failed</h4>
                </hr />
                <?php echo session()->getFlashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php endif; ?>

              <div class="form-group">
                <label class="col-md-3 control-label" for="inputSuccess">Type</label>
                <div class="col-md-6">
                  <select class="form-control mb-md" id="type" name="type">
                    <option value="1">Parent</option>
                    <option value="2">Label</option>
                    <option value="0">Child</option>
                  </select>
                </div>
              </div>

              <div class="form-group" id="question" >
                <label class="col-md-3 control-label" for="question">Question</label>
                <div class="col-md-6">
                  <textarea class="form-control" rows="3" name="question" data-plugin-textarea-autosize
                    required></textarea>
                </div>
              </div>

              <div class="form-group" id="point">
                <label class="col-md-3 control-label" for="point">Point</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="point">
                  <span class="help-block">For decimal number use point (.)</span>
                </div>
              </div>

              <div class="form-group" id="handle">
                <label class="col-md-3 control-label" for="handle">Recom if 0 point</label>
                <div class="col-md-6">
                  <textarea class="form-control" rows="3" name="handle" data-plugin-textarea-autosize
                  ></textarea>
                </div>
              </div>

              <div class="form-group" id="aspect">
                <label class="col-md-3 control-label" for="inputSuccess">Aspect</label>
                <div class="col-md-6">
                  <select data-plugin-selectTwo class="form-control populate" name="aspect">
                    <option>-- Select Sub-aspect --</option>
                    <?php foreach ($aspect as $a) : ?>
                    <optgroup label="<?= $a['name'] ?>">
                      <?php foreach ($subaspect as $sa) : 
                        if ($sa['id_aspectproper'] == $a['id_aspectproper']) {?>
                      <option value="<?= $sa['id_subaspect'] ?>"><?= $sa['name'] ?></option>
                      <?php } endforeach; ?>
                    </optgroup>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group d-none" id="parent">
                <label class="col-md-3 control-label">Expand from Question</label>
                <div class="col-md-6">
                  <select data-plugin-selectTwo class="form-control populate" name="parent">
                    <option>Parent Question</option>
                    <?php foreach ($subaspect as $sa) : ?>
                    <optgroup label="<?= $sa['name'] ?>">
                      <?php foreach ($questions as $q) : 
                        if ($q['id_subaspect'] == $sa['id_subaspect'] && $q['parent'] == 0) {?>
                      <option value="<?= $q['id_question'] ?>"><?= $q['question'] ?></option>
                      <?php } endforeach; ?>
                    </optgroup>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="form-group d-none" id="label">
                <label class="col-md-3 control-label">Expand from Label</label>
                <div class="col-md-6">
                  <select data-plugin-selectTwo class="form-control populate" name="label">
                    <option>Select Label</option>
                    <?php foreach ($subaspect as $sa) : ?>
                    <optgroup label="<?= $sa['name'] ?>">
                      <?php foreach ($questions as $q) : 
                        if ($q['id_subaspect'] == $sa['id_subaspect'] && $q['is_parent'] == 2) {?>
                      <option value="<?= $q['id_question'] ?>"><?= $q['question'] ?></option>
                      <?php } endforeach; ?>
                    </optgroup>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <footer class="panel-footer">
              <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-default">Reset</button>
                </div>
              </div>
            </footer>
          </section>
        </form>
        <!-- end: page -->
      </section>
    </div>
  </section>

  <script>
  var point = document.getElementById("point");
  var handle = document.getElementById("handle");
  var aspect = document.getElementById("aspect");
  var parent = document.getElementById("parent");
  var label = document.getElementById("label");
  document.getElementById('type').addEventListener('change', function() {
    if (this.value == 1) {
      parent.classList.add("d-none");
      aspect.classList.remove("d-none");
      handle.classList.remove("d-none");
      point.classList.remove("d-none");
      label.classList.add("d-none");
    }
    if (this.value == 2) {
      parent.classList.remove("d-none");
      aspect.classList.add("d-none");
      handle.classList.add("d-none");
      point.classList.add("d-none");
      label.classList.add("d-none");
    }
    if (this.value == 0) {
      parent.classList.add("d-none");
      aspect.classList.add("d-none");
      handle.classList.remove("d-none");
      point.classList.remove("d-none");
      label.classList.remove("d-none");
    }
  });
  </script>

  <!-- Vendor -->
  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery/jquery.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery-browser-mobile/jquery.browser.mobile.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/bootstrap/js/bootstrap.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/nanoscroller/nanoscroller.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/magnific-popup/magnific-popup.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery-placeholder/jquery.placeholder.js')?>"></script>

  <!-- Specific Page Vendor -->
  <script src="<?=base_url('resources/csrhealth_adm/vendor/select2/select2.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery-datatables/media/js/jquery.dataTables.js')?>">
  </script>
  <script
    src="<?=base_url('resources/csrhealth_adm/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')?>">
  </script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery-datatables-bs3/assets/js/datatables.js')?>"></script>

  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery-autosize/jquery.autosize.js')?>"></script>

  <!-- Theme Base, Components and Settings -->
  <script src="<?=base_url('resources/csrhealth_adm/javascripts/theme.js')?>"></script>

  <!-- Theme Custom -->
  <script src="<?=base_url('resources/csrhealth_adm/javascripts/theme.custom.js')?>"></script>

  <!-- Theme Initialization Files -->
  <script src="<?=base_url('resources/csrhealth_adm/javascripts/theme.init.js')?>"></script>


  <!-- Examples -->
  <script src="<?=base_url('resources/csrhealth_adm/javascripts/tables/examples.datatables.default.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/javascripts/tables/examples.datatables.row.with.details.js')?>">
  </script>
  <script src="<?=base_url('resources/csrhealth_adm/javascripts/tables/examples.datatables.tabletools.js')?>"></script>
</body>

</html>