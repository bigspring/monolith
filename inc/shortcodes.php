<?php
/**
 * Collection of shortcodes bundled with Monolith
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */

/**
 * Gallery Shortcodes
 *
 * Called by add_shortcode( 'gallery' )
 *
 * Replaced Wordpress default gallery action with Zurb Foundation Clearing Feature.
 * This is essentially a copy of the wordpress gallery function with some adjustments to
 * add in the foundation clearing feature.
 *
 * You can add a gallery just as you normally would including setting up the number of columns.
 * The function supports up to 6 columns for any gallery, it will fall back to 4 column grid for
 * invalid values.
 *
 * MOBILE: Note that the foundation mobile classes have already been added for each gallery size.
 *			That said you can use the filters below to alter any foundation classes applied to the
 *			block grid.
 *
 * FILTERS:
 *			prso_found_gallery_large_class 		->	Foundation large class for grid block
 *			prso_found_gallery_small_class 		->	Foundation small class for grid block
 *			prso_found_gallery_image_caption 	->	Filter caption for each image in gallery
 *			prso_found_gallery_li_class 		->	Filter class applied to each <li> item in block grid
 *			prso_found_gallery_output 			->	Filter overall html output for gallery
 *
 */
function foundation_gallery_shortcode($attr) {

    $post = get_post();

    static $instance = 0;
    $instance++;

    if ( ! empty( $attr['ids'] ) ) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if ( empty( $attr['orderby'] ) )
            $attr['orderby'] = 'post__in';
        $attr['include'] = $attr['ids'];
    }

    // Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ( $output != '' )
        return $output;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    $gallery_defaults = array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post ? $post->ID : 0,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 4,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    );

    //Filter gallery deafults
    $gallery_defaults = apply_filters( 'prso_gallery_shortcode_args', $gallery_defaults );

    extract(shortcode_atts($gallery_defaults, $attr, 'gallery'));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $icontag = tag_escape($icontag);
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) )
        $itemtag = 'dl';
    if ( ! isset( $valid_tags[ $captiontag ] ) )
        $captiontag = 'dd';
    if ( ! isset( $valid_tags[ $icontag ] ) )
        $icontag = 'dt';

    $columns = intval($columns);

    //Set bloch grid class based on columns
    switch( $columns ) {
        case 1:
            $block_class = apply_filters( 'prso_found_gallery_large_class', 'large-block-grid-1', $columns ) . ' ' . apply_filters( 'prso_found_gallery_small_class', 'small-block-grid-3', $columns );
            break;
        case 2:
            $block_class = apply_filters( 'prso_found_gallery_large_class', 'large-block-grid-2', $columns ) . ' ' . apply_filters( 'prso_found_gallery_small_class', 'small-block-grid-3', $columns );
            break;
        case 3:
            $block_class = apply_filters( 'prso_found_gallery_large_class', 'large-block-grid-3', $columns ) . ' ' . apply_filters( 'prso_found_gallery_small_class', 'small-block-grid-3', $columns );
            break;
        case 4:
            $block_class = apply_filters( 'prso_found_gallery_large_class', 'large-block-grid-4', $columns ) . ' ' . apply_filters( 'prso_found_gallery_small_class', 'small-block-grid-3', $columns );
            break;
        case 5:
            $block_class = apply_filters( 'prso_found_gallery_large_class', 'large-block-grid-5', $columns ) . ' ' . apply_filters( 'prso_found_gallery_small_class', 'small-block-grid-3', $columns );
            break;
        case 6:
            $block_class = apply_filters( 'prso_found_gallery_large_class', 'large-block-grid-6', $columns ) . ' ' . apply_filters( 'prso_found_gallery_small_class', 'small-block-grid-3', $columns );
            break;
        default:
            $block_class = apply_filters( 'prso_found_gallery_large_class', 'large-block-grid-4', 'default' ) . ' ' . apply_filters( 'prso_found_gallery_small_class', 'small-block-grid-3', 'default' );
            break;
    }

    $gallery_container = "<section class=\"gallery\"><ul class='clearing-thumbs gallery galleryid-{$id} {$block_class}' data-clearing>";

    $output = apply_filters( 'gallery_style', $gallery_container );

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        if ( ! empty( $attr['link'] ) && 'file' === $attr['link'] )
            $image_output = wp_get_attachment_link( $id, $size, false, false );
        elseif ( ! empty( $attr['link'] ) && 'none' === $attr['link'] )
            $image_output = wp_get_attachment_image( $id, $size, false );
        else
            $image_output = wp_get_attachment_link( $id, $size, true, false );

        $image_output = wp_get_attachment_link( $id, $size, false, false );

        $image_meta  = wp_get_attachment_metadata( $id );

        //Cache image caption
        $caption_text = NULL;
        if ( trim($attachment->post_excerpt) ) {
            $caption_text = wptexturize($attachment->post_excerpt);
            $caption_text = apply_filters( 'prso_found_gallery_image_caption', $caption_text, $attachment );
        }

        //Add caption to img tag
        $image_output = str_replace('<img', "<img data-caption='{$caption_text}'", $image_output);

        ob_start();
        ?>
        <li class="<?php echo apply_filters( 'prso_found_gallery_li_class', $columns, $attachment ); ?>">
            <?php echo $image_output; ?>
        </li>
        <?php
        $output.= ob_get_contents();
        ob_end_clean();

    }

    $output .= "</ul></section>";

    return apply_filters( 'prso_found_gallery_output',$output, $columns, $attachment );
}
remove_shortcode('gallery');
add_shortcode('gallery', 'foundation_gallery_shortcode');


