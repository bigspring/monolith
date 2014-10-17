<?php 
 // Monolith by BigSpring
 // Licensed under MIT Open Source
 // Title loop
?>

<!-- start the page header -->
<header class="page-header">
  <div class="row">
    <div class="small-12 columns">

			<?php if ( is_day() ) : ?>
			  
			  <h1 class="archive-title"><?php _e('Day:','monolith'); ?> <?php echo  get_the_date( 'l j F Y' ); ?></h1>
			
			<?php elseif ( is_month() ) : ?>
			  
			  <h1 class="archive-title"><?php _e('Month:','monolith'); ?> <?php echo  get_the_date( 'F Y' ); ?></h1>
			
			<?php elseif ( is_year() ) : ?>
			  
			  <h1 class="archive-title"><?php _e('Year:','monolith'); ?> <?php echo  get_the_date( 'Y' ); ?></h1>	
			
			<?php elseif ( is_tag() ) : ?>
			  
			  <h1 class="archive-title"><?php _e('Tag:','monolith'); ?> <?php single_tag_title(); ?></h1>						
			
			<?php elseif ( is_category() ) : ?>
			  
			  <h1 class="category-title"><?php single_cat_title() ?></h1>
			
			<?php elseif ( is_author() ) : ?>
			  
			  <h1 class="author-name"><?php _e('Author:','monolith'); ?> <?php the_author(); ?></h1>
			
			<?php elseif ( is_home() ) : ?>
			  
			  <h1><?php bloginfo('name'); ?></h1>
			
			<?php elseif ( is_search() ) : ?>
			  
			  <h1>Search results for '<?php echo get_search_query(); ?>'</h1>
			  
		  <?php elseif ( is_post_type_archive() ) : ?>
		  
		    <h1><?php post_type_archive_title(); ?></h1>
		    
	    <?php elseif ( is_tax() ) : ?>	    
     
        <?php global $wp_query;
          $term = $wp_query->get_queried_object();
        ?>
        
        <h1><?=$term->name;; ?></h1>
			
			<?php else : ?>
			
			  <h1 class="entry-title"><?php the_title(); ?></h1>
			
			<?php endif; ?>
      
      <hr />

    </div><!-- /.small-12.columns -->
  </div><!-- /.row -->
</header><!-- /.page-header -->
<!-- end the page header -->