<?php
/**
 * The actual list item molecule that gets called in by the builder and shortcodes
 *
 * @package monolith
 */
?>

<!-- begin list item -->
<li class="monolith-list-item">
  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</li>
<!-- end list item -->