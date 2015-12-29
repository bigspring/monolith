<?php
/**
 * The accordion molecule that gets called in by the builder and shortcodes
 *
 * @package monolith
 */
?>

<!-- start accordion -->
<dd class="accordion-navigation">
  <a href="#panel-<?= get_the_id() ?>"><?php the_title(); ?></a>

  <div class="content" id="panel-<?= get_the_id() ?>">
    <?php the_content(); ?>
  </div>
</dd>
<!-- end accordion -->