<header class="title" role="banner">		
	<h1 class="post-title"><?php the_title(); ?></h1>		
	<?php if ($post->post_excerpt != '') { // show the excerpt if it exists ?>
	<p class="post-excerpt lead"><?= get_the_excerpt(); ?></p>
	<? } ?>
	<?php if (is_singular('post')) { ?>
	<p class="post-meta text-muted"><?php get_template_part('parts/meta/date'); ?> by <?php get_template_part('parts/meta/author'); ?></p>
	<? } ?>
</header>