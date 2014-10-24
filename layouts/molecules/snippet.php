<?php
 // Monolith by BigSpring
 // Licensed under MIT Open Source
 // Descriptiin: Snippet molecule, used in builder and loops to display post snippets. Extend / edit to suit.
?>

<!-- start single snippet -->
<article id="post-<?= $post->ID; ?>" <?php post_class(); ?>>

  <!-- entry title -->
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
  </header>

  <!-- entry summary -->
  <section class="entry-summary">
    <?php global $post;
      if('post' == $post->post_type) { // only show the date if it's a post
        get_template_part('layouts/molecules/date');
      } ?>
    <?php the_excerpt(); ?>
  </section>

  <footer class="entry-footer">
    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php _e('Read More','monolith'); ?></a>
  </footer>

</article>
<!-- end single snippet -->
