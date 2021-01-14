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
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?= base_url("global_assets/assets/js/app.js") ?>"></script>
    <!-- /theme JS files -->

    <?php if (session()->has('success') || session()->has('errors')): ?>
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

            <!-- Login form -->
            <form class="login-form" action="<?= route_to("App\Controllers\Admin\Home::login") ?> " method="post">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">Hesaba daxil ol</h5>
                            <span class="d-block text-muted">Şəxsi login və parolu daxil edin</span>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="text" name="username" class="form-control" placeholder="İstifadəçi adı">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-left">
                            <input type="password" name="password" class="form-control" placeholder="Şifrə">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Daxil ol <i
                                        class="icon-circle-right2 ml-2"></i></button>
                        </div>

                        <div class="text-center">
                            <a href="<?= base_url('admin/password-recover') ?>">Parolu unutdunuz?</a>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /login form -->

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
