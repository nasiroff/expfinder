<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <title>Stroyka</title>
  <link rel="icon" type="image/png" href="<?=base_url('front/images/favicon.png')?>"><!-- fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i"><!-- css -->
  <link rel="stylesheet" href="<?=base_url('front/vendor/bootstrap-4.2.1/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('front/vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css')?>">
  <link rel="stylesheet" href="front/vendor/photoswipe/photoswipe.css">
  <link rel="stylesheet" href="front/vendor/photoswipe/default-skin.css">
  <link rel="stylesheet" href="front/vendor/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url('front/css/style.css')?>"><!-- js -->
  <link rel="stylesheet" href="<?=base_url('front/vendor/fontawesome-5.6.1/css/all.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('front/fonts/stroyka/stroyka.css')?>">
  <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-6"></script>
  <script>window.dataLayer = window.dataLayer || [];

    function gtag(){
      dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-97489509-6');</script>
</head>
<body>
<div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content"></div>
  </div>
</div>
<div class="mobilemenu">
  <div class="mobilemenu__backdrop"></div>
  <div class="mobilemenu__body">
    <div class="mobilemenu__header">
      <div class="mobilemenu__title">Menyu</div>
      <button type="button" class="mobilemenu__close">
        <svg width="20px" height="20px">
          <use xlink:href="<?=base_url('front/images/sprite.svg#cross-20')?>"></use>
        </svg>
      </button>
    </div>
    <div class="mobilemenu__content">
      <ul class="mobile-links mobile-links--level--0" data-collapse
          data-collapse-opened-class="mobile-links__item--open">
        <!--                <?php /*foreach ($categoriesLVL0 as $categoryLVL0): */ ?>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title"><a href="#"
                                                                 class="mobile-links__item-link"><? /*= $categoryLVL0->name */ ?></a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="<? /*= base_url('front/images/sprite.svg#arrow-rounded-down-12x7') */ ?>"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <?php /*foreach ($categoriesLVL1 as $categoryLVL1):
                                    if ($categoryLVL1->parent_category_id == $categoryLVL0->id):*/ ?>
                                        <li class="mobile-links__item" data-collapse-item>
                                            <div class="mobile-links__item-title"><a href="#"
                                                                                     class="mobile-links__item-link"><? /*= $categoryLVL1->name */ ?></a>
                                                <button class="mobile-links__item-toggle" type="button"
                                                        data-collapse-trigger>
                                                    <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                        <use xlink:href="<? /*= base_url('front/images/sprite.svg#arrow-rounded-down-12x7') */ ?>"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="mobile-links__item-sub-links" data-collapse-content>
                                                <ul class="mobile-links mobile-links--level--2">
                                                    <?php /*foreach ($categoriesLVL2 as $categoryLVL2):
                                                        if ($categoryLVL2->parent_category_id == $categoryLVL1->id):*/ ?>
                                                            <li class="mobile-links__item" data-collapse-item>
                                                                <div class="mobile-links__item-title"><a href="#"
                                                                                                         class="mobile-links__item-link"><? /*= $categoryLVL2->name */ ?></a>
                                                                </div>
                                                            </li>
                                                        <?php /*endif;
                                                    endforeach; */ ?>
                                                </ul>
                                            </div>
                                        </li>
                                    <?php
        /*                                    endif;
                                        endforeach; */ ?>


                            </ul>
                        </div>
                    </li>
                --><?php /*endforeach; */ ?>

        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html"
                                                   class="mobile-links__item-link"><?=lang('home')?></a>
          </div>
        </li>


        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title">
            <div class="mobile-links__item-link"><?=lang('categories')?></div>
            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
              <svg class="mobile-links__item-arrow" width="12px" height="7px">
                <use xlink:href="front/images/sprite.svg#arrow-rounded-down-12x7"></use>
              </svg>
            </button>
          </div>
          <div class="mobile-links__item-sub-links" data-collapse-content>
            <ul class="mobile-links mobile-links--level--1">
              <?php foreach($categoriesLVL0 as $categoryLVL0): ?>
                <li class="mobile-links__item" data-collapse-item>
                  <div class="mobile-links__item-title"><a href="#"
                                                           class="mobile-links__item-link"><?=$categoryLVL0->name?></a>
                    <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                      <svg class="mobile-links__item-arrow" width="12px" height="7px">
                        <use xlink:href="front/images/sprite.svg#arrow-rounded-down-12x7"></use>
                      </svg>
                    </button>
                  </div>
                  <div class="mobile-links__item-sub-links" data-collapse-content>
                    <ul class="mobile-links mobile-links--level--2">
                      <?php foreach($categoriesLVL1 as $categoryLVL1):
                        if($categoryLVL0->id == $categoryLVL1->parent_category_id):
                          ?>
                          <li class="mobile-links__item" data-collapse-item>
                            <div class="mobile-links__item-title"><a href="#"
                                                                     class="mobile-links__item-link"><?=$categoryLVL1->name?></a>
                              <button class="mobile-links__item-toggle" type="button"
                                      data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                  <use xlink:href="front/images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                              </button>
                            </div>
                            <div class="mobile-links__item-sub-links" data-collapse-content>
                              <ul class="mobile-links mobile-links--level--2">
                                <?php
                                foreach($categoriesLVL2 as $categoryLVL2):
                                  if($categoryLVL1->id == $categoryLVL2->parent_category_id): ?>
                                    <li class="mobile-links__item" data-collapse-item>
                                      <div class="mobile-links__item-title"><a href="#"
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
          <div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html"
                                                   class="mobile-links__item-link"><?=lang('about_us')?></a>
          </div>
        </li>
        <li class="mobile-links__item" data-collapse-item>
          <div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html"
                                                   class="mobile-links__item-link"><?=lang('contact_us')?></a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<div class="site">
  <header class="site__header d-lg-none">
    <div class="mobile-header mobile-header--sticky mobile-header--stuck">
      <div class="mobile-header__panel">
        <div class="container">
          <div class="mobile-header__body">
            <button class="mobile-header__menu-button">
              <svg width="18px" height="14px">
                <use xlink:href="<?=base_url('front/images/sprite.svg#menu-18x14')?>"></use>
              </svg>
            </button>
            <a class="mobile-header__logo" href="index.html">
              <svg xmlns="http://www.w3.org/2000/svg" width="120px" height="20px">
                <path d="M118.5,20h-1.1c-0.6,0-1.2-0.4-1.4-1l-1.5-4h-6.1l-1.5,4c-0.2,0.6-0.8,1-1.4,1h-1.1c-1,0-1.8-1-1.4-2l1.1-3
                                 l1.5-4l3.6-10c0.2-0.6,0.8-1,1.4-1h1.6c0.6,0,1.2,0.4,1.4,1l3.6,10l1.5,4l1.1,3C120.3,19,119.5,20,118.5,20z M111.5,6.6l-1.6,4.4
                                 h3.2L111.5,6.6z M99.5,20h-1.4c-0.4,0-0.7-0.2-0.9-0.5L94,14l-2,3.5v1c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5v-17
                                 C88,0.7,88.7,0,89.5,0h1C91.3,0,92,0.7,92,1.5v8L94,6l3.2-5.5C97.4,0.2,97.7,0,98.1,0h1.4c1.2,0,1.9,1.3,1.3,2.3L96.3,10l4.5,7.8
                                 C101.4,18.8,100.7,20,99.5,20z M80.3,11.8L80,12.3v6.2c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5v-6.2l-0.3-0.5l-5.5-9.5
                                 c-0.6-1,0.2-2.3,1.3-2.3h1.4c0.4,0,0.7,0.2,0.9,0.5L76,4.3l2,3.5l2-3.5l2.2-3.8C82.4,0.2,82.7,0,83.1,0h1.4c1.2,0,1.9,1.3,1.3,2.3
                                 L80.3,11.8z M60,20c-5.5,0-10-4.5-10-10S54.5,0,60,0s10,4.5,10,10S65.5,20,60,20z M60,4c-3.3,0-6,2.7-6,6s2.7,6,6,6s6-2.7,6-6
                                 S63.3,4,60,4z M47.8,17.8c0.6,1-0.2,2.3-1.3,2.3h-2L41,14h-4v4.5c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5v-17
                                 C33,0.7,33.7,0,34.5,0H41c0.3,0,0.7,0,1,0.1c3.4,0.5,6,3.4,6,6.9c0,2.4-1.2,4.5-3.1,5.8L47.8,17.8z M42,4.2C41.7,4.1,41.3,4,41,4h-3
                                 c-0.6,0-1,0.4-1,1v4c0,0.6,0.4,1,1,1h3c0.3,0,0.7-0.1,1-0.2c0.3-0.1,0.6-0.3,0.9-0.5C43.6,8.8,44,7.9,44,7C44,5.7,43.2,4.6,42,4.2z
                                  M29.5,4H25v14.5c0,0.8-0.7,1.5-1.5,1.5h-1c-0.8,0-1.5-0.7-1.5-1.5V4h-4.5C15.7,4,15,3.3,15,2.5v-1C15,0.7,15.7,0,16.5,0h13
                                 C30.3,0,31,0.7,31,1.5v1C31,3.3,30.3,4,29.5,4z M6.5,20c-2.8,0-5.5-1.7-6.4-4c-0.4-1,0.3-2,1.3-2h1c0.5,0,0.9,0.3,1.2,0.7
                                 c0.2,0.3,0.4,0.6,0.8,0.8C4.9,15.8,5.8,16,6.5,16c1.5,0,2.8-0.9,2.8-2c0-0.7-0.5-1.3-1.2-1.6C7.4,12,7,11,7.4,10.3l0.4-0.9
                                 c0.4-0.7,1.2-1,1.8-0.6c0.6,0.3,1.2,0.7,1.6,1.2c1,1.1,1.7,2.5,1.7,4C13,17.3,10.1,20,6.5,20z M11.6,6h-1c-0.5,0-0.9-0.3-1.2-0.7
                                 C9.2,4.9,8.9,4.7,8.6,4.5C8.1,4.2,7.2,4,6.5,4C5,4,3.7,4.9,3.7,6c0,0.7,0.5,1.3,1.2,1.6C5.6,8,6,9,5.6,9.7l-0.4,0.9
                                 c-0.4,0.7-1.2,1-1.8,0.6c-0.6-0.3-1.2-0.7-1.6-1.2C0.6,8.9,0,7.5,0,6c0-3.3,2.9-6,6.5-6c2.8,0,5.5,1.7,6.4,4C13.3,4.9,12.6,6,11.6,6
                                 z">
                </path>
              </svg>
            </a>
            <div class="mobile-header__search">
              <form class="mobile-header__search-form" action="#"><input
                    class="mobile-header__search-input" name="search"
                    placeholder="Search over 10,000 products" aria-label="Site search" type="text"
                    autocomplete="off">
                <button class="mobile-header__search-button mobile-header__search-button--submit"
                        type="submit">
                  <svg width="20px" height="20px">
                    <use xlink:href="<?=base_url('front/images/sprite.svg#search-20')?>"></use>
                  </svg>
                </button>
                <button class="mobile-header__search-button mobile-header__search-button--close"
                        type="button">
                  <svg width="20px" height="20px">
                    <use xlink:href="<?=base_url('front/images/sprite.svg#cross-20')?>"></use>
                  </svg>
                </button>
                <div class="mobile-header__search-body"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <header class="site__header d-lg-block d-none">
    <div class="site-header">
      <div class="site-header__middle container">
        <div class="site-header__logo"><a href="index.html">
            <svg xmlns="http://www.w3.org/2000/svg" width="196px" height="26px">
              <path
                  d="M194.797,18 L184,18 C184,18.552 183.552,19 183,19 L182,19 C181.448,19 181,18.552 181,18 L181,16 L178.377,16 C177.708,16 177.119,15.556 176.935,14.912 L173.246,2 L168,2 L168,4 L168.500,4 C169.328,4 170,4.672 170,5.500 L170,24.500 C170,25.328 169.328,26 168.500,26 L165.500,26 C164.672,26 164,25.328 164,24.500 L164,5.500 C164,4.672 164.672,4 165.500,4 L166,4 L166,1.500 C166,0.672 166.672,0 167.500,0 L173.622,0 C174.292,0 174.881,0.444 175.065,1.088 L178.754,14 L181,14 L181,13 C181,12.448 181.448,12 182,12 L183,12 C183.552,12 184,12.448 184,13 L194.797,13 C195.461,13 196,13.539 196,14.203 L196,16.797 C196,17.461 195.461,18 194.797,18 ZM156.783,26 L154.483,26 C153.767,26 153.129,25.552 152.884,24.878 L150.437,18.135 C150.407,18.054 150.331,18 150.245,18 L142.768,18 C142.682,18 142.606,18.054 142.576,18.135 L140.129,24.878 C139.884,25.552 139.245,26 138.530,26 L136.230,26 C135.395,26 134.815,25.169 135.100,24.383 L143.445,1.122 C143.690,0.448 144.328,0 145.044,0 L147.969,0 C148.685,0 149.323,0.448 149.568,1.122 L157.913,24.383 C158.198,25.169 157.618,26 156.783,26 ZM148.472,12.725 L146.698,7.848 C146.633,7.668 146.380,7.668 146.315,7.848 L144.541,12.725 C144.492,12.859 144.591,13 144.733,13 L148.280,13 C148.422,13 148.521,12.859 148.472,12.725 ZM130.493,26 L128.090,26 C127.555,26 127.060,25.714 126.792,25.250 L122.610,18 L120.003,22.520 L120.003,24.500 C120.003,25.328 119.333,26 118.505,26 L116.507,26 C115.680,26 115.009,25.328 115.009,24.500 L115.009,1.500 C115.009,0.672 115.680,0 116.507,0 L118.505,0 C119.333,0 120.003,0.672 120.003,1.500 L120.003,12.520 L126.792,0.750 C127.060,0.286 127.555,0 128.090,0 L130.493,0 C131.646,0 132.367,1.250 131.791,2.250 L125.487,13 L131.791,23.750 C132.367,24.750 131.646,26 130.493,26 ZM103.987,15.775 L103.987,24.500 C103.987,25.328 103.315,26 102.486,26 L100.485,26 C99.656,26 98.984,25.328 98.984,24.500 L98.984,15.775 L98.594,15.100 L91.180,2.250 C90.610,1.250 91.330,0 92.481,0 L94.792,0 C95.322,0 95.823,0.290 96.093,0.750 L101.486,10.090 L106.879,0.750 C107.149,0.290 107.649,0 108.179,0 L110.491,0 C111.641,0 112.362,1.250 111.791,2.250 L103.987,15.775 ZM79,26 C71.821,26 66,20.179 66,13 C66,5.820 71.821,-0.001 79,-0.001 C86.180,-0.001 92.001,5.820 92.001,13 C92.001,20.179 86.180,26 79,26 ZM79,5 C74.582,5 71,8.582 71,13 C71,17.418 74.582,21 79,21 C83.418,21 87,17.418 87,13 C87,8.582 83.418,5 79,5 ZM62.793,23.750 C63.362,24.750 62.643,26 61.494,26 L59.186,26 C58.656,26 58.157,25.710 57.887,25.250 L53.711,18 L49.005,18 L49.005,24.500 C49.005,25.330 48.335,26 47.506,26 L45.508,26 C44.679,26 44.009,25.330 44.009,24.500 L44.009,1.500 C44.009,0.670 44.679,0 45.508,0 L54,0 C58.966,0 62.992,4.030 62.992,9 C62.992,12.240 61.274,15.090 58.706,16.670 L62.793,23.750 ZM54,5 L50.004,5 C49.454,5 49.005,5.450 49.005,6 L49.005,12 C49.005,12.550 49.454,13 50.004,13 L54,13 C56.208,13 57.997,11.210 57.997,9 C57.997,6.790 56.208,5 54,5 ZM39.500,5 L33,5 L33,24.500 C33,25.328 32.328,26 31.500,26 L29.500,26 C28.672,26 28,25.328 28,24.500 L28,5 L21.500,5 C20.672,5 20,4.328 20,3.500 L20,1.500 C20,0.672 20.672,0 21.500,0 L39.500,0 C40.328,0 41,0.672 41,1.500 L41,3.500 C41,4.328 40.328,5 39.500,5 ZM16.487,8 L14.181,8 C13.565,8 13.040,7.611 12.790,7.048 C12.261,5.856 10.765,5 9,5 C6.793,5 5.005,6.340 5.005,8 C5.005,8.940 5.575,9.780 6.483,10.320 C6.706,10.455 6.948,10.574 7.206,10.673 C8.059,11 8.412,12.020 7.955,12.812 L6.948,14.558 C6.573,15.208 5.768,15.499 5.080,15.201 C3.872,14.679 2.815,13.924 1.989,13 C0.751,11.630 0.012,9.890 0.012,8 C0.012,3.580 4.037,0 9,0 C13.254,0 17.017,2.629 17.950,6.163 C18.196,7.095 17.450,8 16.487,8 ZM1.513,18 L3.820,18 C4.435,18 4.960,18.389 5.210,18.952 C5.739,20.144 7.236,21 9,21 C11.207,21 12.995,19.660 12.995,18 C12.995,17.060 12.426,16.220 11.517,15.680 C11.294,15.544 11.052,15.426 10.794,15.327 C9.941,14.999 9.588,13.980 10.045,13.188 L11.053,11.442 C11.427,10.792 12.233,10.501 12.920,10.799 C14.128,11.320 15.185,12.075 16.011,13 C17.249,14.370 17.988,16.110 17.988,18 C17.988,22.420 13.964,26 9,26 C4.747,26 0.983,23.371 0.050,19.837 C-0.196,18.905 0.550,18 1.513,18 Z"></path>
            </svg>
          </a></div>
        <div class="site-header__search">
          <div class="search">
            <form class="search__form" action="#">
              <input class="search__input" name="search" placeholder="Search over 10,000 products"
                     aria-label="Site search"
                     type="text"
                     autocomplete="off">
              <button class="search__button" type="submit">
                <svg width="20px" height="20px">
                  <use xlink:href="<?=base_url('front/images/sprite.svg#search-20')?>"></use>
                </svg>
              </button>
              <div class="search__border"></div>
            </form>
          </div>
        </div>
        <div class="site-header__phone">
          <div class="site-header__phone-title">Customer Service</div>
          <div class="site-header__phone-number">(800) 060-0730</div>
        </div>
      </div>
      <div class="site-header__nav-panel">
        <div class="nav-panel">
          <div class="nav-panel__container container">
            <div class="nav-panel__row">
              <div class="nav-panel__departments">
                <div class="departments departments--opened departments--fixed"
                     data-departments-fixed-by=".block-slideshow">
                  <div class="departments__body">
                    <div class="departments__links-wrapper">
                      <ul class="departments__links">
                        <?php foreach($categoriesLVL0 as $categoryLVL0): ?>
                          <li class="departments__item"><a href="#"><?=$categoryLVL0->name?>
                              <svg class="departments__link-arrow" width="6px"
                                   height="9px">
                                <use
                                    xlink:href="<?=base_url('front/images/sprite.svg#arrow-rounded-right-6x9')?>"></use>
                              </svg>
                            </a>
                            <div class="departments__megamenu departments__megamenu--xl">
                              <div class="megamenu megamenu--departments">
                                <div class="row">
                                  <?php
                                  $countCategoriesLVL1 = count($categoriesLVL1);
                                  for($i = 0; $i < count($categoriesLVL1); $i++):?>
                                    <?php if($categoryLVL0->id == $categoriesLVL1[$i]->parent_category_id): ?>
                                      <div class="col-3">
                                        <ul class="megamenu__links megamenu__links--level--0">
                                          <li class="megamenu__item megamenu__item--with-submenu">
                                            <a href="#"><?=$categoriesLVL1[$i]->name?></a>
                                            <ul class="megamenu__links megamenu__links--level--1">
                                              <?php foreach($categoriesLVL2 as $categoryLVL2){
                                                if($categoryLVL2->parent_category_id == $categoriesLVL1[$i]->id){
                                                  ?>
                                                  <li class="megamenu__item">
                                                    <a href="#"><?=$categoryLVL2->name?></a>
                                                  </li>
                                                <?php }else{
                                                  continue;
                                                }
                                              } ?>
                                            </ul>
                                          </li>
                                          <?php if($countCategoriesLVL1 > ++$i){ ?>
                                            <li class="megamenu__item megamenu__item--with-submenu">
                                              <a href="#"><?=$categoriesLVL1[$i]->name;?></a>
                                              <ul class="megamenu__links megamenu__links--level--1">
                                                <?php foreach($categoriesLVL2 as $categoryLVL2){
                                                  if($categoryLVL2->parent_category_id == $categoriesLVL1[$i]->id){
                                                    ?>
                                                    <li class="megamenu__item">
                                                      <a href="#"><?=$categoryLVL2->name?></a>
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
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                  <button class="departments__button">
                    <svg class="departments__button-icon" width="18px" height="14px">
                      <use xlink:href="<?=base_url('front/images/sprite.svg#menu-18x14')?>"></use>
                    </svg>
                    Shop By Category
                    <svg class="departments__button-arrow" width="9px" height="6px">
                      <use xlink:href="<?=base_url('front/images/sprite.svg#arrow-rounded-down-9x6')?>"></use>
                    </svg>
                  </button>
                </div>
              </div>
              <div class="nav-panel__nav-links nav-links">
                <ul class="nav-links__list">
                  <li class="nav-links__item nav-links__item--with-submenu">
                    <a href="index.html">
                      <span><?=lang('home')?></span>
                    </a>
                  </li>
                  <li class="nav-links__item nav-links__item--with-submenu">
                    <a href="index.html">
                      <span><?=lang('about_us')?>
                      </span>
                    </a>
                  </li>
                  <li class="nav-links__item nav-links__item--with-submenu">
                    <a href="index.html">
                      <span><?=lang('contact_us')?>
                        <svg class="nav-links__arrow" width="9px" height="6px">
                          <use xlink:href="<?=base_url('front/images/sprite.svg#arrow-rounded-down-9x6')?>"></use>
                        </svg>
                      </span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="site__body">
    <div class="block-slideshow block-slideshow--layout--with-departments block">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-9 offset-lg-3">
            <div class="block-slideshow__body">
              <div class="owl-carousel"><a class="block-slideshow__slide" href="#">
                  <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                       style="background-image: url('<?=base_url('front/images/slides/slide-1.jpg')?>')"></div>
                  <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                       style="background-image: url('<?=base_url('front/images/slides/slide-1-mobile.jpg')?>')"></div>
                  <div class="block-slideshow__slide-content">
                    <div class="block-slideshow__slide-title">Big choice of<br>Plumbing products
                    </div>
                    <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur
                      adipiscing elit.<br>Etiam pharetra laoreet dui quis molestie.
                    </div>
                    <div class="block-slideshow__slide-button"><span class="btn btn-primary btn-lg">Shop Now</span>
                    </div>
                  </div>
                </a><a class="block-slideshow__slide" href="#">
                  <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                       style="background-image: url('<?=base_url('front/images/slides/slide-2.jpg')?>')"></div>
                  <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                       style="background-image: url('<?=base_url('front/images/slides/slide-2-mobile.jpg')?>')"></div>
                  <div class="block-slideshow__slide-content">
                    <div class="block-slideshow__slide-title">Screwdrivers<br>Professional Tools
                    </div>
                    <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur
                      adipiscing elit.<br>Etiam pharetra laoreet dui quis molestie.
                    </div>
                    <div class="block-slideshow__slide-button"><span class="btn btn-primary btn-lg">Shop Now</span>
                    </div>
                  </div>
                </a><a class="block-slideshow__slide" href="#">
                  <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                       style="background-image: url('<?=base_url('front/images/slides/slide-3.jpg')?>')"></div>
                  <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                       style="background-image: url('<?=base_url('front/images/slides/slide-3-mobile.jpg')?>')"></div>
                  <div class="block-slideshow__slide-content">
                    <div class="block-slideshow__slide-title">One more<br>Unique header</div>
                    <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur
                      adipiscing elit.<br>Etiam pharetra laoreet dui quis molestie.
                    </div>
                    <div class="block-slideshow__slide-button"><span class="btn btn-primary btn-lg">Shop Now</span>
                    </div>
                  </div>
                </a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="block block-features block-features--layout--classic">
      <div class="container">
        <div class="block-features__list">
          <div class="block-features__item">
            <div class="block-features__icon">
              <svg width="48px" height="48px">
                <use xlink:href="<?=base_url('front/images/sprite.svg#fi-free-delivery-48')?>"></use>
              </svg>
            </div>
            <div class="block-features__content">
              <div class="block-features__title">Free Shipping</div>
              <div class="block-features__subtitle">For orders from $50</div>
            </div>
          </div>
          <div class="block-features__divider"></div>
          <div class="block-features__item">
            <div class="block-features__icon">
              <svg width="48px" height="48px">
                <use xlink:href="<?=base_url('front/images/sprite.svg#fi-24-hours-48')?>"></use>
              </svg>
            </div>
            <div class="block-features__content">
              <div class="block-features__title">Support 24/7</div>
              <div class="block-features__subtitle">Call us anytime</div>
            </div>
          </div>
          <div class="block-features__divider"></div>
          <div class="block-features__item">
            <div class="block-features__icon">
              <svg width="48px" height="48px">
                <use xlink:href="<?=base_url('front/images/sprite.svg#fi-payment-security-48')?>"></use>
              </svg>
            </div>
            <div class="block-features__content">
              <div class="block-features__title">100% Safety</div>
              <div class="block-features__subtitle">Only secure payments</div>
            </div>
          </div>
          <div class="block-features__divider"></div>
          <div class="block-features__item">
            <div class="block-features__icon">
              <svg width="48px" height="48px">
                <use xlink:href="<?=base_url('front/images/sprite.svg#fi-tag-48')?>"></use>
              </svg>
            </div>
            <div class="block-features__content">
              <div class="block-features__title">Hot Offers</div>
              <div class="block-features__subtitle">Discounts up to 90%</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="block block-products block-products--layout--large-first">
      <div class="container">
        <div class="block-header"><h3 class="block-header__title">Bestsellers</h3>
          <div class="block-header__divider"></div>
        </div>
        <div class="block-products__body">
          <div class="block-products__list">
            <div class="block-products__list-item">
              <div class="product-card">
                <button class="product-card__quickview" data-product="19" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="<?=base_url('front/images/sprite.svg#quickview-16')?>"></use>
                  </svg>
                  <span class="fake-svg-icon"></span>
                </button>
                <div class="product-card__badges-list">
                  <div class="product-card__badge product-card__badge--hot">Hot</div>
                </div>
                <div class="product-card__image"><a href="product.html"><img
                        src="<?=base_url('front/images/products/product-2.jpg')?>" alt=""></a>
                </div>
                <div class="product-card__info">
                  <div class="product-card__name"><a href="product.html">Undefined Tool IRadix
                      DPS3000SY 2700 Watts</a></div>
                </div>
                <div class="product-card__actions">
                  <div class="product-card__prices">$1,019.00</div>
                  <div class="product-card__buttons">
                    <button class="btn btn-primary product-card__addtocart" type="button">
                      <?=lang('look_detailed')?>
                    </button>

                  </div>
                </div>
              </div>
            </div>
            <div class="block-products__list-item">
              <div class="product-card">
                <button class="product-card__quickview" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="<?=base_url('front/images/sprite.svg#quickview-16')?>"></use>
                  </svg>
                  <span class="fake-svg-icon"></span></button>
                <div class="product-card__badges-list">
                  <div class="product-card__badge product-card__badge--hot">Hot</div>
                </div>
                <div class="product-card__image"><a href="product.html"><img
                        src="<?=base_url('front/images/products/product-2.jpg')?>" alt=""></a>
                </div>
                <div class="product-card__info">
                  <div class="product-card__name"><a href="product.html">Undefined Tool IRadix
                      DPS3000SY 2700 Watts</a></div>
                </div>
                <div class="product-card__actions">
                  <div class="product-card__prices">$1,019.00</div>
                  <div class="product-card__buttons">
                    <button class="btn btn-primary product-card__addtocart" type="button">
                      <?=lang('look_detailed')?>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-products__list-item">
              <div class="product-card">
                <button class="product-card__quickview" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="<?=base_url('front/images/sprite.svg#quickview-16')?>"></use>
                  </svg>
                  <span class="fake-svg-icon"></span></button>
                <div class="product-card__image"><a href="product.html"><img
                        src="<?=base_url('front/images/products/product-3.jpg')?>" alt=""></a>
                </div>
                <div class="product-card__info">
                  <div class="product-card__name"><a href="product.html">Drill Screwdriver Brandix
                      ALX7054 200 Watts</a></div>
                </div>
                <div class="product-card__actions">
                  <div class="product-card__prices">$850.00</div>
                  <div class="product-card__buttons">
                    <button class="btn btn-primary product-card__addtocart" type="button">
                      <?=lang('look_detailed')?>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-products__list-item">
              <div class="product-card">
                <button class="product-card__quickview" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="<?=base_url('front/images/sprite.svg#quickview-16')?>"></use>
                  </svg>
                  <span class="fake-svg-icon"></span></button>
                <div class="product-card__badges-list">
                  <div class="product-card__badge product-card__badge--sale">Sale</div>
                </div>
                <div class="product-card__image"><a href="product.html"><img
                        src="<?=base_url('front/images/products/product-4.jpg')?>" alt=""></a>
                </div>
                <div class="product-card__info">
                  <div class="product-card__name"><a href="product.html">Drill Series 3 Brandix
                      KSR4590PQS 1500 Watts</a></div>
                </div>
                <div class="product-card__actions">
                  <div class="product-card__prices">$949.00</div>
                  <div class="product-card__buttons">
                    <button class="btn btn-primary product-card__addtocart" type="button">
                      <?=lang('look_detailed')?>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-products__list-item">
              <div class="product-card">
                <button class="product-card__quickview" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="<?=base_url('front/images/sprite.svg#quickview-16')?>"></use>
                  </svg>
                  <span class="fake-svg-icon"></span></button>
                <div class="product-card__image"><a href="product.html"><img
                        src="<?=base_url('front/images/products/product-5.jpg')?>" alt=""></a>
                </div>
                <div class="product-card__info">
                  <div class="product-card__name"><a href="product.html">Brandix Router Power Tool
                      2017ERXPK</a></div>
                </div>
                <div class="product-card__actions">
                  <div class="product-card__prices">$1,700.00</div>
                  <div class="product-card__buttons">
                    <button class="btn btn-primary product-card__addtocart" type="button">
                      <?=lang('look_detailed')?>
                    </button>
                  </div>

                </div>
              </div>
            </div>
            <div class="block-products__list-item">
              <div class="product-card">
                <button class="product-card__quickview" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="<?=base_url('front/images/sprite.svg#quickview-16')?>"></use>
                  </svg>
                  <span class="fake-svg-icon"></span></button>
                <div class="product-card__image"><a href="product.html"><img
                        src="<?=base_url('front/images/products/product-6.jpg')?>" alt=""></a>
                </div>
                <div class="product-card__info">
                  <div class="product-card__name">
                    <a href="product.html">Brandix Drilling Machine DM2019KW4 4kW</a>
                  </div>
                </div>
                <div class="product-card__actions">
                  <div class="product-card__prices">$3,199.00</div>
                  <div class="product-card__buttons">
                    <button class="btn btn-primary product-card__addtocart" type="button">
                      <?=lang('look_detailed')?>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="block-products__list-item">
              <div class="product-card">
                <button class="product-card__quickview" type="button">
                  <svg width="16px" height="16px">
                    <use xlink:href="<?=base_url('front/images/sprite.svg#quickview-16')?>"></use>
                  </svg>
                  <span class="fake-svg-icon"></span>
                </button>
                <div class="product-card__image"><a href="product.html">
                    <img src="<?=base_url('front/images/products/product-7.jpg')?>" alt=""></a>
                </div>
                <div class="product-card__info">
                  <div class="product-card__name"><a href="product.html">Brandix Pliers</a></div>
                </div>
                <div class="product-card__actions">
                  <div class="product-card__prices">$24.00</div>
                  <div class="product-card__buttons">
                    <button class="btn btn-primary product-card__addtocart" type="button">
                      <?=lang('look_detailed')?>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="block block-product-columns d-lg-block d-none">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="block-header"><h3 class="block-header__title">Top Rated Products</h3>
              <div class="block-header__divider"></div>
            </div>
            <div class="row">
            <div class="block-product-columns__column col-4">
              <div class="block-product-columns__item">
                <div class="product-card product-card--layout--horizontal">
                  <button class="product-card__quickview" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="<?=base_url('front/images/sprite.svg#quickview-16')?>"></use>
                    </svg>
                    <span class="fake-svg-icon"></span></button>
                  <div class="product-card__badges-list">
                    <div class="product-card__badge product-card__badge--new">New</div>
                  </div>
                  <div class="product-card__image"><a href="product.html"><img
                          src="<?=base_url('front/images/products')?>/product-1.jpg" alt=""></a>
                  </div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Electric Planer Brandix
                        KL370090G 300 Watts</a></div>
                  </div>
                  <div class="product-card__actions">
                    <div class="product-card__prices">$749.00</div>
                  </div>
                </div>
              </div>

            </div>
            <div class="block-product-columns__column col-4">
              <div class="block-product-columns__item">
                <div class="product-card product-card--layout--horizontal">
                  <button class="product-card__quickview" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="<?=base_url('front/images/sprite.svg#quickview-16')?>"></use>
                    </svg>
                    <span class="fake-svg-icon"></span></button>
                  <div class="product-card__badges-list">
                    <div class="product-card__badge product-card__badge--new">New</div>
                  </div>
                  <div class="product-card__image"><a href="product.html"><img
                          src="<?=base_url('front/images/products')?>/product-1.jpg" alt=""></a>
                  </div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Electric Planer Brandix
                        KL370090G 300 Watts</a></div>
                  </div>
                  <div class="product-card__actions">
                    <div class="product-card__prices">$749.00</div>
                  </div>
                </div>
              </div>

            </div>
            <div class="block-product-columns__column col-4">
              <div class="block-product-columns__item">
                <div class="product-card product-card--layout--horizontal">
                  <button class="product-card__quickview" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="<?=base_url('front/images/sprite.svg#quickview-16')?>"></use>
                    </svg>
                    <span class="fake-svg-icon"></span></button>
                  <div class="product-card__badges-list">
                    <div class="product-card__badge product-card__badge--new">New</div>
                  </div>
                  <div class="product-card__image"><a href="product.html"><img
                          src="<?=base_url('front/images/products')?>/product-1.jpg" alt=""></a>
                  </div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Electric Planer Brandix
                        KL370090G 300 Watts</a></div>
                  </div>
                  <div class="product-card__actions">
                    <div class="product-card__prices">$749.00</div>
                  </div>
                </div>
              </div>

            </div>
              <div class="block-product-columns__column col-4">
              <div class="block-product-columns__item">
                <div class="product-card product-card--layout--horizontal">
                  <button class="product-card__quickview" type="button">
                    <svg width="16px" height="16px">
                      <use xlink:href="<?=base_url('front/images/sprite.svg#quickview-16')?>"></use>
                    </svg>
                    <span class="fake-svg-icon"></span></button>
                  <div class="product-card__badges-list">
                    <div class="product-card__badge product-card__badge--new">New</div>
                  </div>
                  <div class="product-card__image"><a href="product.html"><img
                          src="<?=base_url('front/images/products')?>/product-1.jpg" alt=""></a>
                  </div>
                  <div class="product-card__info">
                    <div class="product-card__name"><a href="product.html">Electric Planer Brandix
                        KL370090G 300 Watts</a></div>
                  </div>
                  <div class="product-card__actions">
                    <div class="product-card__prices">$749.00</div>
                  </div>
                </div>
              </div>

            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="site__footer">
    <div class="site-footer">
      <div class="container">
        <div class="site-footer__widgets">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
              <div class="site-footer__widget footer-contacts"><h5 class="footer-contacts__title">Contact
                  Us</h5>
                <div class="footer-contacts__text">Lorem ipsum dolor sit amet, consectetur adipiscing
                  elit. Integer in feugiat lorem. Pellentque ac placerat tellus.
                </div>
                <ul class="footer-contacts__contacts">
                  <li><i class="footer-contacts__icon fas fa-globe-americas"></i> 715 Fake Street, New
                    York 10021 USA
                  </li>
                  <li><i class="footer-contacts__icon far fa-envelope"></i> info@metaexpress.com</li>
                  <li><i class="footer-contacts__icon fas fa-mobile-alt"></i> (800) 060-0730, (800)
                    060-0730
                  </li>
                  <li><i class="footer-contacts__icon far fa-clock"></i> Mon-Sat 10:00pm - 7:00pm</li>
                </ul>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
              <div class="site-footer__widget footer-links">
                <h5 class="footer-links__title">Information</h5>
                <ul class="footer-links__list">
                  <li class="footer-links__item"><a href="#" class="footer-links__link">About Us</a>
                  </li>
                  <li class="footer-links__item"><a href="#" class="footer-links__link">Delivery
                      Information</a></li>
                  <li class="footer-links__item"><a href="#" class="footer-links__link">Privacy
                      Policy</a></li>
                  <li class="footer-links__item"><a href="#" class="footer-links__link">Brands</a>
                  </li>
                  <li class="footer-links__item"><a href="#" class="footer-links__link">Contact Us</a>
                  </li>
                  <li class="footer-links__item"><a href="#" class="footer-links__link">Returns</a>
                  </li>
                  <li class="footer-links__item"><a href="#" class="footer-links__link">Site Map</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
              <div class="site-footer__widget footer-newsletter"><h5 class="footer-newsletter__title">
                  Newsletter</h5>
                <div class="footer-newsletter__text">Praesent pellentesque volutpat ex, vitae auctor
                  lorem pulvinar mollis felis at lacinia.
                </div>
                <form action="#" class="footer-newsletter__form">
                  <label class="sr-only" for="footer-newsletter-address">Email Address</label>
                  <input type="text" class="footer-newsletter__form-input form-control" id="footer-newsletter-address"
                         placeholder="Email Address...">
                  <button class="footer-newsletter__form-button btn btn-primary">Subscribe</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>
<script src="<?=base_url('front/vendor/jquery-3.3.1/jquery.min.js')?>"></script>
<script src="<?=base_url('front/vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?=base_url('front/vendor/owl-carousel-2.3.4/owl.carousel.min.js')?>"></script>
<script src="<?=base_url('front/vendor/nouislider-12.1.0/nouislider.min.js')?>"></script>
<script src="front/vendor/photoswipe/photoswipe.min.js"></script>
<script src="front/vendor/photoswipe/photoswipe-ui-default.min.js"></script>
<script src="front/vendor/select2/js/select2.min.js"></script>
<script src="<?=base_url('front/js/number.js')?>"></script>
<script src="<?=base_url('front/js/main.js')?>"></script>
<script src="front/js/header.js"></script>
<script src="<?=base_url('front/vendor/svg4everybody-2.1.9/svg4everybody.min.js')?>"></script>
<script>svg4everybody();</script>

</body>
</html>
