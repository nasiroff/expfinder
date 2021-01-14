<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="<?= base_url("global_assets/css/icons/icomoon/styles.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url("global_assets/assets/css/bootstrap.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url("global_assets/assets/css/bootstrap_limitless.min.css") ?>" rel="stylesheet"
          type="text/css">
    <link href="<?= base_url("global_assets/assets/css/layout.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url("global_assets/assets/css/components.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url("global_assets/assets/css/colors.min.css") ?>" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="<?= base_url("global_assets/js/main/jquery.min.js") ?>"></script>
    <script src="<?= base_url("global_assets/js/main/bootstrap.bundle.min.js") ?>"></script>
    <script src="<?= base_url("global_assets/js/plugins/loaders/blockui.min.js") ?>"></script>
    <script src="<?= base_url("global_assets/js/plugins/ui/ripple.min.js") ?>"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?= base_url("global_assets/js/plugins/forms/styling/uniform.min.js") ?>"></script>

    <script src="<?= base_url("global_assets/assets/js/app.js") ?>"></script>
    <script src="<?= base_url("global_assets/js/demo_pages/login.js") ?>"></script>

    <script src="<?= base_url("global_assets/js/demo_pages/form_inputs.js") ?>"></script>
    <!-- /theme JS files -->
  <?=dd(session()->get('asd'))?>

    <?php if (session()->has('success') || session()->has('error')): ?>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <?php endif; ?>

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
    <div class="navbar-brand">
        <a href="index.html" class="d-inline-block">
            <img src="<?= base_url("global_assets/images/logo_light.png") ?>" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
    </div>
</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">
            <?=session()->getFlashdata('error')?>
            <!-- Registration form -->
            <form action="<?= base_url("admin/registration") ?>" method="post" enctype="multipart/form-data" class="flex-fill">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">Hesab yarat</h5>
                                    <span class="d-block text-muted">Bütün xanalar doldurulmalıdır</span>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="text" name="username" class="form-control"
                                           placeholder="İstifadəçi adı seç" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-user-plus text-muted"></i>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input type="text" name="first_name" class="form-control" placeholder="Ad" required>
                                            <div class="form-control-feedback">
                                                <i class="icon-user-check text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input type="text" name="last_name" class="form-control"
                                                   placeholder="Soy ad" required>
                                            <div class="form-control-feedback">
                                                <i class="icon-user-check text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input type="password" name="password" class="form-control"
                                                   placeholder="Şifrə" required>
                                            <div class="form-control-feedback">
                                                <i class="icon-user-lock text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-feedback form-group-feedback-right">
                                            <input type="password" name="password_confirm" class="form-control"
                                                   placeholder="Təkrar şifrə" required>
                                            <div class="form-control-feedback">
                                                <i class="icon-user-lock text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-right">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    <div class="form-control-feedback">
                                        <i class="icon-mention text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <input type="file" name="image" accept="image/*" class="form-control-uniform-custom">
                                    </div>
                                </div>


                                <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i
                                                class="icon-plus3"></i></b> İSTİFADƏÇİ YARAT
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /registration form -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->


<?php if (session()->has('success')): ?>
    <script>
        toastr.info("<?= session()->getFlashdata('success') ?>")
    </script>
<?php endif; ?>
<?php if (session()->has('errors')): ?>
    <script>
        <?php foreach ( session()->getFlashdata('errors') as $error){ ?>
        toastr.error("<?= $error ?>");
        <?php } ?>
    </script>
<?php endif; ?>

</body>
</html>
