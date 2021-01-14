


<?= $this->extend('/admin/layout/app') ?>

<?= $this->section('css') ?>
<!-- Global stylesheets -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
      type="text/css">
<link href="<?= base_url("global_assets/css/icons/icomoon/styles.min.css") ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url("global_assets/css/icons/material/styles.min.css") ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url("global_assets/assets/css/bootstrap.min.css") ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url("global_assets/assets/css/bootstrap_limitless.min.css") ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url("global_assets/assets/css/layout.min.css") ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url("global_assets/assets/css/components.min.css") ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url("global_assets/assets/css/colors.min.css") ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url("global_assets/assets/css/jquery-ui.min.css") ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url("global_assets/js/validator_js/css/bootstrapValidator.css") ?>" rel="stylesheet"

<!-- /global stylesheets -->
<?= $this->endSection() ?>




<?= $this->section('scripts') ?>
<!-- Core JS files -->
<script src="<?= base_url("global_assets/js/main/jquery.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/main/bootstrap.bundle.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/loaders/blockui.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/ui/ripple.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/main/jquery-ui.min.js") ?>"></script>
<!-- /core JS files -->

<!-- Theme JS files -->

<script src="<?= base_url("global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/uploaders/fileinput/fileinput.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/media/fancybox.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/editors/ckeditor/ckeditor.js") ?>">


  <script src="<?= base_url("global_assets/assets/js/app.js") ?>"></script>

<script src="<?= base_url("global_assets/js/plugins/tables/datatables/datatables.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/forms/selects/select2.min.js") ?>"></script>

<script src="<?= base_url("global_assets/js/demo_pages/form_layouts.js") ?>"></script>

<script src="<?= base_url("global_assets/js/demo_pages/gallery.js") ?>"></script>

<script src="<?= base_url("global_assets/js/plugins/notifications/sweet_alert.min.js") ?>"></script>
<script src="<?= base_url("global_assets/locales/az.js") ?>"></script>

<?php if (session()->has('success') || session()->has('error')): ?>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<?php endif; ?>

<!-- /theme JS files -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= $this->include('admin/parts/sidebar') ?>

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Məhsul əlavə et</span></h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
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
                            <form action="<?=route_to('App\Controllers\Admin\Contacts::create')?>" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Ünvan:</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="address" value="<?=$contactInformation->address?>" placeholder="Ünvan">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Telefon nömrəsi(mob):</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" name="phone_number_mobile" value="<?=$contactInformation->phone_number_mobile?>" placeholder="Telefon nömrəsi(mob)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Telefon nömrəsi(ev):</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" name="phone_number_home" value="<?=$contactInformation->phone_number_home?>" placeholder="Telefon nömrəsi(ev)">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Email:</label>
                                    <div class="col-lg-10">
                                      <input type="email" class="form-control" name="email" value="<?=$contactInformation->email?>" placeholder="Email">
                                    </div>
                                </div>
                            <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Haqqında (qısa):</label>
                                    <div class="col-lg-10">
                                      <textarea class="form-control" name="about" placeholder="Haqqında (qısa)"><?=$contactInformation->about?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">İş günləri:</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" name="opening_days" value="<?=$contactInformation->opening_days?>" placeholder="İş günləri">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">İş saatları:</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" name="opening_hours" value="<?=$contactInformation->opening_hours?>" placeholder="İş saatları">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Whatsapp:</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" name="whatsapp_url" value="<?=$contactInformation->whatsapp_url?>" placeholder="Whatsapp">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Instagram:</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" name="instagram_url" value="<?=$contactInformation->instagram_url?>" placeholder="Instagram">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Facebook:</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" name="facebook_url" value="<?=$contactInformation->facebook_url?>" placeholder="Facebook">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Google map:</label>
                                    <div class="col-lg-10">
                                      <input type="text" class="form-control" name="google_map_api" value="<?=$contactInformation->google_map_api?>" placeholder="Google map">
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Dəyiş vəya yarat <i class="icon-paperplane ml-2"></i></button>
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


<?= $this->endSection() ?>

<?= $this->section('js_codes') ?>
<?php if (session()->has('success')): ?>
  <script>
    toastr.info("<?= session()->getFlashdata('success') ?>")
  </script>
<?php endif; ?>
<?php if (session()->has('error')): ?>
  <script>
    toastr.error("<?= session()->getFlashdata('error') ?>")
  </script>
<?php endif; ?>
<?= $this->endSection() ?>
