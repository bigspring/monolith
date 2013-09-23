<?php
/**
 * Get the category id from a category name
 *
 * @param 	string
 * @return 	string
 * @author 	Jon Martin
 */
function get_category_id( $cat_name ){
	$term = get_term_by( 'name', $cat_name, 'category' );
	return $term->term_id;
}

/**
 * Simple wrapper for native get_template_part()
 * Allows you to pass in an array of parts and output them in your theme
 * e.g. <?php get_template_parts(array('part-1', 'part-2')); ?>
 *
 * @param 	array
 * @return 	void
 * @author 	Jon Martin
 **/
function get_template_parts( $parts = array() ) {
	foreach( $parts as $part ) {
		get_template_part( $part );
	};
}

/**
 * Pass in a path and get back the page ID
 * e.g. get_page_id_from_path('about/terms-and-conditions');
 *
 * @param 	string
 * @return 	integer
 * @author 	Keir Whitaker
 **/
function get_page_id_from_path( $path ) {
	$page = get_page_by_path( $path );
	if( $page ) {
		return $page->ID;
	} else {
		return null;
	};
}

/**
 * Print a pre formatted array to the browser - very useful for debugging
 *
 * @param 	array
 * @return 	void
 * @author 	Jon Martin
 **/
function dump( $a ) {
	print('<pre>');
	print_r($a);
	print('</pre>');
}

/**
 * Returns the topmost parent post ID for the current post.  Designed For use with the pages.
 * @return int
 * @author Jon Martin
 */
function get_topmost_parent_id() {
    global $post;
    $ancestors=get_post_ancestors($post->ID);    
    $root=count($ancestors)-1;
    return $ancestors[$root];
}

/**
 * Markup for the comments
 * @param unknown_type $comment
 * @param array $args
 * @param unknown_type $depth
 */
function monolith_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<div class="well">
					<div class="row">
						<div class="span1">
							<?php echo get_avatar( $comment ); ?>
						</div>
						<div class="span7">
							<h4><?php comment_author_link() ?></h4>
							<p class="muted"><time><?php comment_date('jS F o') ?></time></p>
							<?php comment_text() ?>
						</div>
					</div>
				</div>
			</article>
		<?php endif; ?>
		</li>
		<?php 
}

/**
 * Returns a custom excerpt length
 * @param int $length defaults to 240 chars
 */
function get_excerpt($length = 240)
{
	global $post;

	$excerpt = get_the_excerpt();

	// get the natural length
	$start_length = strlen($excerpt);

	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $length);

	// if the excerpt is longer than the required length, truncate to the last word and add three dots
	if($start_length > $length)
	{
		$excerpt = substr($excerpt, 0, strrpos($excerpt, " "));
		$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
		$excerpt .= '...';
	}

	return $excerpt;
}

/**
 * Returns a custom excerpt length
 * @param int $length defaults to 240 chars
 */
function get_content($length = 240)
{
	global $post;

	$content = get_the_content();

	// get the natural length
	$start_length = strlen($excerpt);

	$content = preg_replace(" (\[.*?\])",'',$content);
	$content = strip_shortcodes($content);
	$content = strip_tags($content);
	$content = substr($content, 0, $content);

	// if the excerpt is longer than the required length, truncate to the last word and add three dots
	if($start_length > $length)
	{
		$content = substr($excerpt, 0, strrpos($content, " "));
		$content = trim(preg_replace( '/\s+/', ' ', $content));
		$content .= '...';
	}

	return $content;
}


/**
 * Returns a custom post title length
 * @param int $length defaults to 45 chars
 */
function get_short_title($length = 45)
{
	global $post;

	$title = get_the_title();
	//get the natural length
	$start_length = strlen($title);

	$title = substr($title, 0, $length);
	// if the excerpt is longer than the required length, truncate to the last word
	if($start_length > $length)
	{
		$title .= '...';
	}

	return $title;
}

/**
 * Tests if any of a post's assigned categories are descendants of target categories
 *
 * @param int|array $cats The target categories. Integer ID or array of integer IDs
 * @param int|object $_post The post. Omit to test the current post in the Loop or main query
 * @return bool True if at least 1 of the post's categories is a descendant of any of the target categories
 * @see get_term_by() You can get a category by name or slug, then pass ID to this function
 * @uses get_term_children() Passes $cats
 * @uses in_category() Passes $_post (can be empty)
 * @version 2.7
 * @link http://codex.wordpress.org/Function_Reference/in_category#Testing_if_a_post_is_in_a_descendant_category
 */
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
	function post_is_in_descendant_category( $cats, $_post = null ) {
		foreach ( (array) $cats as $cat ) {
			// get_term_children() accepts integer ID only
			$descendants = get_term_children( (int) $cat, 'category' );
			if ( $descendants && in_category( $descendants, $_post ) )
				return true;
		}
		return false;
	}
}

