<div class="childpages childpages-snippet">
	<?php while ( $childpages->have_posts() ) : $childpages->the_post(); ?>
	<?php get_template_part('parts/post-snippet') ?>
	<?php endwhile; ?>
</div>