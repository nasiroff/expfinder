<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <?= $this->renderSection('css') ?>
    <?= $this->renderSection('scripts') ?>


</head>

<body>

<?=$this->include('admin/parts/main_navbar')?>

<!-- Page content -->
<div class="page-content">


<?=$this->renderSection('content')?>



</div>
<!-- /page content -->
<?= $this->renderSection('js_codes') ?>
</body>
</html>
