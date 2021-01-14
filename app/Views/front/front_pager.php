<?php $pager->setSurroundCount(2) ?>


<nav aria-label="Page navigation">
  <ul class="pagination">
    <?php if ($pager->hasPrevious()) : ?>
      <li class="page-item">
        <a class="page-link page-link--with-arrow" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
          <svg class="page-link__arrow page-link__arrow--left" aria-hidden="true" width="8px" height="13px">
            <use xlink:href="front/images/sprite.svg#arrow-rounded-left-8x13"></use>
          </svg>
        </a>
      </li>
    <?php endif ?>

    <?php foreach ($pager->links() as $link) : ?>
      <li class="page-item <?= $link['active'] ? 'active' : '' ?>"><a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a></li>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
      <li class="page-item">
        <a class="page-link page-link--with-arrow" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
          <svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px">
            <use xlink:href="front/images/sprite.svg#arrow-rounded-right-8x13"></use>
          </svg>
        </a>
      </li>
    <?php endif ?>
  </ul>
</nav>