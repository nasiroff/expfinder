<ul class="suggestions__list">
  <?php if(count($products))
          foreach($products as $product):?>
  <li class="suggestions__item">
    <div class="suggestions__item-image product-image">
      <div class="product-image__body"><img class="product-image__img" src="<?=base_url($product->img)?>" alt="<?=$product->title?>">
      </div>
    </div>
    <div class="suggestions__item-info"><a href="<?=base_url('mehsul/'.$product->id)?>" class="suggestions__item-name"><?=$product->title?></a>
    </div>
    <div class="suggestions__item-price"><?=$product->price?></div>
  </li>
    <?php endforeach; ?>
</ul>