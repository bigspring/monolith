<? // monolith: default page header part ?>

<header class="page-header" role="banner">
	<h1 itemprop="name"><?php the_title(); ?></h1>
	<?php if ($post->post_excerpt != '') { // show the excerpt if it exists ?>
	<p class="page-excerpt lead"><?= get_the_excerpt(); ?></p>
	<? } ?>
</header>