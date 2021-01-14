<div class="site-header__nav-panel">
  <div class="nav-panel nav-panel--sticky" data-sticky-mode="pullToShow">
    <div class="nav-panel__container container">
      <div class="nav-panel__row">
        <div class="nav-panel__departments">
          <div class="departments departments--open departments--fixed"
               data-departments-fixed-by=".block-slideshow">
            <div class="departments__body">
              <div class="departments__links-wrapper">
                <div class="departments__submenus-container"></div>
                <ul class="departments__links">
                  <?php foreach($categoriesLVL0 as $categoryLVL0): ?>
                    <li class="departments__item">
                      <a class="departments__item-link" href="#"><?=$categoryLVL0->name?>
                        <svg class="departments__item-arrow" width="6px" height="9px">
                          <use xlink:href="<?= base_url("front/images/sprite.svg#arrow-rounded-right-6x9") ?>"></use>
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
                                        <a href="#"><?=$categoriesLVL1[$i]->name?></a>
                                        <ul class="megamenu__links megamenu__links--level--1">
                                          <?php foreach($categoriesLVL2 as $categoryLVL2){
                                            if($categoryLVL2->parent_category_id == $categoriesLVL1[$i]->id){
                                              ?>
                                              <li class="megamenu__item"><a href="#"><?=$categoryLVL2->name?></a>
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
                                                <li class="megamenu__item"><a
                                                    href="#"><?=$categoryLVL2->name?></a></li>
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
            <button class="departments__button">
              <svg class="departments__button-icon" width="18px" height="14px">
                <use xlink:href="<?= base_url("front/images/sprite.svg#menu-18x14") ?>"></use>
              </svg>
              Shop By Category
              <svg class="departments__button-arrow" width="9px" height="6px">
                <use xlink:href="<?= base_url("front/images/sprite.svg#arrow-rounded-down-9x6") ?>"></use>
              </svg>
            </button>
          </div>
        </div>
        <div class="nav-panel__nav-links nav-links">
          <ul class="nav-links__list">
            <li class="nav-links__item"><a class="nav-links__item-link"
                                           href="https://themeforest.net/item/stroyka-tools-store-html-template/23326943">
                <div class="nav-links__item-body"><?=lang('app.home')?></div>
              </a>
            </li>
            <li class="nav-links__item"><a class="nav-links__item-link"
                                           href="https://themeforest.net/item/stroyka-tools-store-html-template/23326943">
                <div class="nav-links__item-body"><?=lang('app.about_us')?></div>
              </a>
            </li>
            <li class="nav-links__item"><a class="nav-links__item-link"
                                           href="https://themeforest.net/item/stroyka-tools-store-html-template/23326943">
                <div class="nav-links__item-body"><?=lang('app.contact_us')?></div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