/**
 * Intro text shortcode [intro]
 */
function intro_text_shortcode($atts, $content = null)
{
	return '<div class="lead">'.apply_filters('the_content', $content).'</div>';
}
add_shortcode('intro', 'intro_text_shortcode');

/**
 * HR shortcode [divider]
 */
function hr_shortcode($atts, $content = null)
{
	return '<hr />';
}
add_shortcode('divider', 'hr_shortcode'); // hr divider shortcode

/**
 * Panel shortcode [panel]
 */
function panel_shortcode($atts, $content = null) {
	extract( shortcode_atts( array(
			'type' => ''
	), $atts ) );


	return '<div class="shortcode-panel panel '. $type .'">'.apply_filters('the_content', $content).'</div>';
}
add_shortcode('panel', 'panel_shortcode');

/**
 * Renders Foundation buttons
 * @param array $atts
 * @param string $content
 * @return string
 */
function buttons( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'type' => '', /* primary, default, info, success, danger, warning, inverse */
			'size' => '', /* tiny, small, large */
			'pageid' => '',
			'url'  => '',
			'text' => '',
	), $atts ) );

	$type = $type;

	if($size == ""){
		$size = "";
	}
	else{
		$size = $size;
	}

	if($pageid != '')
		$url = get_permalink($pageid);

	$output = '<a href="' . $url . '" class="button '. $type . ' ' . $size . '">';
	$output .= $text;
	$output .= '</a>';

	return $output;
}
add_shortcode('button', 'buttons');

/**
 * Renders Foundation blockquotes
 * @param array $atts
 * @param string $content
 * @return string
 */
function blockquotes( $atts, $content = null )
{
	extract( shortcode_atts( array(
			'cite' => '', /* text for cite */
	), $atts ) );

	$output = '<blockquote>';
	$output .= '<p>' . $content . '</p>';

	if($cite){
		$output .= '<cite>' . $cite . '</cite>';
	}

	$output .= '</blockquote>';

	return apply_filters('the_content', $output);
}
add_shortcode('blockquote', 'blockquotes');

/**
 * Childpages shortcode renders a list of childpages 'list' 'grid' 'tabs' 'tabs-accordion' 'accordion' 'heading-accordion'=================================
 * @param array $atts
 * @param string $content
 * @return string
 */
function childpages($atts, $content = null)
{
	// set defaults
	global $post;
    extract( shortcode_atts( array( // set our defaults for the shortcode
        'layout' => 'list', // default layout
        'id' => $post->ID,
        'class' => '',
        'size' => '',
        'exclude_pages' => null,
        'image_border' => 'false',
        'image' => true,
        'title' => true,
        'titlelink' => true,
        'excerpt' => true,
        'readmore' => true,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ), $atts ) ); // @TODO can we handle these defaults through the builder class instead?

	$args = array(
			'post_parent' => $id,
			'post_type' => 'page',
			'order' => 'ASC',
			'orderby' => $orderby,
			'posts_per_page' => -1
	);

    // define our arguments for the builder based on whether we want to show images, titles, etc
    $builder_args = array();
    $builder_args['is_thumbnail'] = ($image_border == 'false') ? false : true;
    $builder_args['has_image'] = ($image == 'false') ? false : true;
    $builder_args['has_title'] = ($title == 'false') ? false : true;
    $builder_args['has_titlelink'] = ($titlelink == 'false') ? false : true;
    $builder_args['has_summary'] = ($excerpt == 'false') ? false : true;
    $builder_args['has_readmore'] = ($readmore == 'false') ? false : true;
    $builder_args['classes'] = $class;
    $builder_args['size'] = $size;


    if($exclude_pages) {
        $args['post__not_in'] = explode(',', $exclude_pages);
    }

	ob_start();
    build($layout, $builder_args, $args);
	return ob_get_clean();
}
add_shortcode('childpages', 'childpages');

