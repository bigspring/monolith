<?php
/**
 * The accordion molecule that gets called in by the builder and shortcodes 
 *
 * @package monolith
 */
?>

<!-- start accordion -->
  <dd class="accordion-navigation <?= $count == 0 ? 'active' : '' ?>">
    <a href="#panel-<?= get_the_id() ?>"><?php the_title(); ?></a>
    <div class="content  <?= $count == 0 ? 'active' : '' ?>" id="panel-<?= get_the_id() ?>">
      <?php the_content(); ?>
    </div>
  </dd>
<!-- end accordion -->