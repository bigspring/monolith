<?php 
 // Monolith by BigSpring
 // Licensed under MIT Open Source
 // Content loop
?>

<?php if($loop->have_posts()) : ?>

  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <article id="post-<?= $post->ID; ?>" <?php post_class(); ?>>
    
      <section class="entry-content">
        <?php the_content() ?>
      </section>
      
      <footer class="entry-footer">
        [content footer]
      </footer>
    
    </article>
  <?php endwhile; ?>
 
<?php else : // otherwise, load the no-content layout ?>
  <?php include($layouts_path . 'organisms/content-none.php'); ?>
<?php endif; ?>
