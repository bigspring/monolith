<?php
/**
 * The block grid molecule that gets called in by the builder and shortcodes
 *
 * @package monolith
 */
?>

<!-- start block grid li -->
<li class="item">
  <?php if ( $args['has_link'] ) : ?>
  <a name="<?= the_title(); ?>" href="<?php the_permalink(); ?>">
  <?php endif; ?>

    <div class="card">
        <?php if ( $args['has_image'] ) : // display the featured image if argument is true ?>
          <div class="featured-image">
            <?php the_monolith_post_thumbnail( 'large' ); ?>
          </div>
        <?php endif; // end has_image ?>

        <div class="caption" data-equalizer-watch>
        <?php if ( $args['has_title'] ) : // display only if the summary is enabled (default is true) ?>
          <h3 class="title <?= $args['has_summary'] ? 'has-summary' : ''?>"><?php the_title(); ?></h3>
        <?php endif; // end has_title ?>

        <?php if ( $args['has_summary'] ) : // display only if the summary is enabled (default is true) ?>
          <div class="summary">

            <?= wp_trim_words( get_the_excerpt(), 35, '...' ); ?>

          </div>
        <?php endif; // end has_summary ?>


        </div>

        <?php if ( $args['has_link'] && $args['has_readmore'] ) : // display only if the summary is enabled (default is true) ?>
          <div class="read-more">
            <?php _e('Read more &rarr;','monolith'); ?>
          </div>
        <?php endif; // end ?>

    </div>

    <?php if ( $args['has_link'] ) : ?>
      </a>
    <?php endif; ?>

</li>
<!-- end block grid li -->
