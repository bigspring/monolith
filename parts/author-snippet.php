<? // author part ?>

<?php if ( get_the_author_meta( 'description' ) ) : ?>
	<hr/>
	<div itemscope itemtype="http://www.schema.org/Person" class="media article-author">								
		
		<div class="author-image pull-left" itemprop="image"><?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?></div>
		
		<div class="media-body">
			<h3 class="author-name" itemprop="author">About <?php echo get_the_author() ; ?></h3>
			<div class="author-description" itemprop="description"><?php the_author_meta( 'description' ); ?></div>
		</div>
	
	</div>
	<hr/>
<?php endif; ?>