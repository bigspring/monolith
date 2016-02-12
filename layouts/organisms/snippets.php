<?php
/**
 * The snippets organism used to render the snippet molecule in loops and snippets shortcodes
 *
 * @package monolith
 */
?>

<?php if ( $loop->have_posts() ) :  // if we have results run the loop ?>

    <!-- start snippets loop -->
    <div class="monolith-snippets <?= $args['classes'] ?>">
      <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php if ( is_search() ) : ?>
          <?php include( $layouts_path . 'molecules/search-result.php' ); ?>
        <?php else : ?>
          <?php include( $layouts_path . 'molecules/snippet.php' ); ?>
        <?php endif; ?>
      <?php endwhile; ?>
    </div>
    <!-- end snippets loop -->  

<?php else  :// otherwise show the content none organism ?>
  <?php include( $layouts_path . 'organisms/content-none.php' ); ?>
<?php endif; ?>

<?php include( $layouts_path . 'organisms/pagination.php' ); ?>
