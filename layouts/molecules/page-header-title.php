<?php
/**
 * The title part that handles all titles for all views
 *
 * @package monolith
 */
?>

<div class="page-header-title">

  <?php if ( is_day() ) : ?>

    <h1 class="archive-title"><?php _e( 'Day:', 'monolith' ); ?><?php echo get_the_date( 'l j F Y' ); ?></h1>

  <?php elseif ( is_month() ) : ?>

    <h1 class="archive-title"><?php _e( 'Month:', 'monolith' ); ?><?php echo get_the_date( 'F Y' ); ?></h1>

  <?php elseif ( is_year() ) : ?>

    <h1 class="archive-title"><?php _e( 'Year:', 'monolith' ); ?><?php echo get_the_date( 'Y' ); ?></h1>

  <?php elseif ( is_tag() ) : ?>

    <h1 class="archive-title"><?php _e( 'Tag:', 'monolith' ); ?><?php single_tag_title(); ?></h1>

  <?php elseif ( is_category() ) : ?>

    <h1 class="category-title"><?php single_cat_title() ?></h1>

  <?php elseif ( is_author() ) : ?>

    <h1 class="author-name"><?php _e( 'Author:', 'monolith' ); ?><?php the_author(); ?></h1>

  <?php elseif ( is_home() ) : // on the blog page, show the site option ?>

    <h1><?= get_option( 'monolith_blog_page_title' ); // display site option  ?></h1>
    <?php if(get_option( 'monolith_blog_page_introtext' )) : ?>
		  <p class="lead">
		  	<?= get_option( 'monolith_blog_page_introtext' ); // display site option ?>
		  </p>	
	  <?php endif; ?>

  <?php elseif ( is_search() ) : ?>

    <h1>Search results for '<?php echo get_search_query(); ?>'</h1>

  <?php elseif ( is_post_type_archive() ) : // if it's a post type arch, use the name ?>

    <h1><?php post_type_archive_title(); ?></h1>

  <?php elseif ( is_tax() ) : // or if it's a tax, use the tax name ?>

    <?php global $wp_query;
    $term = $wp_query->get_queried_object();
    ?>

    <h1><?= $term->name;; ?></h1>

  <?php elseif ( is_page() ) : // on pages, show the title ?>

    <h1 class="entry-title"><?php the_title(); ?></h1>

  <?php else : // otherwise, display the post title as a fallback ?>

    <h1 class="entry-title"><?php the_title(); ?></h1>

    <?php // on a single post, show the date ?>
    <?php if ( is_singular( 'post' ) ) : get_template_part( 'layouts/molecules/date' ); endif ?>

  <?php endif; ?>

</div>