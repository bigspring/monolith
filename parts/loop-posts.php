<? // multiple posts loop ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<? get_template_part('parts/post/post-snippet') // load the post snippet markup ?>
<?php endwhile; ?>