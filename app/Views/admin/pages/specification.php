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

<script src="<?= base_url("global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js")?>"></script>
<script src="<?= base_url("global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js")?>"></script>
<script src="<?= base_url("global_assets/js/plugins/uploaders/fileinput/fileinput.min.js")?>"></script>
<script src="<?= base_url("global_assets/js/plugins/media/fancybox.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/editors/ckeditor/ckeditor.js") ?>"></script>

<script src="<?= base_url("global_assets/assets/js/app.js") ?>"></script>

<script src="<?= base_url("global_assets/js/plugins/tables/datatables/datatables.min.js") ?>"></script>
<script src="<?= base_url("global_assets/js/plugins/forms/selects/select2.min.js") ?>"></script>

<script src="<?= base_url("global_assets/js/demo_pages/form_layouts.js") ?>"></script>

<script src="<?= base_url("global_assets/js/demo_pages/gallery.js") ?>"></script>

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

  <!-- Page he    ader -->
  <div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
      <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Əsas səhifə</span></h4>
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
                <div class="btn-group">
                  <button type="button" class="btn btn-outline alpha-success text-success-800 border-success-600 dropdown-toggle" data-toggle="dropdown">Dropdown</button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="icon-text-color"></i> Tekst </a>
                    <a href="#" class="dropdown-item"><i class="icon-git-compare"></i> Məntiqi dəyər</a>
                    <a href="#" class="dropdown-item"><i class="icon-sort-numberic-desc"></i> Rəqəm</a>
                    <a href="#" class="dropdown-item"><i class="icon-sort-numberic-desc"></i> Kəsir rəqəm</a>
                    <a href="#" class="dropdown-item"><i class="icon-calendar"></i> Tarix</a>
                    <a href="#" class="dropdown-item"><i class="icon-watch"></i> Saat və tarix</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card">

            <table class="table datatable-basic">
              <thead>
              <tr>
                <th>ID</th>
                <th>Kategoriya</th>
                <th>Brend</th>
                <th>Başlıq</th>
                <th>Qiymət</th>
                <th>Əlavə edən</th>
                <th>Status</th>
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
  <div id="dialog-form" title="Məhsula baxış">
    <div class="content">

      <!-- Main charts -->
      <div class="row">
        <div class="col-md-12">
          <div class="card-body">
            <form action="#" id="updateForm">
              <input type="hidden" id="product_id" name="id">
              <input type="hidden" name="_method" value="PUT">
              <div class="form-group row">
                <label class="col-form-label col-lg-2">Əlavə edən</label>
                <div class="col-lg-10">
                  <input type="text" id="user-full-name"  class="form-control" disabled value="disabled">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-2 col-form-label">Kateqoriya:</label>
                <div class="col-lg-10">
                  <select class="form-control select" id="categories" name="category_id" data-fouc>
                  </select>
                  <small  class="help-block" id="categories-message"></small>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-2 col-form-label">Marka:</label>
                <div class="col-lg-10">
                  <select class="form-control select" id="brands" name="brand_id" data-fouc>
                  </select>
                  <small  class="help-block" id="brands-message"></small>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-2 col-form-label">Başlıq:</label>
                <div class="col-lg-10">
                  <input type="text"  id="title"  name="title" required class="form-control" value="" placeholder="Başlıq">
                  <small  class="help-block" id="title-message"></small>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-2 col-form-label">Təsvir:</label>
                <div class="col-lg-10">
                                    <textarea rows="5" cols="5" name="description" id="description" class="form-control"
                                              placeholder="Məhsulun təsviri"></textarea>
                  <small  class="help-block" id="description-message"></small>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-2 col-form-label">Qiymət:</label>
                <div class="col-lg-10">
                  <input type="number" min="0" name="price" id="price" required step=".01" class="form-control"
                         placeholder="Qiymət">
                  <small  class="help-block" id="price-message"></small>
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-2 col-form-label">Status:</label>
                <div class="col-lg-10">
                  <select class="form-control select-status" name="status" data-fouc>
                  </select>
                  <small  class="help-block" id="status-message"></small>
                </div>
              </div>

              <div class="col-lg-3 offset-md-2 product-photo">
                <div class="card">
                  <div class="card-img-actions mx-1 mt-1">
                    <img class="card-img img-fluid" id="product_img" src="" alt="">
                    <div class="card-img-actions-overlay card-img">
                      <a href="" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox" rel="group">
                        <i class="icon-plus3"></i>
                      </a>
                    </div>
                  </div>
                  <input type="hidden" id="image_path" value="">
                  <div class="card-body">
                    <div class="d-flex align-items-start flex-nowrap">
                      <div class="list-icons list-icons-extended ml-auto">
                        <a href="javascript:;" id="delete-img" class="list-icons-item"><i class="icon-bin top-0"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

              </div>



              <div class="form-group row">
                <label class="col-lg-2 col-form-label font-weight-semibold">Şəkil yüklə:</label>
                <div class="col-lg-10">
                  <input type="file" name="image" class="file-input-ajax" accept="image/*" data-fouc>
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
<script src="<?= base_url("global_assets/js/demo_pages/self_dialog_box.js") ?>"></script>
<?php if (session()->has('success')): ?>
  <script>
    toastr.info("<?= session()->getFlashdata('success') ?>")
  </script>
<?php endif; ?>
<?= $this->endSection() ?>


