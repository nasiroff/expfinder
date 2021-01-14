<?=$this->extend('/front/layout/app')?>


<?=$this->section('content')?>
<div class="site__body">
  <div class="page-header">
    <div class="page-header__container container">
      <div class="page-header__breadcrumb">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>"><?=lang('app.home')?></a>
              <svg class="breadcrumb-arrow" width="6px" height="9px">
                <use xlink:href="<?=base_url('front/images/sprite.svg#arrow-rounded-right-6x9')?>"></use>
              </svg>
            </li>


            <?php
            $categoryLink = "";
            foreach($categoriesLVL1 as $categoryLVL1){
              if($categoryLVL1->id == $product->parent_category_id){
                foreach($categoriesLVL0 as $categoryLVL0){
                  if($categoryLVL0->id == $categoryLVL1->parent_category_id){
                    echo '<li class="breadcrumb-item"><a href="' . base_url('kateqoriyalar/'.$categoryLVL0->slug_url) . '">' . $categoryLVL0->name . '</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                          <use xlink:href="' . base_url("front/images/sprite.svg#arrow-rounded-right-6x9") . '"></use>
                        </svg>
                      </li>';
                    echo '<li class="breadcrumb-item"><a href="' . base_url('kateqoriyalar/'.$categoryLVL1->slug_url) . '">' . $categoryLVL1->name . '</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                          <use xlink:href="' . base_url("front/images/sprite.svg#arrow-rounded-right-6x9") . '"></use>
                        </svg>
                      </li>';
                  }
                }
              }
            }

            foreach($categoriesLVL2 as $categoryLVL2){
              if($categoryLVL2->id == $product->category_id){
                echo '<li class="breadcrumb-item"><a href="' . base_url('kateqoriyalar/'.$categoryLVL2->slug_url) . '">' . $product->category_name . '</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                          <use xlink:href="' . base_url("front/images/sprite.svg#arrow-rounded-right-6x9") . '"></use>
                        </svg>
                      </li>';
              }
            }

            ?>
            <li class="breadcrumb-item active" aria-current="page"><?=$product->title?></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <div class="block">
    <div class="container">
      <div class="product product--layout--standard" data-layout="standard">
        <div class="product__content">
          <div class="product__gallery">
            <div class="product-gallery">
              <div class="product-gallery__featured">
                <button class="product-gallery__zoom">
                  <svg width="24px" height="24px">
                    <use xlink:href="<?= base_url('front/images/sprite.svg#zoom-in-24') ?>"></use>
                  </svg>
                </button>
                <div class="owl-carousel" id="product-image">
                  <div class="product-image product-image--location--gallery">
                    <a href="<?=base_url($product->img)?>" data-width="700" data-height="700"
                       class="product-image__body" target="_blank">
                      <img class="product-image__img" src="<?=base_url($product->img)?>" alt="<?= $product->title ?>"></a>
                  </div>
                </div>
              </div>
              <div class="product-gallery__carousel">
                <div class="owl-carousel" id="product-carousel">
                  <a href="<?=base_url($product->img)?>" class="product-image product-gallery__carousel-item">
                    <div class="product-image__body">
                      <img class="product-image__img product-gallery__carousel-image" src="<?=base_url($product->img)?>"
                           alt="<?= $product->title ?>">
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="product__info">
            <div class="product__wishlist-compare">
              <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip"
                      data-placement="right" title="Wishlist">
                <svg width="16px" height="16px">
                  <use xlink:href="<?=base_url('front/images/sprite.svg#wishlist-16')?>"></use>
                </svg>
              </button>
              <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip"
                      data-placement="right" title="Compare">
                <svg width="16px" height="16px">
                  <use xlink:href="<?=base_url('front/images/sprite.svg#compare-16')?>"></use>
                </svg>
              </button>
            </div>
            <h1 class="product__name"><?=$product->title?></h1>
            <div class="product__description"><?=$product->description?>
            </div>
            <ul class="product__meta">
              <li class="product__meta-availability">Anbarda: <span class="text-success">var</span></li>
              <li>Brand: <a href="#"><?=$product->brand_name?></a></li>
              <li>SKU: 83690/32</li>
            </ul>
          </div>
          <div class="product__sidebar">
            <div class="product__actions">
              <div class="product__actions-item product__actions-item--wishlist">
                <button type="button" class="btn btn-secondary btn-svg-icon btn-lg" data-toggle="tooltip" title="Seçilmiş et">
                  <svg width="16px" height="16px">
                    <use xlink:href="<?=base_url('front/images/sprite.svg#wishlist-16');?>"></use>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="product-tabs product-tabs--sticky" style="display: none">
        <div class="product-tabs__list">
          <div class="product-tabs__list-body">
            <div class="product-tabs__list-container container">
              <a class="product-tabs__item product-tabs__item--active">Description</a>
            </div>
          </div>
        </div>
        <div class="product-tabs__content">
          <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
            <div class="typography"><h3>Product Full Description</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum, diam non iaculis
                finibus, ipsum arcu sollicitudin dolor, ut cursus sapien sem sed purus. Donec vitae fringilla tortor,
                sed fermentum nunc. Suspendisse sodales turpis dolor, at rutrum dolor tristique id. Quisque
                pellentesque ullamcorper felis, eget gravida mi elementum a. Maecenas consectetur volutpat ante, sit
                amet molestie urna luctus in. Nulla eget dolor semper urna malesuada dictum. Duis eleifend
                pellentesque dui et finibus. Pellentesque dapibus dignissim augue. Etiam odio est, sodales ac aliquam
                id, iaculis eget lacus. Aenean porta, ante vitae suscipit pulvinar, purus dui interdum tellus, sed
                dapibus mi mauris vitae tellus.</p>
              <h3>Etiam lacus lacus mollis in mattis</h3>
              <p>Praesent mattis eget augue ac elementum. Maecenas vel ante ut enim mollis accumsan. Vestibulum vel
                eros at mi suscipit feugiat. Sed tortor purus, vulputate et eros a, rhoncus laoreet orci. Proin sapien
                neque, commodo at porta in, vehicula eu elit. Vestibulum ante ipsum primis in faucibus orci luctus et
                ultrices posuere cubilia Curae; Curabitur porta vulputate augue, at sollicitudin nisl molestie
                eget.</p>
              <p>Nunc sollicitudin, nunc id accumsan semper, libero nunc aliquet nulla, nec pretium ipsum risus ac
                neque. Morbi eu facilisis purus. Quisque mi tortor, cursus in nulla ut, laoreet commodo quam.
                Pellentesque et ornare sapien. In ac est tempus urna tincidunt finibus. Integer erat ipsum, tristique
                ac lobortis sit amet, dapibus sit amet purus. Nam sed lorem nisi. Vestibulum ultrices tincidunt
                turpis, sit amet fringilla odio scelerisque non.</p></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2">
    <div class="container">
      <div class="block-header"><h3 class="block-header__title" style="text-transform: capitalize"><?=lang('app.related-product')?></h3>
        <div class="block-header__divider"></div>
        <div class="block-header__arrows-list">
          <button class="block-header__arrow block-header__arrow--left" type="button">
            <svg width="7px" height="11px">
              <use xlink:href="<?=base_url('front/images/sprite.svg#arrow-rounded-left-7x11')?>"></use>
            </svg>
          </button>
          <button class="block-header__arrow block-header__arrow--right" type="button">
            <svg width="7px" height="11px">
              <use xlink:href="<?=base_url('front/images/sprite.svg#arrow-rounded-right-7x11')?>"></use>
            </svg>
          </button>
        </div>
      </div>
      <div class="block-products-carousel__slider">
        <div class="block-products-carousel__preloader"></div>
        <div class="owl-carousel">
          <?php foreach($relatedProducts as $relatedProduct): ?>
            <div class="block-products-carousel__column">
              <div class="block-products-carousel__cell">
                <div class="product-card product-card--hidden-actions">
                  <div class="product-card__image product-image"><a
                        href="<?=base_url('mehsul/' . $relatedProduct->id)?>" class="product-image__body"><img
                          class="product-image__img" src="<?=base_url($relatedProduct->img)?>" alt="<?= $relatedProduct->title ?>"></a></div>
                  <div class="product-card__info">
                    <div class="product-card__name">
                      <a href="<?=base_url('mehsul/' . $relatedProduct->id)?>"><?=$relatedProduct->title?></a>
                    </div>
                  </div>
                  <div class="product-card__actions">
                    <div class="product-card__prices"><?=$relatedProduct->price?> ₼</div>
                    <div class="product-card__buttons">
                      <a href="<?=base_url('mehsul/' . $relatedProduct->id)?>"
                         class="btn btn-primary product-card__addtocart"
                         type="button"><?=lang('app.look_detailed')?></a>
                      <a class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                         type="button"><?=lang('app.look_detailed')?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?=$this->endSection()?>


