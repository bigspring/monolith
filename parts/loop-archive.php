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
	<ol>
	<?php while ( have_posts() ) : the_post(); ?>
		<li>
			<article>
				<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<time datetime="<?php the_time( 'Y-m-D' ); ?>" pubdate="<?php the_date(); ?> <?php the_time(); ?>"><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
				<?php the_content(); ?>
			</article>
		</li>
	<?php endwhile; ?>
	</ol>
	<?php else: ?>
	<h1>No posts to display</h1>	
<?php endif; ?>
