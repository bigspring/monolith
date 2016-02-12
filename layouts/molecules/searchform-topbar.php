<?php
/**
 * A search form for inclusion in the top bar, based on http://foundation.zurb.com/docs/components/topbar.html#
 * @package monolith
 */
?>

<!-- start the searchbar molecule -->
<ul class="right">
  <li class="has-form">
    <div class="row collapse">
      <div class="large-8 small-9 columns">
        <input type="text" placeholder="<?php _e( 'Search...', 'monolith' ); ?>">
      </div>
      <div class="large-4 small-3 columns">
        <button class="button postfix"><?php _e( 'Go', 'monolith' ); ?></button>
      </div>
    </div>
  </li>
</ul>
<!-- end the searchbar molecule -->
