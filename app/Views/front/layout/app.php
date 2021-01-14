<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <title>Stroyka</title>
  <link rel="icon" type="image/png" href="<?=base_url('front/images/favicon.png')?>"><!-- fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i"><!-- css -->
  <link rel="stylesheet" href="<?=base_url('front/vendor/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('front/vendor/owl-carousel/assets/owl.carousel.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('front/vendor/photoswipe/photoswipe.css')?>">
  <link rel="stylesheet" href="<?=base_url('front/vendor/photoswipe/default-skin/default-skin.css')?>">
  <link rel="stylesheet" href="<?=base_url('front/vendor/select2/css/select2.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('front/css/style.css')?>"><!-- font - fontawesome -->
  <link rel="stylesheet" href="<?=base_url('front/vendor/fontawesome/css/all.min.css')?>"><!-- font - stroyka -->
  <link rel="stylesheet" href="<?=base_url('front/fonts/stroyka/stroyka.css')?>">
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-8"></script>
  <script>window.dataLayer = window.dataLayer || [];

    function gtag(){
      dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-97489509-8');
  </script>
</head>
<body><!-- site -->
<div class="site">
  <header class="site__header d-lg-none">
    <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
      <div class="mobile-header__panel">
        <div class="container">
          <div class="mobile-header__body">
            <button class="mobile-header__menu-button">
              <svg width="18px" height="14px">
                <use xlink:href="<?=base_url("front/images/sprite.svg#menu-18x14")?>"></use>
              </svg>
            </button>
            <a class="mobile-header__logo" href="<?=base_url()?>">
              <img src="<?=base_url('front/images/logos/Asset 6.png')?>" width="90" height="52" alt="">
            </a>
            <div class="search search--location--mobile-header mobile-header__search">
              <div class="search__body">
                <form class="search__form" action="#">
                  <input class="search__input" name="search"
                         placeholder="<?=lang('app.search')?>"
                         aria-label="Sayt üzrə axtarış" type="text" autocomplete="off">
                  <button class="search__button search__button--type--submit" type="submit">
                    <svg width="20px" height="20px">
                      <use xlink:href="<?=base_url("front/images/sprite.svg#search-20")?>"></use>
                    </svg>
                  </button>
                  <button class="search__button search__button--type--close" type="button">
                    <svg width="20px" height="20px">
                      <use xlink:href="<?=base_url("front/images/sprite.svg#cross-20")?>"></use>
                    </svg>
                  </button>
                  <div class="search__border"></div>
                </form>
                <div class="search__suggestions suggestions suggestions--location--mobile-header"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header><!-- mobile site__header / end --><!-- desktop site__header -->
  <header class="site__header d-lg-block d-none">
    <div class="site-header"><!-- .topbar -->
      <div class="site-header__middle container">
        <div class="site-header__logo"><a href="<?=base_url()?>"><!-- logo -->
            <img class="site-logo-img" src="<?=base_url('front/images/logos/Asset 6.png')?>" alt="">
          </a>
        </div>
        <div class="site-header__search">
          <div class="search search--location--header">
            <div class="search__body">
              <form class="search__form" action="#">
                <select class="search__categories" name="category" aria-label="Category">
                  <option value="all"><?=lang('app.all_categories')?></option>

                  <?php
                  foreach($categoriesLVL0 as $categoryLVL0){
                    echo ' <option value="' . $categoryLVL0->id . '">' . $categoryLVL0->name . '</option>';
                    foreach($categoriesLVL1 as $categoryLVL1){
                      if($categoryLVL0->id == $categoryLVL1->parent_category_id){
                        echo '<option value="' . $categoryLVL1->id . '">&nbsp;&nbsp;' . $categoryLVL1->name . '</option>';
                        foreach($categoriesLVL2 as $categoryLVL2){
                          if($categoryLVL1->id == $categoryLVL2->parent_category_id){
                            echo '<option style="padding: 120px" value="' . $categoryLVL2->id . '">&nbsp;&nbsp;&nbsp;&nbsp;' . $categoryLVL2->name . '</option>';
                          }
                        }
                      }
                    }
                  }
                  ?>
                </select>
                <input class="search__input" name="search" placeholder="<?=lang('app.search')?>"
                       aria-label="Sayt üzrə axtarış"
                       type="text" autocomplete="off">
                <button class="search__button search__button--type--submit" type="submit">
                  <svg width="20px" height="20px">
                    <use xlink:href="<?=base_url("front/images/sprite.svg#search-20")?>"></use>
                  </svg>
                </button>
                <div class="search__border"></div>
              </form>
              <div class="search__suggestions suggestions suggestions--location--header"></div>
            </div>
          </div>
        </div>
        <div class="site-header__phone">
          <div class="site-header__phone-title">Müştəri xidməti</div>
          <div class="site-header__phone-number"><?=$contactInformation->phone_number_mobile?></div>
        </div>
      </div>
      <div class="site-header__nav-panel">
        <div class="nav-panel nav-panel--sticky" data-sticky-mode="pullToShow">
          <div class="nav-panel__container container">
            <div class="nav-panel__row">
              <div class="nav-panel__departments">
                <?php

                $uri = service('uri');
                ?>
                <div class="departments <?=empty($uri->getSegment(1)) ? 'departments--open departments--fixed' : ''?>"
                     data-departments-fixed-by=".block-slideshow">
                  <div class="departments__body">
                    <div class="departments__links-wrapper">
                      <div class="departments__submenus-container"></div>
                      <ul class="departments__links">
                        <?php foreach($categoriesLVL0 as $categoryLVL0): ?>
                          <li class="departments__item">
                            <a class="departments__item-link"
                               href="<?=base_url('kateqoriyalar/' . $categoryLVL0->slug_url)?>"><?=$categoryLVL0->name?>
                              <svg class="departments__item-arrow" width="6px" height="9px">
                                <use
                                    xlink:href="<?=base_url("front/images/sprite.svg#arrow-rounded-right-6x9")?>"></use>
                              </svg>
                            </a>
                            <div
                                class="departments__submenu departments__submenu--type--megamenu departments__submenu--size--xl">
                              <div class="megamenu megamenu--departments">
                                <div class="megamenu__body">
                                  <div class="row">
                                    <?php
                                    $countCategoriesLVL1 = count($categoriesLVL1);
                                    for($i = 0; $i < count($categoriesLVL1); $i++):?>
                                      <?php if($categoryLVL0->id == $categoriesLVL1[$i]->parent_category_id): ?>
                                        <div class="col-3">
                                          <ul class="megamenu__links megamenu__links--level--0">
                                            <li class="megamenu__item megamenu__item--with-submenu">
                                              <a href="<?=base_url('kateqoriyalar/' . $categoriesLVL1[$i]->slug_url)?>"><?=$categoriesLVL1[$i]->name?></a>
                                              <ul class="megamenu__links megamenu__links--level--1">
                                                <?php foreach($categoriesLVL2 as $categoryLVL2){
                                                  if($categoryLVL2->parent_category_id == $categoriesLVL1[$i]->id){
                                                    ?>
                                                    <li class="megamenu__item"><a
                                                          href="<?=base_url('kateqoriyalar/' . $categoryLVL2->slug_url)?>"><?=$categoryLVL2->name?></a>
                                                    </li>
                                                  <?php }else{
                                                    continue;
                                                  }
                                                } ?>
                                              </ul>
                                            </li>
                                            <?php if($countCategoriesLVL1 > ++$i && $categoryLVL0->id == $categoriesLVL1[$i]->parent_category_id){ ?>
                                              <li class="megamenu__item megamenu__item--with-submenu">
                                                <a href="<?=base_url('kateqoriyalar/' . $categoriesLVL1[$i]->slug_url)?>"><?=$categoriesLVL1[$i]->name;?></a>
                                                <ul class="megamenu__links megamenu__links--level--1">
                                                  <?php foreach($categoriesLVL2 as $categoryLVL2){
                                                    if($categoryLVL2->parent_category_id == $categoriesLVL1[$i]->id){
                                                      ?>
                                                      <li class="megamenu__item"><a
                                                            href="<?=base_url('kateqoriyalar/' . $categoryLVL2->slug_url)?>"><?=$categoryLVL2->name?></a>
                                                      </li>
                                                    <?php }else{
                                                      continue;
                                                    }
                                                  } ?>
                                                </ul>
                                              </li>
                                            <?php }else{
                                              break;
                                            } ?>
                                          </ul>
                                        </div>
                                      <?php endif; ?>
                                    <?php endfor; ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                  <button class="departments__button" style="text-transform: uppercase">
                    <svg class="departments__button-icon" width="18px" height="14px">
                      <use xlink:href="<?=base_url("front/images/sprite.svg#menu-18x14")?>"></use>
                    </svg>
                    <?=lang('app.categories')?>
                    <svg class="departments__button-arrow" width="9px" height="6px">
                      <use xlink:href="<?=base_url("front/images/sprite.svg#arrow-rounded-down-9x6")?>"></use>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="nav-panel__nav-links nav-links">
                <ul class="nav-links__list">
                  <li class="nav-links__item">
                    <a class="nav-links__item-link" href="<?=base_url()?>">
                      <div
                          class="nav-links__item-body" <?php if($uri->getSegment(1) == ""): ?> style="background: linear-gradient(0deg, #00f764 -76%, transparent);" <?php endif; ?>><?=lang('app.home')?></div>
                    </a>
                  </li>
                  <li class="nav-links__item">
                    <a class="nav-links__item-link" href="<?=base_url()?>">
                      <div
                          class="nav-links__item-body" <?php if($uri->getSegment(1) == "xidmetler"): ?> style="background: linear-gradient(0deg, #00f764 -76%, transparent);" <?php endif; ?>><?=lang('app.services')?></div>
                    </a>
                  </li>
                  <li class="nav-links__item">
                    <a class="nav-links__item-link"
                       href="<?=base_url()?>">
                      <div
                          class="nav-links__item-body" <?php if($uri->getSegment(1) == "brendler"): ?> style="background: linear-gradient(0deg, #00f764 -76%, transparent);" <?php endif; ?>><?=lang('app.brands')?></div>
                    </a>
                  </li>
                  <li class="nav-links__item"><a class="nav-links__item-link"
                                                 href="<?=base_url('haqqimizda')?>">
                      <div
                          class="nav-links__item-body" <?php if($uri->getSegment(1) == "haqqimizda"): ?> style="background: linear-gradient(0deg, #00f764 -76%, transparent);" <?php endif; ?>><?=lang('app.about_us')?></div>
                    </a>
                  </li>
                  <li class="nav-links__item"><a class="nav-links__item-link"
                                                 href="<?=base_url('elaqe')?>">
                      <div
                          class="nav-links__item-body" <?php if($uri->getSegment(1) == "elaqe"): ?> style="background: linear-gradient(0deg, #00f764 -76%, transparent);" <?php endif; ?>><?=lang('app.contact_us')?></div>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="nav-panel__indicators">
                <div class="indicator"><a href="wishlist.html" class="indicator__button"><span class="indicator__area"><svg
                          width="20px" height="20px"><use
                            xlink:href="<?=base_url('front/images/sprite.svg#heart-20')?>"></use></svg> <span
                          class="indicator__value">0</span></span></a></div>
                <div class="indicator indicator--trigger--click"><a href="cart.html" class="indicator__button"><span
                        class="indicator__area"><svg width="20px"
                                                     height="20px"><use
                            xlink:href="<?=base_url('front/images/sprite.svg#cart-20')?>"></use></svg> <span
                          class="indicator__value">3</span></span></a>
                  <div class="indicator__dropdown"><!-- .dropcart -->
                    <div class="dropcart dropcart--style--dropdown">
                      <div class="dropcart__body">
                        <div class="dropcart__products-list">
                          <div class="dropcart__product">
                            <div class="product-image dropcart__product-image"><a href="product.html"
                                                                                  class="product-image__body"><img
                                    class="product-image__img"
                                    src="<?=base_url('front/images/products/product-1.jpg')?>" alt=""></a></div>
                            <div class="dropcart__product-info">
                              <div class="dropcart__product-name"><a href="product.html">Electric Planer Brandix
                                  KL370090G 300 Watts</a></div>
                              <ul class="dropcart__product-options">
                                <li>Color: Yellow</li>
                                <li>Material: Aluminium</li>
                              </ul>
                              <div class="dropcart__product-meta"><span class="dropcart__product-quantity">2</span> ×
                                <span class="dropcart__product-price">$699.00</span>
                              </div>
                            </div>
                            <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                              <svg width="10px" height="10px">
                                <use xlink:href="<?=base_url('front/images/sprite.svg#cross-10')?>"></use>
                              </svg>
                            </button>
                          </div>
                          <div class="dropcart__product">
                            <div class="product-image dropcart__product-image"><a href="product.html"
                                                                                  class="product-image__body"><img
                                    class="product-image__img"
                                    src="<?=base_url('front/images/products/product-2.jpg')?>" alt=""></a></div>
                            <div class="dropcart__product-info">
                              <div class="dropcart__product-name"><a href="product.html">Undefined Tool IRadix DPS3000SY
                                  2700 watts</a></div>
                              <div class="dropcart__product-meta"><span class="dropcart__product-quantity">1</span> ×
                                <span class="dropcart__product-price">$849.00</span>
                              </div>
                            </div>
                            <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                              <svg width="10px" height="10px">
                                <use xlink:href="<?=base_url('front/images/sprite.svg#cross-10')?>"></use>
                              </svg>
                            </button>
                          </div>
                          <div class="dropcart__product">
                            <div class="product-image dropcart__product-image"><a href="product.html"
                                                                                  class="product-image__body"><img
                                    class="product-image__img"
                                    src="<?=base_url('front/images/products/product-5.jpg')?>" alt=""></a></div>
                            <div class="dropcart__product-info">
                              <div class="dropcart__product-name"><a href="product.html">Brandix Router Power Tool
                                  2017ERXPK</a></div>
                              <ul class="dropcart__product-options">
                                <li>Color: True Red</li>
                              </ul>
                              <div class="dropcart__product-meta"><span class="dropcart__product-quantity">3</span> ×
                                <span class="dropcart__product-price">$1,210.00</span>
                              </div>
                            </div>
                            <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                              <svg width="10px" height="10px">
                                <use xlink:href="<?=base_url('front/images/sprite.svg#cross-10')?>"></use>
                              </svg>
                            </button>
                          </div>
                        </div>
                        <div class="dropcart__totals">
                          <table>
                            <tr>
                              <th>Subtotal</th>
                              <td>$5,877.00</td>
                            </tr>
                            <tr>
                              <th>Shipping</th>
                              <td>$25.00</td>
                            </tr>
                            <tr>
                              <th>Tax</th>
                              <td>$0.00</td>
                            </tr>
                            <tr>
                              <th>Total</th>
                              <td>$5,902.00</td>
                            </tr>
                          </table>
                        </div>
                        <div class="dropcart__buttons"><a class="btn btn-secondary" href="cart.html">View Cart</a> <a
                              class="btn btn-primary"
                              href="checkout.html">Checkout</a></div>
                      </div>
                    </div><!-- .dropcart / end --></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <?=$this->renderSection('content')?>
  <footer class="site__footer">
    <div class="site-footer">
      <div class="container">
        <div class="site-footer__widgets">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
              <div class="site-footer__widget footer-contacts"><h5
                    class="footer-contacts__title"><?=lang('app.contact_us')?></h5>
                <div class="footer-contacts__text"> <?=$contactInformation->about?>
                </div>
                <ul class="footer-contacts__contacts">
                  <li><i class="footer-contacts__icon fas fa-globe-americas"></i> <?=$contactInformation->address?>
                  </li>
                  <li><i class="footer-contacts__icon far fa-envelope"></i> <?=$contactInformation->email?></li>
                  <li><i
                        class="footer-contacts__icon fas fa-mobile-alt"></i> <?=$contactInformation->phone_number_mobile . ", " . $contactInformation->phone_number_home?>
                  </li>
                  <li><i
                        class="footer-contacts__icon far fa-clock"></i><?=$contactInformation->opening_days . ' ' . $contactInformation->opening_hours?>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
              <div class="site-footer__widget footer-links"><h5
                    class="footer-links__title"><?=lang('app.information')?></h5>
                <ul class="footer-links__list">
                  <li class="footer-links__item">
                    <a href="<?=base_url('')?>" class="footer-links__link"><?=lang('app.home')?></a>
                  </li>
                  <li class="footer-links__item">
                    <a href="<?=base_url('xidmetler')?>" class="footer-links__link"><?=lang('app.services')?></a>
                  </li>
                  <li class="footer-links__item">
                    <a href="<?=base_url('brendler')?>" class="footer-links__link"><?=lang('app.brands')?></a>
                  </li>
                  <li class="footer-links__item">
                    <a href="<?=base_url('partniyorlar')?>" class="footer-links__link"><?=lang('app.partners')?></a>
                  </li>
                  <li class="footer-links__item">
                    <a href="<?=base_url('vakansiyalar')?>" class="footer-links__link">Vakansiyalar</a>
                  </li>
                  <li class="footer-links__item">
                    <a href="<?=base_url('haqqimizda')?>" class="footer-links__link"><?=lang('app.about_us')?></a>
                  </li>
                  <li class="footer-links__item">
                    <a href="<?=base_url('catdirilma-sertleri')?>"
                       class="footer-links__link"><?=lang('app.delivery_info')?></a>
                  </li>
                  <li class="footer-links__item">
                    <a href="<?=base_url('elaqe')?>" class="footer-links__link"><?=lang('app.contact_us')?></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
              <div class="site-footer__widget footer-newsletter">
                <h5 class="footer-newsletter__title"><?=lang('app.newsletter')?></h5>
                <?php if(!isset($_COOKIE['is_subscribed'])): ?>
                  <div class="footer-newsletter__text">
                    Yeniliklərdən və kampaniyalardan xəbərdar olmaq üçün abunə olun
                  </div>
                  <form action="<?=base_url('abune_ol')?>" method="post" class="footer-newsletter__form">
                    <label class="sr-only" for="footer-newsletter-address">Email ünvan</label>
                    <input type="email" name="email" class="footer-newsletter__form-input form-control"
                           id="footer-newsletter-address"
                           placeholder="Email ünvan...">
                    <button class="footer-newsletter__form-button btn btn-primary">Abunə ol</button>
                  </form>
                <?php else: ?>
                  <div class="footer-newsletter__text">
                    Siz artıq <?=$_COOKIE['is_subscribed']?> e-mail ünvanı ilə sayta abunə olmusunuz
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="totop">
        <div class="totop__body">
          <div class="totop__start"></div>
          <div class="totop__container container"></div>
          <div class="totop__end">
            <button type="button" class="totop__button">
              <svg width="13px" height="8px">
                <use xlink:href="<?=base_url("front/images/sprite.svg#arrow-rounded-up-13x8")?>"></use>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>
<div class="mobilemenu">
  <div class="mobilemenu__backdrop"></div>
  <div class="mobilemenu__body">
    <div class="mobilemenu__header">
      <div class="mobilemenu__title">Menu</div>
      <button type="button" class="mobilemenu__close">
        <svg width="20px" height="20px">
          <use xlink:href="<?=base_url("front/images/sprite.svg#cross-20")?>"></use>
        </svg>
      </button>
    </div>
    <div class="mobilemenu__content">
      <ul class="mobile-links mobile-links--level--0" data-collapse
          data-collapse-opened-class="mobile-links__item--open">
        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title">
            <a href="<?=base_url('')?>" class="mobile-links__item-link"><?=lang('app.home')?></a>
          </div>
        </li>
        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title"><a href="#"
                                                   class="mobile-links__item-link"><?=lang('app.categories')?></a>
            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
              <svg class="mobile-links__item-arrow" width="12px" height="7px">
                <use xlink:href="<?=base_url("front/images/sprite.svg#arrow-rounded-down-12x7")?>"></use>
              </svg>
            </button>
          </div>
          <div class="mobile-links__item-sub-links" data-collapse-content>
            <ul class="mobile-links mobile-links--level--1">
              <?php foreach($categoriesLVL0 as $categoryLVL0): ?>
                <li class="mobile-links__item" data-collapse-item>
                  <div class="mobile-links__item-title"><a
                        href="<?=base_url('kateqoriyalar/' . $categoryLVL0->slug_url)?>"
                        class="mobile-links__item-link"><?=$categoryLVL0->name?></a>
                    <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                      <svg class="mobile-links__item-arrow" width="12px" height="7px">
                        <use xlink:href="<?=base_url("front/images/sprite.svg#arrow-rounded-down-12x7")?>"></use>
                      </svg>
                    </button>
                  </div>
                  <div class="mobile-links__item-sub-links" data-collapse-content>
                    <ul class="mobile-links mobile-links--level--2">
                      <?php foreach($categoriesLVL1 as $categoryLVL1):
                        if($categoryLVL0->id == $categoryLVL1->parent_category_id):
                          ?>
                          <li class="mobile-links__item" data-collapse-item>
                            <div class="mobile-links__item-title"><a
                                  href="<?=base_url('kateqoriyalar/' . $categoryLVL1->slug_url)?>"
                                  class="mobile-links__item-link"><?=$categoryLVL1->name?></a>
                              <button class="mobile-links__item-toggle" type="button"
                                      data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                  <use
                                      xlink:href="<?=base_url("front/images/sprite.svg#arrow-rounded-down-12x7")?>"></use>
                                </svg>
                              </button>
                            </div>
                            <div class="mobile-links__item-sub-links" data-collapse-content>
                              <ul class="mobile-links mobile-links--level--2">
                                <?php
                                foreach($categoriesLVL2 as $categoryLVL2):
                                  if($categoryLVL1->id == $categoryLVL2->parent_category_id): ?>
                                    <li class="mobile-links__item" data-collapse-item>
                                      <div class="mobile-links__item-title"><a
                                            href="<?=base_url('kateqoriyalar/' . $categoryLVL2->slug_url)?>"
                                            class="mobile-links__item-link"><?=$categoryLVL2->name?></a>
                                      </div>
                                    </li>
                                  <?php
                                  endif;
                                endforeach;
                                ?>
                              </ul>
                          </li>
                        <?php endif;
                      endforeach;
                      ?>
                    </ul>
                  </div>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </li>
        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title"><a href="<?=base_url('haqqimizda')?>"
                                                   class="mobile-links__item-link"><?=lang('app.about_us')?></a>
          </div>
        </li>
        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title"><a href="<?=base_url('elaqe')?>"
                                                   class="mobile-links__item-link"><?=lang('app.contact_us')?></a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div>
        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
        <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
      <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__center"></div>
      </div>
    </div>
  </div>
</div>
<script src="<?=base_url('front/vendor/jquery/jquery.min.js')?>"></script>
<script src="<?=base_url('front/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?=base_url('front/vendor/owl-carousel/owl.carousel.min.js')?>"></script>
<script src="<?=base_url('front/vendor/nouislider/nouislider.min.js')?>"></script>
<script src="<?=base_url('front/vendor/photoswipe/photoswipe.min.js')?>"></script>
<script src="<?=base_url('front/vendor/photoswipe/photoswipe-ui-default.min.js')?>"></script>
<script src="<?=base_url('front/vendor/select2/js/select2.min.js')?>"></script>
<script src="<?=base_url('front/js/number.js')?>"></script>
<script src="<?=base_url('front/js/main.js')?>"></script>
<script src="<?=base_url('front/js/header.js')?>"></script>
<script src="<?=base_url('front/vendor/svg4everybody/svg4everybody.min.js')?>"></script>
<script>svg4everybody();</script>
<?=$this->renderSection('script_code')?>
</body>

</html>
