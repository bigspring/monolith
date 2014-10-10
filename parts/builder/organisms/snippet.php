<div class="col-md-<?= $snippet_size ?>">
<?php the_post_thumbnail(); ?>
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<?php the_content(); ?>
</div>