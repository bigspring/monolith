<? // multiple posts loop ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<? get_template_part('parts/post-snippet') // load the post snippet markup ?>
<?php endwhile; ?>

<? elseif ( is_search() ) : // display an error if no search results are found ?>
	<div class="alert">No results found for '<?php echo get_search_query(); ?>'</div>
<? else : ?>
	<div class="alert">No articles found.</div>
<?php endif; ?>