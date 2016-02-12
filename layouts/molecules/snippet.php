<?php
/**
 * Snippet molecule, used in builder and loops to display post snippets. Extend / edit to suit.
 *
 * @package monolith
 */
?>

<!-- start single snippet -->
<article <?php post_class( 'snippet' ); ?>>

  <!-- entry title -->
  <header>

    <?php if ( $args['has_title'] ) : // display only if the summary is enabled (default is true) ?>
      <!-- the title -->
      <h2>
        <?php if ( $args['has_titlelink'] ) : // link the title if has_linktitle is true ?>
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        <?php else : ?>
          <?php the_title(); ?>
        <?php endif; // end has_linktitle ?>
      </h2>
    <?php endif; // end has_title ?>
  </header>

  <?php if ( $args['has_date'] ) : // display the date if argument is true ?>
    <!-- entry meta / date -->
    <section class="post-meta subheader">
      <?php global $post;
      if ( 'post' === $post->post_type ) { // only show the date if it's a post
        get_template_part( 'layouts/molecules/date' );
      } ?>
    </section>
  <?php endif; // end has_date ?>

  <?php if ( $args['has_image'] && has_post_thumbnail() ) : // check if post image argument ?>
    <section class="snippet-image">
      <a href="<?php the_permalink(); ?>"><?php the_monolith_post_thumbnail( 'large' ); ?></a>
      <hr class="spacer"/>
    </section>
  <?php endif; ?>

  <?php if ( $args['has_summary'] ) : // display the summary if argument is true ?>
    <!-- entry summary -->
    <section class="entry-summary">
      <?php the_excerpt(); ?>
    </section>
  <?php endif; // end has_summary ?>

  <?php if ( $args['has_readmore'] ) : // display the featured image if argument is true ?>
    <footer class="entry-footer">
      <a href="<?php the_permalink(); ?>" rel="bookmark"><?php _e( 'Read More', 'monolith' ); ?></a>
    </footer>
  <?php endif; // end has_readmore ?>

</article>
<!-- end single snippet -->
