<?php 
 // Monolith by BigSpring
 // Licensed under MIT Open Source
 // Content loop
?>

<article id="post-<?= $post->ID; ?>" <?php post_class(); ?>>

  <section class="entry-content">
    <?php the_content() ?>
  </section>
  
  <footer class="entry-footer">
    [content footer]
  </footer>

</article>