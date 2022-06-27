<!doctype html>
<html class="fixed">

<head>

  <!-- Basic -->
  <meta charset="UTF-8">

  <title>CSR Admin | Aspect</title>
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
  <link rel="stylesheet" href="<?=base_url('resources/csrhealth_adm/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')?>" />
  <link rel="stylesheet" href="<?=base_url('resources/csrhealth_adm/vendor/pnotify/pnotify.custom.css')?>" />

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

                <li class="nav-active">
                  <a href="<?=base_url('csr_adm/adm_aspect')?>">
                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                    <span>Aspect</span>
                  </a>
                </li>
                <li>
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
          <h2><a href="<?=base_url('csr_adm/adm_aspect')?>" style="color: white;"><i class="fa fa-chevron-left" aria-hidden="true"></i>
              Back</a></h2>

          <div class="right-wrapper pull-right" style="margin-right: 2rem;">
            <ol class="breadcrumbs">
              <li>
                <a href="<?=base_url('csr_adm/adm_index')?>">
                  <i class="fa fa-home"></i>
                </a>
              </li>
              <li><span>Sub-aspect</span></li>
            </ol>
          </div>
        </header>

        <!-- start: page -->
        <section class="panel">
          <?php if (!empty(session()->getFlashdata('successdelete'))) : ?>
          <div class="alert alert-success">
            Delete Success
          </div>
          <?php elseif (!empty(session()->getFlashdata('faildelete'))) : ?>
          <div class="alert alert-danger">
            Delete Failed. Incorrect input verification.
          </div>
          <?php endif ?>
          <header class="panel-heading">
            <div class="panel-actions">
              <a href="#" class="fa fa-caret-down"></a>
            </div>

            <h2 class="panel-title">Sub-aspect <?= $aspect[0]['name'] ?></h2>
          </header>
          <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
              <thead>
                <tr>
                  <th style="width: 100px;">ID</th>
                  <th>Aspect Name</th>
                  <th style="width: 200px;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($subaspect as $sa) : ?>
                <tr>
                  <td class="va-middle"><?= $sa['id_subaspect'] ?></td>
                  <td class="va-middle"><?= $sa['name'] ?></td>
                  <td class="va-middle"><a class="mb-xs mt-xs mr-xs modal-with-zoom-anim btn btn-xs btn-danger"
                      href="#confirmation-<?=$sa['id_subaspect']?>"><i class="fa fa-trash-o"></i> Delete</a></td>
                </tr>
                <div id="confirmation-<?=$sa['id_subaspect']?>"
                  class="zoom-anim-dialog modal-block modal-header-color modal-block-danger mfp-hide">
                  <section class="panel">
                    <header class="panel-heading">
                      <h2 class="panel-title">Attention!</h2>
                    </header>
                    <div class="panel-body">
                      <div class="modal-wrapper">
                        <div class="modal-icon">
                          <i class="fa fa-times-circle"></i>
                        </div>
                        <div class="modal-text">
                          <h4>Attention!</h4>
                          <p>Are you sure you want to delete this item? This action will delete question with sub-aspect
                            connected to this aspect.</p>
                          <p>Type <strong>"Delete <?=$sa['name']?>"</strong> to permanently delete this aspect</p>

                          <form action="<?=base_url('csr_adm/adm_aspect/subaspect/delete/'.$sa['id_subaspect'])?>" method="POST">
                            <?=csrf_field()?>
                            <input type="hidden" name="valid-true" value="Delete <?=$sa['name']?>">
                            <input type="text" class="form-control" name="valid-input" id="delconfirmation" required>
                        </div>
                      </div>
                    </div>
                    <footer class="panel-footer">
                      <div class="row">
                        <div class="col-md-12 text-right">
                          <button class="btn btn-default modal-dismiss">Cancel</button>
                          <button type="submit" class="mb-xs mt-xs mr-xs btn btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                    </footer>
                  </section>
                </div>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </section>

        <form class="form-horizontal form-bordered" action="<?=base_url('csr_adm/adm_aspect/subaspect/add')?>" method="POST">
          <?= csrf_field(); ?>
          <section class="panel">
            <header class="panel-heading">
              <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
              </div>

              <h2 class="panel-title">Add Sub-aspect to <strong><?= $aspect[0]['name'] ?></strong></h2>
            </header>

            <div class="panel-body">
              <?php if (!empty(session()->getFlashdata('error'))) : ?>
              <div class="alert alert-danger alert-dismissible show" role="alert">
                <h4>Add Failed</h4>
                </hr>
                <?php echo session()->getFlashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php endif; ?>

              <input type="hidden" name="id_aspectproper" value="<?= $aspect[0]['id_aspectproper'] ?>">

              <div class="form-group">
                <label class="col-md-3 control-label" for="name">Sub-aspect Name</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
              </div>

            </div>
            <footer class="panel-footer">
              <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <button class="btn btn-primary">Submit</button>
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
  <script src="<?=base_url('resources/csrhealth_adm/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js')?>"></script>

  <script src="<?=base_url('resources/csrhealth_adm/vendor/jquery-autosize/jquery.autosize.js')?>"></script>
  <script src="<?=base_url('resources/csrhealth_adm/vendor/pnotify/pnotify.custom.js')?>"></script>

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
  <script src="<?=base_url('resources/csrhealth_adm/javascripts/ui-elements/examples.modals.js')?>"></script>
</body>

</html>