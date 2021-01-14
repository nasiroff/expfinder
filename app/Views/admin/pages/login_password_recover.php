<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url("global_assets/css/icons/icomoon/styles.min.css") ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url("global_assets/assets/css/bootstrap.min.css") ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url("global_assets/assets/css/bootstrap_limitless.min.css") ?>" rel="stylesheet" type="text/css">
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

				<!-- Password recovery form -->
				<form class="login-form" action="<?=route_to('App\Controllers\Admin\Home::activate')?>" method="post">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Şifrəni bərpa et</h5>
								<span class="d-block text-muted">Təhlükəsizlik tədbiri olaraq biz sizin e-mail ünvana link yollayacayıq</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-right">
								<input type="email" name="email" class="form-control" placeholder="E-mail ünvanı yazın">
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
							</div>

							<button type="submit" class="btn bg-blue btn-block"><i class="icon-spinner11 mr-2"></i> Şifrəni yenilə </button>
						</div>
					</div>
				</form>
				<!-- /password recovery form -->

			</div>
			<!-- /content area -->


		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
