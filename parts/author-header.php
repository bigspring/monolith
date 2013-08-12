<?php if (have_posts()) : the_post() // query the first post to retrieve author data ?>				
	<div class="pull-right"><?= get_avatar( get_the_author_meta( 'user_email' ) ); ?></div>
	<h1><?php the_author() ?></h1>
	<p class="author-description"><?php the_author_description();?></p>
	<div class="clearfix"></div>
<?php rewind_posts(); // rewind the posts ?>
<?php endif ?>