//================================ end childpages shortcode stuff ====================================

function pages_shortcode($atts, $content = null) {

    extract( shortcode_atts( array( // set our defaults for the shortcode
        'layout' => 'list', // default layout
        'ids' => '',
        'class' => '',
        'size' => '',
        'exclude_pages' => null,
        'image_border' => 'false',
        'image' => true,
        'title' => true,
        'excerpt' => true,
        'readmore' => true,
        'orderby' => 'menu_order',
        'order' => 'ASC'

    ), $atts ) );

    $page_ids = array();
    $page_ids = explode(',', $atts['ids']);

    // get the posts
    $args = array(
        'post__in' => $page_ids,
        'post_type' => 'page',
        'order' => 'ASC',
        'orderby' => 'menu_order',
        'posts_per_page' => -1

    );

    // define our arguments for the builder based on whether we want to show images, titles, etc
    $builder_args = array();
    $builder_args['is_thumbnail'] = ($image_border == 'false') ? false : true;
    $builder_args['has_image'] = ($image == 'false') ? false : true;
    $builder_args['has_title'] = ($title == 'false') ? false : true;
    $builder_args['has_summary'] = ($excerpt == 'false') ? false : true;
    $builder_args['has_readmore'] = ($readmore == 'false') ? false : true;
    $builder_args['orderby'] = $orderby;
    $builder_args['classes'] = $class;
    $builder_args['size'] = $size;

    ob_start();
    build($layout, $builder_args, $args);
    return ob_get_clean();

}//end function
add_shortcode('pages', 'pages_shortcode');


function kitchensink_shortcode($atts, $content = null) {

    ob_start();
    require(get_template_directory() . '/layouts/organisms/kitchen-sink.php');
    return ob_get_clean();
}
add_shortcode('kitchensink', 'kitchensink_shortcode');


/**
 * Renders wrapper div to create different types of lists
 * @param array $atts
 * @param string $content
 * @return string
 */

function list_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'type' => '', /* no-bullet, ticks, chevron etc */
	), $atts ) );


	$output = '<div class="styled-list '. $type . '">';
	$output .= apply_filters('the_content', $content);
	$output .= '</div>';

	return $output;
}
add_shortcode('list', 'list_shortcode');

/**
 * Renders accordion
 * @param array $atts
 * @param string $content
 * @return string
 */
function monolith_foundation_accordion_shortcode($atts, $content) {

    extract( shortcode_atts( array( // set our defaults for the shortcode
        'class' => ''
    ), $atts ) );

    $output = '<dl class="accordion '.$class.'" data-accordion role="tablist">';
    $output .= do_shortcode($content);
    $output .= '</dl>';

    return apply_filters('the_content', $output);
}
add_shortcode('accordion', 'monolith_foundation_accordion_shortcode');

function monolith_accordion_panel_shortcode($atts, $content) {

    extract( shortcode_atts( array( // set our defaults for the shortcode
        'title' => 'Please enter an accordion title',
        'class' => ''
    ), $atts ) );

    $id = rand(1, 1000);

    $output = '<dd class="accordion-navigation '.$class.'">';
    $output .= '<a href="#panel'.$id.'" role="tab" id="panel'.$id.'-heading" aria-controls="panel'.$id.'">'.$title.'</a>';
    $output .= '<div id="panel'.$id.'" class="content" role="tabpanel" aria-labelledby="panel'.$id.'-heading">';
    $output .= $content;
    $output .= '</div>';
    $output .= '</dd>';

    return apply_filters('accordion_panel', $output);
}
add_shortcode('accordion_panel', 'monolith_accordion_panel_shortcode');

/**
 * Foundation row [row]
 * @param array $atts
 * @param string $content
 * @return string
 */
function foundation_row_shortcode($atts, $content = null) { 
	return '<div class="row">'.apply_filters('the_content', $content).'</div>'; } 
add_shortcode('row', 'foundation_row_shortcode');

/**
 * Foundation columns [foundation_columns]
 * @param array $atts
 * @param string $content
 * @return string
 */
function foundation_columns_shortcode( $atts, $content = null ) {
extract( shortcode_atts( array(
'columns' => '', /* large-12 small-5 etc */
), $atts ) );

$output = '<div class="columns '. $columns . '">';
$output .= apply_filters('the_content', $content);
$output .= '</div>';

return $output;
}
add_shortcode('foundation_columns', 'foundation_columns_shortcode');

/**
 * Address [address]
 * @param array $atts
 * @param string $content
 * @return string
 */

function address_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'no-bullet', /* no-bullet inline-list */
	), $atts ) );

    ob_start();
    include(get_template_directory() . '/layouts/organisms/address.php');
    return ob_get_clean();
}
add_shortcode('monolith_address', 'address_shortcode');

