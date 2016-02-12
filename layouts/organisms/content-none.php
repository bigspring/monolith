<?php
/**
 * The content none organism used in all cases where no results are returned from a loop
 *
 * @package monolith
 */
?>

<?php if(is_search()) : // display a notification on the search page ?>

<article class="no-search-results">

  <p class="lead"><?php _e('Your search did not match any pages.');?>'</p>

  <p>Suggestions:</p>
  <ul>
    <li><?php _e('Make sure that all words are spelled correctly, and try again', 'monolith'); ?></li>
    <li><?php _e('Try different keywords', 'monolith'); ?></li>
    <li><?php _e('Try more general keywords', 'monolith'); ?></li>
    <li><?php _e('Go back to the', 'monolith'); ?> <a href="<?php bloginfo('url'); ?>"><?php _e('home page', 'monolith'); ?></a></li>
  </ul>

</article>

<?php else : // otherwise, show the default error ?>

<!-- start content-none organism -->
<div data-alert class="alert-box info text-center">
  <?php _e('Sorry, no results found.', 'monolith'); ?>
</div>
<!-- end content-none organism -->

<?php endif; ?>
