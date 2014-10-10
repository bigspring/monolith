<?php 
/*
 * Monolith
 * WordPress Index
 * The WordPress index does most of the heavy lifting for loops – categories, archives, tags etc.
*/
?>


<?php get_header() ?>

<div class="wrapper-main" role="main">

	<div class="container">
	
		<? get_template_part('parts/breadcrumb'); // load breadcrumb ?>
	
		<header class="page-header archive-header" itemprop="name">
			
			<?php if ( is_day() ) : ?>
			<h1 class="archive-title h1">Archive: <?php echo  get_the_date( 'D F Y' ); ?></h1>
			
			<?php elseif ( is_month() ) : ?>
			<h1 class="archive-title h1">Archive: <?php echo  get_the_date( 'F Y' ); ?></h1>
			
			<?php elseif ( is_year() ) : ?>
			<h1 class="archive-title h1">Archive: <?php echo  get_the_date( 'Y' ); ?></h1>	
			
			<?php elseif ( is_tag() ) : ?>
			<h1 class="archive-title h1">Tag Archive: <?php single_tag_title(); ?></h1>						
			
			<?php elseif ( is_category() ) : ?>
			<h1 class="category-title h1"><?php single_cat_title() ?></h1>
			
			<?php elseif ( is_author() ) : get_template_part('parts/author-header') ?>
			
			<?php elseif ( is_home() ) : ?>
			<h1>The Blog</h1>
			
			<?php elseif ( is_search() ) : ?>
			<h1>Search results for '<?php echo get_search_query(); ?>'</h1>
			
			<?php else : ?>
			<h1 class="archive-title h1">Archive</h1>
			
			<?php endif; ?>
		
		</header>


        <?php $args = array(
            'posts_per_page' => 3,
            'post_type' => 'post'
        );

        $some_posts = new WP_Query($args);

        $builder_args = array(
            //'classes' => 'list-unstyled'
        );
        ?>

        <?php get_builder_part('snippets', $some_posts, $builder_args); ?>
        <?php get_builder_part(); ?>

		<div class="row">

			<main class="<?= MAIN_SIZE ?>" role="main">
				
				<?php get_template_part('parts/loop-posts') // load the posts loop ?>

			</main><!-- MAIN_SIZE -->

			<? get_template_part('parts/sidebar'); // right sidebar ?>

		</div><!-- /ROW_CLASSES -->	

	</div><!-- /CONTAINER_CLASSES -->

</div><!-- /main -->	

<?php get_footer(); ?>