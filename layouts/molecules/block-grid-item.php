<?php
/**
 * The block grid molecule that gets called in by the builder and shortcodes
 *
 * @package monolith
 */
?>

<!-- start block grid li -->
<li class="item">

  <?php if ( $args['has_image'] ) : // display the featured image if argument is true ?>
    <!-- the featured image -->
    <a name="<?= the_title(); ?>"
       class="featured-image <?= $args['is_thumbnail'] ? 'th' : ''; // add th class if enabled (default: true) ?> "
       href="<?php the_permalink(); ?>">
      <?= the_monolith_post_thumbnail( 'large' ); ?>
    </a>
  <?php endif; // end has_image ?>

  <?php if ( $args['has_caption'] ) : // display if captions are enabled (default is true) ?>
    <div class="caption">
      <?php if ( $args['has_title'] ) : // display only if the summary is enabled (default is true) ?>
        <!-- the title -->
        <h3>
          <?php if ( $args['has_titlelink'] ) : // link the title if has_linktitle is true ?>
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          <?php else : ?>
            <?php the_title(); ?>
          <?php endif; // end has_linktitle ?>
        </h3>
      <?php endif; // end has_title ?>

      <?php if ( $args['has_summary'] ) : // display only if the summary is enabled (default is true) ?>
        <!-- the summary -->
        <div class="summary">
          <?php the_excerpt(); ?>
        </div>
      <?php endif; // end has_summary ?>

      <?php if ( $args['has_readmore'] ) : // display only if the permalink is enabled (default is true) ?>
        <!-- the permalink -->
        <a class="permalink read-more" role="permalink" href="<?php the_permalink(); ?>"><?php _e( 'Read more' ); ?></a>
      <?php endif; // end has_readmore ?>
    </div>
  <?php endif; // end has_caption ?>

</li>
<!-- end block grid li -->
