<?php
/**
 * The panel molecule that gets called in by the builder and shortcodes 
 *
 * @package monolith
 */
?>

<!-- start panel -->
<div class="monolith-panel <? // $snippet_size ?>">
  <?php the_post_thumbnail(); ?>
  <h2 class="entry-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php the_content(); ?>
</div>
<!-- end panel -->