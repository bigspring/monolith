<?php if ( have_posts() ): ?>
<?php if ( is_day() ) : ?>
	<h1>Archive: <?php echo  get_the_date( 'D M Y' ); ?></h1>							
	<?php elseif ( is_month() ) : ?>
	<h1>Archive: <?php echo  get_the_date( 'M Y' ); ?></h1>	
	<?php elseif ( is_year() ) : ?>
	<h1>Archive: <?php echo  get_the_date( 'Y' ); ?></h1>								
	<?php else : ?>
	<h1>Archive</h1>	
	<?php endif; ?>

	<ul class="unstyled">
	<?php while ( have_posts() ) : the_post(); ?>
		<li <?php post_class(); ?>>	
			<header>
				<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php get_template_part('parts/meta/date'); ?>
			</header>
				<?php the_excerpt(); ?>
				<?php get_template_part('parts/meta/readmore'); ?>		
		</li>
		<hr/>
	<?php endwhile; ?>
	</ul>

	<?php else: ?>
	<h1>No posts to display</h1>	
<?php endif; ?>


