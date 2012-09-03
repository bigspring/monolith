<?php // Single Post ?> 
<? get_template_parts( array( 'parts/html-header', 'parts/header' ) ); // load headers ?>

<div id="main">
	<div class="<?= CONTAINER_CLASSES; ?>">	
		<div class="<?= ROW_CLASSES ?>">
		<div class="span<?= MAIN_SIZE ?>">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		
		<article>	
			<header>
			<h2><?php the_title(); ?></h2>
			<?php get_template_part('parts/postmeta'); ?>
			</header>
			<?php the_content(); ?>			
		
			<footer>
			<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<div class="well">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
					<h3>About <?php echo get_the_author() ; ?></h3>
					<?php the_author_meta( 'description' ); ?>
				</div>
			<?php endif; ?>
			<?php // comments_template( '', true ); ?>
			</footer>	
		</article>
		<?php endwhile; ?>
		</div><? //span8 ?>
			<? get_template_part('parts/sidebar-right'); // el loado sidebaro ?>
		</div><? //row ?>
	</div><? //container ?>
</div><? //main ?>

<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); // load footer files ?>