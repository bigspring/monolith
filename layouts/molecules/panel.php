<?php
/**
 * The panel builder molecule, displays a single panel – based on http://foundation.zurb.com/docs/components/panels.html
 *
 * @package monolith
 */
?>

<!-- start panel -->
<div class="monolith-panel panel">

  <!-- the panel heading -->
  <h2 class="entry-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

  <!-- the content -->
  <?php the_content(); ?>

</div>
<!-- end panel -->