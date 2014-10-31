<?php
/**
 * The block grid molecule that gets called in by the builder and shortcodes 
 *
 * @package monolith
 */
?>

<!-- start block grid li --> 
<li ckass="monolith-block-grid-item">
  <a href="<?php the_permalink(); ?>">
    <?php if(has_post_thumbnail()) : ?>
      <?php the_post_thumbnail(); ?>
    <?php else : ?> 
      [insert defualt thumb here]
    <?php endif; ?>
  </a>
  <div class="caption">
    <h3><?php the_title(); ?></h3>
    <?php the_excerpt(); ?>
    <a class="button small" href="<?php the_permalink(); ?>">Read more</a>
  </div>
</li>
<!-- end block grid li -->