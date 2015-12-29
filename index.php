<?php
/**
 * Main index file, which does all the heavy lifting.
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */
get_header(); ?>

<?php if ( is_home() || is_archive() ) : ?>

	<?php build( 'snippets' ); // if it's the main loop, load snippets ?>

<?php else : ?>

	<?php build( 'content' );  // otherwise, load content by default ?>

<?php endif; ?>

<?php get_footer();