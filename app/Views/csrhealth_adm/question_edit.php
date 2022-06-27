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
  <link rel="stylesheet" href="<?=base_url('resources/csrhealth_adm/vendor/jquery-datatables-bs3/assets/css/datatables.css')?>" />

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
              <img src="<?=base_url('resources/csrhealth_adm/images/!logged-user.jpg')?>" alt="Joseph Doe" class="img-circle"
                data-lock-picture="<?=base_url('resources/csrhealth_adm/images/!logged-user.jpg')?>" />
            </figure>
            <div class="profile-info" data-lock-name="<?=$session->get('name');?>" data-lock-email="<?=$session->get('email');?>">
              <span class="name"><?=$session->get('name');?></span>
              <span class="role">administrator</span>
            </div>

            <i class="fa custom-caret"></i>
          </a>

          <div class="dropdown-menu">
            <ul class="list-unstyled">
              <li class="divider"></li>
              <li>
                <a role="menuitem" tabindex="-1" href="<?=base_url('logout')?>"><i class="fa fa-power-off"></i> Logout</a>
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
        <?php foreach ($edit as $ed) : ?>
        <form class="form-horizontal form-bordered" action="/csr_adm/adm_question/edit/save" method="post">
          <?= csrf_field(); ?>
          <section class="panel">
            <header class="panel-heading">
              <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
              </div>

              <h2 class="panel-title">Edit Question</h2>
            </header>
            <div class="panel-body">
              <input type="hidden" name="id_question" value="<?= $ed['id_question'] ?>">

              <div class="form-group">
                <label class="col-md-3 control-label" for="question">Question</label>
                <div class="col-md-6">
                  <textarea class="form-control" rows="3" id="question" name="question" data-plugin-textarea-autosize
                    required><?= $ed['question'] ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label" for="point">Point</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="point" name="point" value="<?= $ed['point'] ?>"
                    required>
                  <span class="help-block">For decimal number use point (.)</span>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label" for="handle">Recom if 0 point</label>
                <div class="col-md-6">
                  <textarea class="form-control" rows="3" id="handle" name="handle" data-plugin-textarea-autosize ><?= $ed['handle'] ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label" for="aspect">Aspect</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="aspect" name="aspect" value="<?= $ed['name'] ?>"
                    disabled>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label" for="parent">Expand from Question</label>
                <div class="col-md-6">
                  <?php if ($ed['parent'] == 0) { ?>
                  <input type="text" class="form-control" id="parent" name="parent" value="Parent Question" disabled>
                  <?php } else { ?>
                  <input type="text" class="form-control" id="parent" name="parent" value="<?= $ed['parent'] ?>"
                    disabled>
                  <?php }?>
                </div>
              </div>

            </div>
            <footer class="panel-footer">
              <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <button type="submit" class="btn btn-primary">Save Change(s)</button>
                  <a href="<?=base_url('csr_adm/adm_question')?>" class="btn btn-default">Cancel</a>
                </div>
              </div>
            </footer>
          </section>
        </form>
        <?php endforeach; ?>
        <!-- end: page -->
      </section>
    </div>
  </section>

  <!-- Vendor -->
  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery/jquery.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery-browser-mobile/jquery.browser.mobile.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/bootstrap/js/bootstrap.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/nanoscroller/nanoscroller.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/magnific-popup/magnific-popup.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery-placeholder/jquery.placeholder.js')?>"></script>

  <!-- Specific Page Vendor -->
  <script src="<?=base_url('resources/csrhealth_adm/vendor/select2/select2.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery-datatables/media/js/jquery.dataTables.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')?>">
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
  <script src="<?=base_url('resources/csrhealth_adm/javascripts/tables/examples.datatables.row.with.details.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/javascripts/tables/examples.datatables.tabletools.js')?>"></script>
</body>

</html>