
<?= $this->extend('/front/layout/app') ?>


<?= $this->section('content') ?>
  <div class="site__body">
    <div class="block-slideshow block-slideshow--layout--with-departments block">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 d-none d-lg-block"></div>
          <div class="col-12 col-lg-9">
            <div class="block-slideshow__body">
              <div class="owl-carousel"><a class="block-slideshow__slide" href="#">
                  <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                       style="background-image: url('front/images/slides/slide-1.jpg')"></div>
                  <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                       style="background-image: url('front/images/slides/slide-1-mobile.jpg')"></div>
                  <div class="block-slideshow__slide-content">
                    <div class="block-slideshow__slide-title">Big choice of<br>Plumbing products</div>
                    <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing
                      elit.<br>Etiam pharetra laoreet dui quis molestie.
                    </div>
                    <div class="block-slideshow__slide-button"><span class="btn btn-primary btn-lg">Shop Now</span>
                    </div>
                  </div>
                </a><a class="block-slideshow__slide" href="#">
                  <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                       style="background-image: url('front/images/slides/slide-2.jpg')"></div>
                  <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                       style="background-image: url('front/images/slides/slide-2-mobile.jpg')"></div>
                  <div class="block-slideshow__slide-content">
                    <div class="block-slideshow__slide-title">Screwdrivers<br>Professional Tools</div>
                    <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing
                      elit.<br>Etiam pharetra laoreet dui quis molestie.
                    </div>
                    <div class="block-slideshow__slide-button"><span class="btn btn-primary btn-lg">Shop Now</span>
                    </div>
                  </div>
                </a><a class="block-slideshow__slide" href="#">
                  <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                       style="background-image: url('front/images/slides/slide-3.jpg')"></div>
                  <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                       style="background-image: url('front/images/slides/slide-3-mobile.jpg')"></div>
                  <div class="block-slideshow__slide-content">
                    <div class="block-slideshow__slide-title">One more<br>Unique header</div>
                    <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing
                      elit.<br>Etiam pharetra laoreet dui quis molestie.
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
<!--    <div class="block block-features block-features--layout--classic">
      <div class="container">
        <div class="block-features__list">
          <div class="block-features__item">
            <div class="block-features__icon">
              <svg width="48px" height="48px">
                <use xlink:href="front/images/sprite.svg#fi-24-hours-48"></use>
              </svg>
            </div>
            <div class="block-features__content">
              <div class="block-features__title">24/7 dəstək</div>
              <div class="block-features__subtitle">Hər vaxt zəng edin</div>
            </div>
          </div>
          <div class="block-features__divider"></div>
          <div class="block-features__item">
            <div class="block-features__icon">
              <svg width="48px" height="48px">
                <use xlink:href="front/images/sprite.svg#fi-payment-security-48"></use>
              </svg>
            </div>
            <div class="block-features__content">
              <div class="block-features__title">100% təhlükəsiz</div>
              <div class="block-features__subtitle">Təhlükəsiz ödəniş</div>
            </div>
          </div>
        </div>
      </div>
    </div>-->
    <div class="block block-products block-products--layout--large-first" data-mobile-grid-columns="2">
      <div class="container">
        <div class="block-header"><h3 class="block-header__title"><?=lang('app.products')?></h3>
          <div class="block-header__divider"></div>
        </div>
        <div class="block-products__body">
          <div class="block-products__list">
            <?php foreach($products as  $product):?>
            <div class="block-products__list-item">
              <div class="product-card product-card--hidden-actions">
                <div class="product-card__image product-image">
                  <a href="<?=base_url('mehsul/'.$product->id)?>" class="product-image__body">
                    <img class="product-image__img" src="<?=$product->img?>" alt="">
                  </a>
                </div>
                <div class="product-card__info">
                  <div class="product-card__name"><a href="<?=base_url('mehsul/'.$product->id)?>"><?=$product->title?></a>
                  </div>
                </div>
                <div class="product-card__actions">
                  <div class="product-card__prices"><?=$product->price?> ₼</div>
                  <div class="product-card__buttons">
                    <button class="btn btn-primary product-card__addtocart" type="button" onclick="addToCart(<?=$product->id?>)">Səbətə əlavə et</button>
                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Səbətə əlavə et</button>
                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" onclick="addToWishlist(<?=$product->id?>)" type="button">
                      <svg width="16px" height="16px">
                        <use xlink:href="<?=base_url('front/images/sprite.svg#wishlist-16')?>"></use>
                      </svg>
                      <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach;?>
          </div>
        </div>
        <div class="products-view__pagination">
          <ul class="pagination justify-content-center">
            <?php if ($pager) :?>
            <?php $pagi_path='/'; ?>
              <?= $pager->links('default', 'front_pager') ?>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="block block-product-columns d-lg-block d-none">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="block-header"><h3 class="block-header__title"><?=lang('app.top_saled_product')?></h3>
              <div class="block-header__divider"></div>
            </div>
            <div class="block-product-columns__column">
              <div class="row">
                <div class="block-product-columns__item col-4">
                  <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                    <div class="product-card__badges-list">
                      <div class="product-card__badge product-card__badge--new">New</div>
                    </div>
                    <div class="product-card__image product-image"><a href="product.html"
                                                                      class="product-image__body"><img
                            class="product-image__img"
                            src="front/images/products/product-1.jpg"
                            alt=""></a></div>
                    <div class="product-card__info">
                      <div class="product-card__name"><a href="product.html">Electric Planer Brandix KL370090G 300
                          Watts</a></div>
                    </div>
                    <div class="product-card__actions">
                      <div class="product-card__availability">Availability: <span class="text-success">In Stock</span>
                      </div>
                      <div class="product-card__prices">$749.00</div>
                      <div class="product-card__buttons">
                        <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                type="button">Add To Cart
                        </button>
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
  </div>
<?= $this->endSection() ?>
