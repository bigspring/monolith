<?php 
/*
 * Monolith
 * Author snippet
 */
?>

<?php if ( get_the_author_meta( 'description' ) ) : ?>

	<div itemscope itemtype="http://www.schema.org/Person" class="article-author well">								
		
		<div class="author-image pull-right" itemprop="image"><?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?></div>
		
		<div class="media-body">
			<h3 class="author-snippet-name" itemprop="author">About <?php the_author() ?></h3>
			<p class="author-snippet-description" itemprop="description"><?php the_author_meta( 'description' ); ?></p>
			<p class="author-snippet-link"><small>More posts by <?= the_author_posts_link(); ?> &rarr;</small></p>
		</div>
	
	</div>

<?php endif; ?>