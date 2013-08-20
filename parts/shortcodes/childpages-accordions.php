<?php $count = 0; // reset the count ?>
<div class="panel-group childpages childpages-collapse" id="accordion">
  <?php while ( $childpages->have_posts() ) : $childpages->the_post(); ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?= get_the_id() ?>">
          <? the_title() ?>
        </a>
      </h4>
    </div>
    <div id="collapse-<?= get_the_id() ?>" class="panel-collapse collapse <?= $count == 0 ? 'in' : '' ?>">
      <div class="panel-body">
        <? the_content() ?>
      </div>
    </div>
  </div>
  <?php $count++ ?>
  <?php endwhile; ?>
</div>
