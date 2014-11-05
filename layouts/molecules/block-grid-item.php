<?php
/**
 * The block grid molecule that gets called in by the builder and shortcodes 
 *
 * @package monolith
 */
?>

<!-- start block grid li --> 
<li class="item">  
  
  <!-- featured image -->  
  <a class="featured-image" href="<?php the_permalink(); ?>">    
    <?php if(has_post_thumbnail()) : // check if post has a thumbnail ?>
      <?php the_post_thumbnail(); ?>    
    <?php else : // otherwise display the default image ?> 
      <img alt="<?php bloginfo('description'); ?>" class="default-image th" src="<?= get_template_directory_uri();?>/assets/img/default.jpg" />    
    <?php endif; ?>
  </a>  
  
  <div class="caption">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    
    <div class="summary">
      <?php the_excerpt(); ?>
    </div>        
    <a class="permalink read-more" role="permalink" href="<?php the_permalink(); ?>"><?php _e('Read more'); ?></a>
  </div>
  
</li>
<!-- end block grid li -->