<!-- Main sidebar -->
<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

  <!-- Sidebar mobile toggler -->
  <div class="sidebar-mobile-toggler text-center">
    <a href="#" class="sidebar-mobile-main-toggle">
      <i class="icon-arrow-left8"></i>
    </a>
    <span class="font-weight-semibold">Navigation</span>
    <a href="#" class="sidebar-mobile-expand">
      <i class="icon-screen-full"></i>
      <i class="icon-screen-normal"></i>
    </a>
  </div>
  <!-- /sidebar mobile toggler -->

  <?php
  $auth = session()->get('auth');
  ?>

  <!-- Sidebar content -->
  <div class="sidebar-content">

    <!-- User menu -->
    <div class="sidebar-user-material">
      <div class="sidebar-user-material-body">
        <div class="card-body text-center">
          <a href="#">
            <img src="<?=base_url($auth->img)?>"
                 class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
          </a>
          <h6 class="mb-0 text-white text-shadow-dark"><?=$auth->first_name . " " . $auth->last_name?></h6>
        </div>
      </div>
    </div>
    <!-- /user menu -->


    <!-- Main navigation -->
    <div class="card card-sidebar-mobile">
      <ul class="nav nav-sidebar" data-nav-type="accordion">

        <?php $uri = service('uri') ?>
        <!-- Main -->
        <li class="nav-item-header">
          <div class="text-uppercase font-size-xs line-height-xs">Əsas</div>
          <i class="icon-menu" title="Kataloq"></i>
        </li>
        <li class="nav-item">
          <a href="<?=adminUrl()?>" class="nav-link active">
            <i class="mi-home mr-3 mi-1x"></i>
            <span>
									Əsas səhifə
								</span>
          </a>
        </li>
        <li class="nav-item-header">
          <div class="text-uppercase font-size-xs line-height-xs">Kataloq</div>
          <i class="icon-menu" title="Kataloq"></i>
        </li>
        <li class="nav-item">
          <a href="<?=adminUrl("categories")?>" class="nav-link active">
            <i class="mi-view-list mr-3 mi-1x"></i>
            <span>
									Kateqoriyalar
								</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=adminUrl("product")?>" class="nav-link active">
            <i class="mi-business-center mr-3 mi-1x"></i>
            <span>
									Məhsullar
								</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=adminUrl("specifications")?>" class="nav-link active">
            <i class="mi-perm-data-setting mr-3 mi-1x"></i>
            <span>
              Spesifikasiya
								</span>
          </a>
        </li>
        <!--        <li class="nav-item nav-item-submenu <? /*=$uri->getSegment(2) == "brands" || $uri->getSegment(2) == "brand-models"  ? 'nav-item-expanded nav-item-open' :''*/ ?>">
          <a href="#" class="nav-link"><i class="mi-loyalty mr-3 mi-1x"></i> <span>Brendlər</span></a>
          <ul class="nav nav-group-sub " data-submenu-title="Brenlər">
            <li class="nav-item"><a href="<? /*=adminUrl("brands")*/ ?>" class="nav-link <? /*=$uri->getSegment(2) == "brands" ? 'active' :''*/ ?>">Brend siyahısı</a></li>
            <li class="nav-item"><a href="<? /*=adminUrl("brand-models")*/ ?>" class="nav-link">Brend modellər</a></li>
          </ul>
        </li>-->
        <li class="nav-item">
          <a href="<?=adminUrl("brands")?>" class="nav-link active">
            <i class="mi-loyalty mr-3 mi-1x"></i>
            <span>
									Brendlər
								</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=adminUrl("services")?>" class="nav-link active">
            <i class="mi-settings-input-composite mr-3 mi-1x"></i>
            <span>
									Xidmətlər
								</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=adminUrl("partnerships")?>" class="nav-link active">
            <i class="mi-group-work mr-3 mi-1x"></i>
            <span>
									Partniyorluqlar
								</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=adminUrl("contact")?>" class="nav-link active">
            <i class="mi-contact-phone mr-3 mi-1x"></i>
            <span>
									Əlaqə məlumatları
								</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- /main navigation -->

  </div>

</div>
<!-- /main sidebar -->
