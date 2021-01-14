<?=$this->extend('/admin/layout/app')?>

<?=$this->section('css')?>
  <!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
  <link href="<?=base_url("global_assets/css/icons/icomoon/styles.min.css")?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url("global_assets/css/icons/material/styles.min.css")?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url("global_assets/assets/css/bootstrap.min.css")?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url("global_assets/assets/css/bootstrap_limitless.min.css")?>" rel="stylesheet"
        type="text/css">
  <link href="<?=base_url("global_assets/assets/css/layout.min.css")?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url("global_assets/assets/css/components.min.css")?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url("global_assets/assets/css/colors.min.css")?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url("global_assets/assets/css/jquery-ui.min.css")?>" rel="stylesheet" type="text/css">
  <link href="<?=base_url("global_assets/js/validator_js/css/bootstrapValidator.css")?>" rel="stylesheet"
        type="text/css">
  <!-- /global stylesheets -->
<?=$this->endSection()?>




<?=$this->section('scripts')?>
  <!-- Core JS files -->
  <script src="<?=base_url("global_assets/js/main/jquery.min.js")?>"></script>
  <script src="<?=base_url("global_assets/js/main/bootstrap.bundle.min.js")?>"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script src="<?=base_url("global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js")?>"></script>
  <script src="<?=base_url("global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js")?>"></script>
  <script src="<?=base_url("global_assets/js/plugins/uploaders/fileinput/fileinput.min.js")?>"></script>
  <script src="<?=base_url("global_assets/js/plugins/editors/ckeditor/ckeditor.js")?>"></script>

  <script src="<?=base_url("global_assets/js/plugins/forms/styling/switchery.min.js")?>"></script>
  <script src="<?=base_url("global_assets/js/plugins/forms/styling/switch.min.js")?>"></script>


  <script src="<?=base_url("global_assets/assets/js/app.js")?>"></script>

  <script src="<?=base_url("global_assets/js/plugins/forms/selects/select2.min.js")?>"></script>


  <script src="<?=base_url("global_assets/js/demo_pages/uploader_bootstrap.js")?>"></script>

  <script src="<?=base_url("global_assets/js/plugins/notifications/sweet_alert.min.js")?>"></script>
  <script src="<?=base_url("global_assets/locales/az.js")?>"></script>
  <script src="<?=base_url("global_assets/js/demo_pages/editor_ckeditor_material.js")?>"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>

<?php if(session()->has('success')): ?>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<?php endif; ?>


  <!-- /theme JS files -->
<?=$this->endSection()?>

<?=$this->section('content')?>

<?=$this->include('admin/parts/sidebar')?>


  <!-- Main content -->
  <div class="content-wrapper">

    <!-- Page header -->
    <div class="page-header page-header-light">
      <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
          <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Xidmət əlavə et</span>
          </h4>
        </div>
      </div>

    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

      <!-- Main charts -->
      <div class="row">
        <div class="col-md-12">

          <!-- Basic layout-->
          <div class="card">

            <div class="card-body">
              <?php if (session()->has('errors')) {
                print_r(session()->getFlashdata('errors'));
              } ?>
              <form id="registrationForm"
                    action="<?=route_to('App\Controllers\Admin\Brands::create')?>"
                    enctype="multipart/form-data" method="post">
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label">Ad:</label>
                  <div class="col-lg-10">
                    <input type="text" name="name" value="<?=old('name')?>" required
                           class="form-control"
                           placeholder="Başlıq">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-2 col-form-label">Haqqında:</label>
                  <div class="col-lg-10">
                    <textarea rows="5" name="about" id="editor-full" cols="5" class="form-control"
                                                  placeholder="Haqqında"><?=old('about')?></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-lg-2 col-form-label font-weight-semibold">Şəkil yüklə:</label>
                  <div class="col-lg-10">
                    <input type="file" id="fileupload" data-url="server/php/" name="image"
                           accept="image/*" data-fouc>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label font-weight-semibold">Bu səhifədə qalsın?:</label>
                  <div class="col-lg-10">
                    <input type="checkbox" <?=session()->has('is-stay-page') ? 'checked' : ''?> name="is-stay-page"
                           value="on"
                           class="form-check-input-switchery" data-fouc>
                  </div>
                </div>


                <div class="text-right">
                  <button type="submit" disabled class="btn btn-primary">Yarat<i
                        class="icon-paperplane ml-2"></i></button>
                </div>
              </form>
            </div>
          </div>
          <!-- /basic layout -->

        </div>

      </div>
      <!-- /main charts -->

    </div>
    <!-- /content area -->

  </div>
  <!-- /main content -->

<?=$this->endSection()?>

<?=$this->section('js_codes')?>
  <script src="<?=base_url("global_assets/js/demo_pages/self_create_brand_validator.js")?>"></script>
  <script src="<?=base_url("global_assets/js/demo_pages/self_create_brand.js")?>"></script>
<?php if(session()->has('success')): ?>
  <script>
    toastr.info("<?= session()->getFlashdata('success') ?>")
  </script>
<?php endif; ?>
<?=$this->endSection()?>