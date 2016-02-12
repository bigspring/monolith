<?php
/**
 * The content organism used in pages and singles
 *
 * @package monolith
 */
?>

<!-- start content organism -->
<?php if ( $loop->have_posts() ) : ?>

  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <article id="post-<?= $post->ID; ?>" <?php post_class(); ?>>

      <!-- the post summary -->
      <?php if ( has_excerpt() ) : ?>
        <section class="entry-summary">
          <p class="lead"><?= get_the_excerpt(); ?></p>
        </section>
      <?php endif; ?>


      <?php if ( has_post_thumbnail() ) : ?>
        <!-- the featured image -->
        <section class="post-featured-image">
          <?php the_monolith_post_thumbnail( 'large' ); ?>
        </section>
      <?php endif; ?>

      <!-- post content -->
      <section class="entry-content">
        <?php the_content() ?>
      </section>

      <!-- post footer -->
      <footer class="entry-footer">
      </footer>

    </article>
  <?php endwhile; ?>

<?php else : // otherwise, load the no-content layout ?>
  <?php include( $layouts_path . 'organisms/content-none.php' ); ?>
<?php endif; ?>
<!-- end content organism -->
