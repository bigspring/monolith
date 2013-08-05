<?php $count = 0; // reset the count ?>

<div class="accordion childpages" id="childpages-accordion">
  <?php while ( $childpages->have_posts() ) : $childpages->the_post(); ?>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#childpages-accordion" href="#collapse-<?= get_the_id() ?>">
        <? the_title() ?>
      </a>
    </div>
    <div id="collapse-<?= get_the_id() ?>" class="accordion-body collapse <?= $count == 0 ? 'in' : '' ?>">
      <div class="accordion-inner">
        <? the_content() ?>
      </div>
    </div>
  </div>
  <?php $count++ ?>
  <?php endwhile; ?>
</div>