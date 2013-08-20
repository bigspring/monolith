<?php 
/*
 * Monolith
 * Author snippet
 */
?>

<?php if ( get_the_author_meta( 'description' ) ) : ?>

	<div itemscope itemtype="http://www.schema.org/Person" class="article-author panel panel-default">
				
		<div class="panel-heading">
			<h3 class="author-snippet-name panel-title" itemprop="author">About the author</h3>
		</div>
		
		<div class="panel-body">
			<div class="author-image pull-right" itemprop="image"><?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?></div>

			<h3><?php the_author() ?></h3>
			<p class="author-snippet-description text-muted" itemprop="description"><?php the_author_meta( 'description' ); ?></p>
			<p class="author-snippet-link"><small>More posts by <?= the_author_posts_link(); ?> &rarr;</small></p>
			<div class="clearfix"></div>
		</div>		
	
	</div>

<?php endif; ?>