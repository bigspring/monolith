<?php
/**
 * The hero unit template, used mostly on the homepage
 *
 * @package monolith
 */
?>

<header class="hero-unit">
  <div class="row">
    <div class="small-12 medium-8 large-6 columns">
      <?php get_template_part( 'layouts/molecules/page-header-title' ); // load the page header titles ?>
      <p class="hero-unit-subtitle"><?= get_the_excerpt(); ?></p>
    </div>
  </div>
</header>