/**
 * Shows the time ago in hours if in last day, yesterday, or the date
 * @param string $type
 */
function time_ago( $type = 'post' ) {
	$d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
	$now = time();

	$posttime = $d('U');

	// if yesterday, return yesterday
	if($now - $posttime >= 86400 && $now - $posttime < 172800) {
		return 'Yesterday';
	}
	// if greater than yesterday, return the date
	elseif($now - $posttime >= 172800) {
		return get_the_date();
	} else {
		// otherwise return the human_time_diff (assumes within the last 24 hours
		return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
	}
}

/**
 * Checks the PHP server variable for user agent and looks for iphone and ipod devices
 */
function detectiOS() 
{
	$container = $_SERVER['HTTP_USER_AGENT'];
	$useragents = array ('iPhone','iPod', 'iPad');
	$ios = false;
	foreach ( $useragents as $useragent ) {
		if (eregi($useragent,$container)){
			$ios = true;
		}
	}
	return $ios;
}

add_post_type_support( 'page', 'excerpt' );

/**
 * Returns the next page link for a given page
 */
function next_page_link()
{
	$links = get_page_links();
	$html = '';

	if(!empty($links['nextID']))
		$html = '<a href="' . get_permalink($links['nextID']) . '" title="' . get_the_title($links['nextID']) . '" class="btn btn-primary">' . get_the_title($links['nextID']) .'</a>';

	echo $html;
}

/**
 * Returns the previous page link for a given page
 */
function previous_page_link()
{
	$links = get_page_links();
	$html = '';

	// if we have a previous page, generate the markup
	if(!empty($links['prevID']))
		$html = '<a href="' . get_permalink($links['prevID']) . '" title="' . get_the_title($links['prevID']) . '" class="btn btn-primary">' . get_the_title($links['prevID']) .'</a>';

	echo $html;
}

/**
 * Used to calculate the next and previous pages for the current page's parent
 */
function get_page_links()
{
	global $post;

	$args = array(
			'sort_column' => 'menu_order',
			'sort_order' => 'asc',
			'child_of' => $post->post_parent
	);

	$pagelist = get_pages($args);

	$pages = array();
	foreach ($pagelist as $page) {
		$pages[] += $page->ID;
	}

	$current = array_search(get_the_ID(), $pages);
	$links['prevID'] = $pages[$current-1];
	$links['nextID'] = $pages[$current+1];

	return $links;
}

//code to render the dropdown list of shortcodes
add_action('media_buttons','add_sc_select',11);
function add_sc_select(){
    echo '&nbsp;<select id="sc_select">
                        <option disabled="disabled">Shortcodes</option>
                        <option value="[intro][/intro]">[intro]</option>
                        <option value="[button text=&#34;&#34; url=&#34;&#34; type=&#34;&#34; size=&#34;&#34;]">[button]</option>
                        <option value="[alert text=&#34;&#34; type=&#34;&#34; close=&#34;&#34;]">[alert]</option>
                        <option value="[block-message text=&#34;&#34; type=&#34;&#34; close=&#34;&#34;]">[block-message]</option>
                        <option value="[blockquote cite=&#34;&#34; float=&#34;&#34;][/blockquote]">[blockquote]</option>
                        <option value="[columns][/columns]">[columns]</option>
                        <option value="[childpages layout=&#34;&#34;]">[childpages]</option>
                        
        </select>';
}
add_action('admin_head', 'button_js');
function button_js() {
        echo '<script type="text/javascript">
        jQuery(document).ready(function(){
           jQuery("#sc_select").change(function() {
                          send_to_editor(jQuery("#sc_select :selected").val());
                          return false;
                });
        });
        </script>';
}

// Custom WordPress Login styling, use the login.css to style the WP login page with site logo etc...
function login_css() {
	wp_enqueue_style( 'login_css', get_template_directory_uri() . '/css/login.css' );
}
add_action('login_head', 'login_css');


//all post thumbnail captions
function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}
