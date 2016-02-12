<?php
/**
 * The default search form partial, used by WP core.
 * @package monolith
 */
?>

<!-- start the search form -->
<section class="searchform widget">
  <form action="<?php bloginfo( 'siteurl' ); ?>" id="searchform" method="get">
    <div class="row collapse">
      <div class="small-10 columns">
        <input value="<?php the_search_query(); ?>" type="search" id="s" name="s" placeholder="<?php _e( 'Search the site...', 'monolith' ); ?>">
      </div>
      <div class="small-2 columns">
        <button class="button postfix"><?php _e( 'Go', 'monolith' ); ?></button>
      </div>
    </div>
  </form>
</section>
<!-- end the search form -->
