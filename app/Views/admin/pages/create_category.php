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

<!-- /core JS files -->

<!-- Theme JS files -->
<script src="<?= base_url("global_assets/js/plugins/forms/styling/uniform.min.js") ?>"></script>


<script src="<?= base_url("global_assets/assets/js/app.js") ?>"></script>

<script src="<?= base_url("global_assets/js/plugins/tables/datatables/datatables.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/forms/selects/select2.min.js") ?>"></script>

<script src="<?= base_url("global_assets/js/demo_pages/form_layouts.js") ?>"></script>

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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Kateqoriya əlavə et</span>
                </h4>
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
                        <?php if (session()->has('errors')) {
                            print_r( session()->getFlashdata('errors'));
                        } ?>
                        <form id="registrationForm" action="<?= route_to("App\Controllers\Admin\Category::create") ?>" method="POST">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Ad:</label>
                                <div class="col-lg-10">
                                    <input type="text" value="<?=old('name')?>" required name="name" class="form-control"
                                           placeholder="Ad">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">
                                    Əsas kateqoriya olsun? </label>
                                <div class="col-lg-10">
                                    <input type="checkbox" value="main" name="is-main" <?= old('is-main') || (session()->has('is-main') && session()->getFlashdata('is-main')) ? 'checked' : '' ?> class="form-check-input-styled" data-fouc>
                                </div>
                            </div>
                            <div class="category-section"  style=" <?= old('is-main') || (session()->has('is-main') && session()->getFlashdata('is-main')) ? 'display: none' : '' ?>">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Kateqoriya:</label>
                                    <div class="col-lg-10">
                                        <select <?= old('is-main') || (session()->has('is-main') && session()->getFlashdata('is-main')) ? 'disabled' : '' ?> class="form-control select" id="categories" name="parent_category_id"
                                                data-fouc>
                                            <option value=""></option>
                                            <?php
                                            for ($i = 0; $i < 2; $i++) {
                                                echo '<optgroup label="'.($i === 0 ? "Əsas" : "Alt").' kateqoriyalar">';
                                                foreach ($categories as $category) {
                                                    if (intval($category['level']) === $i) {
                                                        echo '<option '.(old('parent_category_id')== $category["id"] || (session()->has('parent_category_id') && session()->getFlashdata('parent_category_id') == $category["id"]) ? 'selected': '' ).' value="' . $category["id"]. '">' . $category["name"]. '</option>';
                                                    }
                                                }
                                                echo '</optgroup>';
                                            }
                                            ?>
                                        </select>
                                    </div>
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


<?= $this->endSection() ?>

<?= $this->section('js_codes') ?>
<script src="<?= base_url("global_assets/js/demo_pages/self_category_create.js") ?>"></script>
<?php if (session()->has('success')): ?>
    <script>
        toastr.info("<?= session()->getFlashdata('success') ?>")
    </script>
<?php endif; ?>
<?= $this->endSection() ?>

