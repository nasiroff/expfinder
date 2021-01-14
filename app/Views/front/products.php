<?=$this->extend('/front/layout/app')?>

<?=$this->section('content')?>
<?php
$request = service('request');
$uri = service('uri');
?>
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
              $path = $uri->getPath();
              $segments = $uri->getSegments();
              if(isset($segments[2])):
                foreach($categoriesLVL0 as $categoryLVL0):
                  if(in_array($categoryLVL0->slug, $segments) !== false):
                    ?>
                    <li class="breadcrumb-item"><a
                          href="<?=base_url('kateqoriyalar/' . $categoryLVL0->slug_url . (!empty($uri->getQuery()) ? '?' . $uri->getQuery() : ''))?>"><?=$categoryLVL0->name?></a>
                      <svg class="breadcrumb-arrow" width="6px" height="9px">
                        <use xlink:href="<?=base_url('front/images/sprite.svg#arrow-rounded-right-6x9')?>"></use>
                      </svg>
                    </li>
                  <?php
                  endif;
                endforeach;
              endif;
              if(isset($segments[3])):
                foreach($categoriesLVL1 as $categoryLVL1):
                  if(strpos($path,$categoryLVL1->slug) !== false):
                    ?>
                    <li class="breadcrumb-item"><a
                          href="<?=base_url('kateqoriyalar/' . $categoryLVL1->slug_url . (!empty($uri->getQuery()) ? '?' . $uri->getQuery() : ''))?>"><?=$categoryLVL1->name?></a>
                      <svg class="breadcrumb-arrow" width="6px" height="9px">
                        <use xlink:href="<?=base_url('front/images/sprite.svg#arrow-rounded-right-6x9')?>"></use>
                      </svg>
                    </li>
                  <?php
                  endif;
                endforeach;
              endif;
              if($currentCategory != null):
              ?>
              <li class="breadcrumb-item active" aria-current="page"><?=$currentCategory->name?></li>
              <?php endif;?>
            </ol>
          </nav>
        </div>
        <?php
        if($currentCategory != null):
        ?>
        <div class="page-header__title"><h1><?=$currentCategory->name?></h1></div>
        <?php endif; ?>
      </div>
    </div>
    <div class="container">
      <div class="shop-layout shop-layout--sidebar--start">
        <div class="shop-layout__sidebar">
          <div class="block block-sidebar block-sidebar--offcanvas--mobile">
            <div class="block-sidebar__backdrop"></div>
            <div class="block-sidebar__body">
              <div class="block-sidebar__header">
                <div class="block-sidebar__title">Filterlər</div>
                <button class="block-sidebar__close" type="button">
                  <svg width="20px" height="20px">
                    <use xlink:href="<?=base_url('front/images/sprite.svg#cross-20')?>"></use>
                  </svg>
                </button>
              </div>
              <div class="block-sidebar__item">
                <form method="get" id="form_filter" action="<?=current_url()?>">
                  <input type="text" name="sort-price" hidden <?=!is_null($request->getGet('sort-price')) ? 'value="'.$request->getGet('sort-price').'"' : 'disabled'?>>
                  <input type="text" name="limit" hidden <?=!is_null($request->getGet('limit')) ? 'value="'.$request->getGet('limit').'"' : 'disabled'?>>
                  <div class="widget-filters widget widget-filters--offcanvas--mobile" data-collapse
                       data-collapse-opened-class="filter--opened"><h4
                        class="widget-filters__title widget__title">Filterlər</h4>
                    <div class="widget-filters__list">
                      <div class="widget-filters__item">
                        <div class="filter filter--opened" data-collapse-item>
                          <button type="button" class="filter__title" data-collapse-trigger><?=lang('app.main_categories')?>
                            <svg class="filter__arrow" width="12px" height="7px">
                              <use xlink:href="<?=base_url('front/images/sprite.svg#arrow-rounded-down-12x7')?>"></use>
                            </svg>
                          </button>
                          <div class="filter__body" data-collapse-content>
                            <div class="filter__container">
                              <div class="filter-categories">
                                <ul class="filter-categories__list">
                                  <?php
                                  $explodedPaths = $segments;
                                  foreach($categoriesLVL0 as $categoryLVL0): ?>
                                    <li class="filter-categories__item <?=isset($explodedPaths[1]) && $explodedPaths[1] == $categoryLVL0->slug_url ? 'filter-categories__item--current' : 'filter-categories__item--child'?>">
                                      <a href="<?=base_url("kateqoriyalar/" . $categoryLVL0->slug_url . (!empty($uri->getQuery()) ? '?' . $uri->getQuery() : ''))?>"><?=$categoryLVL0->name?></a>
                                      <div class="filter-categories__counter">
                                        <?php
                                        $c = 0; //count
                                        foreach($categoriesLVL1 as $categoryLVL1){
                                          if($categoryLVL0->id == $categoryLVL1->parent_category_id){
                                            foreach($groupedCategoryCounts as $groupedCategoryCount){
                                              if($categoryLVL1->id == $groupedCategoryCount->parent_category_id){
                                                $c = $c + intval($groupedCategoryCount->count_cat);
                                              }
                                            }
                                          }
                                        }
                                        echo $c;
                                        ?>
                                      </div>
                                    </li>
                                  <?php endforeach; ?>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php if(isset($segments[1])):?>
                      <div class="widget-filters__item">
                        <div class="filter filter--opened" data-collapse-item>
                          <button type="button" class="filter__title" data-collapse-trigger><?=lang('app.sub_categories')?>
                            <svg class="filter__arrow" width="12px" height="7px">
                              <use xlink:href="<?=base_url('front/images/sprite.svg#arrow-rounded-down-12x7')?>"></use>
                            </svg>
                          </button>
                          <div class="filter__body" data-collapse-content>
                            <div class="filter__container">
                              <div class="filter-categories-alt">
                                <?php
                                $cat = isset($explodedPaths[1]) ? (new \App\Models\CategoryModel())->where('slug_url',$explodedPaths[1])->first() : null;
                                foreach($categoriesLVL1 as $categoryLVL1):
                                  if($cat != null && $categoryLVL1->parent_category_id == $cat->id):

                                    ?>
                                    <ul class="filter-categories-alt__list filter-categories-alt__list--level--1"
                                        data-collapse-opened-class="filter-categories-alt__item--open">
                                      <li class="filter-categories-alt__item <?=strpos($uri->getPath(),$categoryLVL1->slug) !== false ? 'filter-categories-alt__item--open filter-categories-alt__item--current' : ''?>"
                                          data-collapse-item>
                                        <button type="button" class="filter-categories-alt__expander"
                                                data-collapse-trigger></button>
                                        <a href="<?=base_url('kateqoriyalar/' . $categoryLVL1->slug_url . (!empty($uri->getQuery()) ? '?' . $uri->getQuery() : ''))?>"><?=$categoryLVL1->name?></a>
                                        <div class="filter-categories-alt__children" data-collapse-content>
                                          <ul class="filter-categories-alt__list filter-categories-alt__list--level--2">
                                            <?php foreach($categoriesLVL2 as $categoryLVL2):
                                              if($categoryLVL2->parent_category_id == $categoryLVL1->id):
                                                ?>
                                                <li class="filter-categories-alt__item <?='kateqoriyalar/' . $categoryLVL2->slug_url == $uri->getPath() ? 'filter-categories-alt__item--current' : ''?> "
                                                    data-collapse-item>
                                                  <a href=" <?=base_url('kateqoriyalar/' . $categoryLVL2->slug_url . (!empty($uri->getQuery()) ? '?' . $uri->getQuery() : ''))?>"><?=$categoryLVL2->name?></a>
                                                </li>
                                              <?php
                                              endif;
                                            endforeach; ?>
                                          </ul>
                                        </div>
                                      </li>
                                    </ul>
                                  <?php
                                  endif;
                                endforeach; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php endif; ?>
                      <div class="widget-filters__item">
                        <div class="filter filter--opened" data-collapse-item>
                          <button type="button" class="filter__title" data-collapse-trigger>Qiymət aralığı
                            <svg class="filter__arrow" width="12px" height="7px">
                              <use xlink:href="<?=base_url('front/images/sprite.svg#arrow-rounded-down-12x7')?>"></use>
                            </svg>
                          </button>
                          <div class="filter__body" data-collapse-content>
                            <div class="filter__container">

                              <div class="filter-price" data-min="<?=floor($minAndMaxPrice['min_price'])?>"
                                   data-max="<?=ceil($minAndMaxPrice['max_price'])?>" <?=!is_null($request->getGet('min-price')) && !empty($request->getGet('min-price')) ? 'data-from="' . ($request->getGet('min-price')) . '"' : 'data-from="' . ($minAndMaxPrice['min_price']) . '"'?>
                                <?=!is_null($request->getGet('max-price')) && !empty($request->getGet('max-price')) ? 'data-to="' . ($request->getGet('max-price')) . '"' : 'data-to="' . ($minAndMaxPrice['max_price']) . '"'?>>
                                <div class="filter-price__slider"></div>
                                <div class="filter-price__title">Price: $<span class="filter-price__min-value"></span> –
                                  $<span
                                      class="filter-price__max-value"></span></div>
                              </div>
                            </div>
                            <input type="text" name="min-price" hidden>
                            <input type="text" name="max-price" hidden>
                          </div>
                        </div>
                      </div>
                      <?php
                      $brandsIds = $request->getGet('brands');
                      ?>
                      <div class="widget-filters__item">
                        <div
                            class="filter <?=!is_null($request->getGet('brands')) && count($request->getGet('brands')) ? 'filter--opened' : ''?>"
                            data-collapse-item>
                          <button type="button" class="filter__title" data-collapse-trigger><?=lang('app.brands')?>
                            <svg class="filter__arrow" width="12px" height="7px">
                              <use xlink:href="<?=base_url('front/images/sprite.svg#arrow-rounded-down-12x7')?>"></use>
                            </svg>
                          </button>
                          <div class="filter__body" data-collapse-content>
                            <div class="filter__container">
                              <div class="filter-list">
                                <div class="filter-list__list">
                                  <?php
                                  foreach($brands as $brand): ?>
                                    <label class="filter-list__item">
                                      <span class="filter-list__input input-check">
                                        <span class="input-check__body">
                                          <input class="input-check__input" type="checkbox"
                                                 name="brands[]" <?=!is_null($brandsIds) && in_array($brand->id,$brandsIds) ? 'checked' : ''?> value="<?=$brand->id?>">
                                          <span class="input-check__box"></span>
                                          <svg class="input-check__icon" width="9px" height="7px">
                                            <use xlink:href="<?=base_url('front/images/sprite.svg#check-9x7')?>"></use>
                                          </svg>
                                        </span>
                                      </span>
                                      <span class="filter-list__title"><?=$brand->name?> </span>
                                    </label>
                                  <?php endforeach; ?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="widget-filters__actions d-flex">
                      <button class="btn btn-primary btn-sm" type="submit">Filter</button>
                      <button class="btn btn-secondary btn-sm" type="reset">Reset</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="block-sidebar__item d-none d-lg-block">
                <div class="widget-products widget"><h4 class="widget__title"><?=lang('app.latest_product')?></h4>
                  <div class="widget-products__list">
                    <?php foreach($latestProducts as $latestProduct): ?>
                      <div class="widget-products__item">
                        <div class="widget-products__image">
                          <div class="product-image">
                            <a href="product.html" class="product-image__body">
                              <img class="product-image__img" src="<?=base_url($latestProduct->img)?>"
                                   alt="<?=$latestProduct->title?>">
                            </a>
                          </div>
                        </div>
                        <div class="widget-products__info">
                          <div class="widget-products__name"><a
                                href="<?=base_url('mehsul/' . $latestProduct->id)?>"><?=$latestProduct->title?></a>
                          </div>
                          <div class="widget-products__prices"><?=$latestProduct->price?> ₼</div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="shop-layout__content">
          <div class="block">
            <div class="products-view">
              <div class="products-view__options">
                <div class="view-options view-options--offcanvas--mobile">
                  <div class="view-options__filters-button">
                    <button type="button" class="filters-button">
                      <svg class="filters-button__icon" width="16px" height="16px">
                        <use xlink:href="<?=base_url('front/images/sprite.svg#filters-16')?>"></use>
                      </svg>
                      <span class="filters-button__title">Filters</span> <span class="filters-button__counter">3</span>
                    </button>
                  </div>
                  <div class="view-options__divider"></div>
                  <div class="view-options__control"><label for="sort_price">Sırala</label>
                    <div><select class="form-control form-control-sm" name="sort_price" id="sort_price">
                        <option value="ASC" <?=$request->getGet('sort-price') == 'ASC' ? 'selected' : ''?>>Ucuzdan bahaya</option>
                        <option value="DESC" <?=$request->getGet('sort-price') == 'DESC' ? 'selected' : ''?>>Bahadan ucuza</option>
                      </select></div>
                  </div>
                  <div class="view-options__control"><label for="limit">Göstər</label>
                    <div><select class="form-control form-control-sm" name="limit" id="limit">
                        <option value="30" <?=$request->getGet('limit') == '30' ? 'selected' : ''?>>30</option>
                        <option value="60" <?=$request->getGet('limit') == '60' ? 'selected' : ''?>>60</option>
                      </select></div>
                  </div>
                </div>
              </div>
              <div class="products-view__list products-list" data-layout="grid-3-sidebar" data-with-features="false"
                   data-mobile-grid-columns="2">
                <div class="products-list__body">

                  <?php
                  foreach($products as $product):
                    ?>
                    <div class="products-list__item">
                      <div class="product-card product-card--hidden-actions">
                        <div class="product-card__image product-image">
                          <a href="<?=base_url('mehsul/' . $product->id)?>" class="product-image__body">
                            <img class="product-image__img" src="<?=base_url($product->img)?>"
                                 alt="<?=$product->title?>">
                          </a>
                        </div>
                        <div class="product-card__info">
                          <div class="product-card__name"><a
                                href="<?=base_url('mehsul/' . $product->id)?>"><?=$product->title?></a></div>
                        </div>
                        <div class="product-card__actions">
                          <div class="product-card__prices"><?=$product->price?> ₼</div>
                          <div class="product-card__buttons">
                            <a class="btn btn-primary product-card__addtocart"
                               href="<?=base_url('mehsul/' . $product->id)?>"><?=lang('app.look_detailed')?></a>
                            <a class="btn btn-secondary product-card__addtocart product-card__addtocart--list"><?=lang('app.look_detailed')?>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="products-view__pagination">
                <ul class="pagination justify-content-center">
                  <?php if($pager) : ?>
                    <?=$pager->links('default','front_pager')?>
                  <?php endif ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?=$this->endSection()?>

<?=$this->section('script_code')?>
<script>

  $('#sort_price').on('change', function(){
    let URLSearchParam = new URLSearchParams(window.location.search);
    URLSearchParam.set('sort-price', $(this).val());
    window.location = window.location.origin+window.location.pathname+'?'+URLSearchParam.toString();
  });
  $('#limit').on('change', function(){
    let URLSearchParam = new URLSearchParams(window.location.search);
    URLSearchParam.set('limit', $(this).val());
    window.location = window.location.origin+window.location.pathname+'?'+URLSearchParam.toString();
  })
</script>
<?=$this->endSection()?>
