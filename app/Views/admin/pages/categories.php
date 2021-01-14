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
<script src="<?= base_url("global_assets/js/plugins/forms/styling/uniform.min.js") ?>"></script>


<script src="<?= base_url("global_assets/assets/js/app.js") ?>"></script>

<script src="<?= base_url("global_assets/js/plugins/tables/datatables/datatables.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/forms/selects/select2.min.js") ?>"></script>

<script src="<?= base_url("global_assets/js/demo_pages/form_layouts.js") ?>"></script>


<script src="<?= base_url("global_assets/js/plugins/notifications/sweet_alert.min.js") ?>"></script>
<script src="<?= base_url("global_assets/locales/az.js") ?>"></script>

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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Əsas səhifə</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>

    </div>
    <!-- /page header -->


    <!-- Content area -->
    <div class="content">

        <!-- Main charts -->
        <div class="row">
            <div class="col-xl-12">

                <!-- Traffic sources -->
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">Məhsullar</h6>
                        <div class="header-elements">
                            <div class="form-check form-check-right form-check-switchery form-check-switchery-sm">
                                <a href="<?= base_url('admin/categories/new') ?>" class="btn btn-outline alpha-success text-success-800 border-success-600">
                                    Yeni kateqoriya yarat
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card">

                        <table class="table datatable-basic">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategoriyalar</th>
                                <th>Səviyyə</th>
                                <th class="text-center">B.D.S</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>

                </div>
                <!-- /traffic sources -->

            </div>

        </div>
        <!-- /main charts -->

    </div>
    <!-- /content area -->

    <div id="dialog-form" title="Kateqoriyaya baxış">
        <div class="content" style="padding: 0">

            <!-- Main charts -->
            <div class="row">
                <div class="col-md-12" style="padding: 0">
                    <div class="card-body" style="padding-left: 0; padding-right: 0">
                        <form action="#" id="updateForm">
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group row" style="margin-bottom: 0 !important;">
                                <label class="col-lg-4 col-form-label">
                                    Əsas kateqoriya et </label>
                                <div class="col-lg-8">
                                    <input type="checkbox" name="is-main" value="main" class="form-check-input-styled" id="is-main" data-fouc>
                                </div>
                            </div>

                            <div class="category-section">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label">Kateqoriyalar:</label>
                                    <div class="col-lg-8">
                                        <select class="form-control select" id="categories" name="parent_category"
                                                data-fouc>
                                        </select>
                                        <small class="help-block" id="parent_category-message"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label">Kateqoriya adı:</label>
                                <div class="col-lg-8">
                                    <input type="text" name="name" id="name" required class="form-control"
                                           placeholder="Kateqoriyanın adı">
                                    <small class="help-block" id="name-message"></small>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
<!-- /main content -->

<?= $this->endSection() ?>

<?= $this->section('js_codes') ?>
<script src="<?= base_url("global_assets/js/demo_pages/self_category_dialog_box.js") ?>"></script>
<?php if (session()->has('success')): ?>
    <script>
        toastr.info("<?= session()->getFlashdata('success') ?>")
    </script>
<?php endif; ?>
<?= $this->endSection() ?>

