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
      type="text/css">
<!-- /global stylesheets -->
<?= $this->endSection() ?>




<?= $this->section('scripts') ?>
<!-- Core JS files -->
<script src="<?= base_url("global_assets/js/main/jquery.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/main/bootstrap.bundle.min.js") ?>"></script>
<script src="<?= base_url("global_assets/assets/js/bootstrap.min.css") ?>" rel="stylesheet" type="text/css"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="<?= base_url("global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/uploaders/fileinput/fileinput.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/editors/ckeditor/ckeditor.js") ?>"></script>

<script src="<?= base_url("global_assets/js/plugins/forms/styling/switchery.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/forms/styling/switch.min.js") ?>"></script>


<script src="<?= base_url("global_assets/assets/js/app.js") ?>"></script>

<script src="<?= base_url("global_assets/js/plugins/forms/selects/select2.min.js") ?>"></script>


<script src="<?= base_url("global_assets/js/demo_pages/uploader_bootstrap.js") ?>"></script>

<script src="<?= base_url("global_assets/js/plugins/notifications/sweet_alert.min.js") ?>"></script>
<script src="<?= base_url("global_assets/locales/az.js") ?>"></script>
<script src="<?= base_url("global_assets/js/demo_pages/editor_ckeditor_material.js") ?>"></script>

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
    <!-- Content area -->
    <div class="content">
        <!-- Main charts -->
        <div class="row">
            <div class="col-md-12">
                <!-- Basic layout-->
                <div class="card">
                    <div class="card-body">

                        <?php if (session()->has('errors')) {
                            echo session()->getFlashdata('errors')['title'];
                        } ?>
                        <form id="registrationForm" action="<?= route_to('App\Controllers\Admin\Product::create') ?>"
                              enctype="multipart/form-data" method="post">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Başlıq:</label>
                                <div class="col-lg-10">
                                    <input type="text" required class="form-control"
                                           style="outline-color: red !important;" name="title"
                                           value="<?= old('title') ?>" placeholder="Başlıq">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Kateqoriya</label>
                                <div class="col-lg-10">
                                    <select class="form-control select" name="category_id" data-fouc>
                                        <option value=""></option>
                                        <?php foreach ($categories

                                        as $category): ?>
                                        <?php if ($category->level == 1) : ?>
                                        <optgroup label="<?= $category->name ?>">
                                            <?php foreach ($categories as $subCat):
                                                if ($subCat->parent_category_id == $category->id):?>
                                                    <option <?= old('category_id') ? 'selected' : '' ?>
                                                            value="<?= $subCat->id ?>"><?= $subCat->name ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php endif; ?>

                                            <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Qiymət:</label>
                                <div class="col-lg-10">
                                    <input type="number" min="0" required step=".01" class="form-control" name="price"
                                           value="<?= old('price') ?>"
                                           placeholder="Qiymət">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Status</label>
                                <div class="col-lg-10">
                                    <select class="form-control select-status" name="status" data-fouc>
                                        <option value=""></option>
                                        <option <?= old('status') == "0" ? 'selected' : '' ?> value="0">Deaktiv</option>
                                        <option <?= old('status') == "1" ? 'selected' : '' ?> value="1">Aktiv</option>
                                    </select>
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
                                <label class="col-lg-2 col-form-label">Təsvir:</label>
                                <div class="col-lg-10">
                                    <textarea name="description" id="editor-full" rows="4" cols="4">
                                        <?= old('description') ?>
					            </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">Bu səhifədə qalsın?:</label>
                                <div class="col-lg-10">
                                    <input type="checkbox"  <?= session()->has('is-stay-page')  ? 'checked' : '' ?> name="is-stay-page" value="on"
                                           class="form-check-input-switchery" data-fouc>
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

<script src="<?= base_url("global_assets/js/demo_pages/self_create_product_validator.js") ?>"></script>
<script src="<?= base_url("global_assets/js/demo_pages/self_create_product.js") ?>"></script>

<?php if (session()->has('success')): ?>
    <script>
        toastr.info("<?= session()->getFlashdata('success') ?>")
    </script>
<?php endif; ?>

<?= $this->endSection() ?>

