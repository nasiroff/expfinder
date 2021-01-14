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
<script src="<?= base_url("global_assets/js/plugins/editors/ckeditor/ckeditor.js") ?>"></script>


<script src="<?= base_url("global_assets/assets/js/app.js") ?>"></script>


<script src="<?= base_url("global_assets/js/demo_pages/form_layouts.js") ?>"></script>

<script src="<?= base_url("global_assets/js/demo_pages/gallery.js") ?>"></script>

<script src="<?= base_url("global_assets/locales/az.js") ?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>

<?php if (session()->has('success')): ?>
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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Partniyor əlavə et</span>
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
                        <form id="registrationForm"
                              action="<?= route_to('App\Controllers\Admin\Partnership::create') ?>"
                              enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Adı:</label>
                                <div class="col-lg-10">
                                    <input type="text" required class="form-control"
                                           name="name"
                                           value="<?= old('title') ?>" placeholder="Adı">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Başlıq:</label>
                                <div class="col-lg-10">
                                    <input type="text" required class="form-control"
                                           style="outline-color: red !important;" name="title"
                                           value="<?= old('title') ?>" placeholder="Başlıq">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Əlavə məlumat:</label>
                                <div class="col-lg-10">
                                    <textarea name="description" id="editor-full" rows="4" cols="4">
                                        <?= old('description') ?>
					                </textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">Şəkil yüklə:</label>
                                <div class="col-lg-10">
                                    <input type="file" id="fileupload" name="image"
                                           accept="image/*" data-fouc>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" disabled class="btn btn-primary">Submit form <i
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

<?= $this->endSection() ?>

<?= $this->section('js_codes') ?>
<script src="<?= base_url("global_assets/js/demo_pages/self_create_partnership.js") ?>"></script>
<?php if (session()->has('success')): ?>
    <script>
        toastr.info("<?= session()->getFlashdata('success') ?>")
    </script>
<?php endif; ?>
<?= $this->endSection() ?>
