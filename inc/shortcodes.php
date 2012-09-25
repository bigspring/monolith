<?php
/**
 * Custom shortcode to render Bootstrap glyphicons [icon class=""]
 * @param array $atts
 */
function bootstrap_glyph_icons_shortcode($atts, $content = null)
{
	return '<i class="'.$atts['class'].'"></i>';
}

/**
 * Custom shortcode to produce the contact us button in content [contact text="" pageid=""]
 * @param array $atts
 */
function contact_us_shortcode($atts, $content = null)
{
	if(empty($atts['text']))
		$atts['text'] = 'Please enter some text via text=""';
	
	if($empty($atts['pageid']))
		$atts['text'] .= '.  Please enter the Page ID for the contact page [contact text="" pageid=""]';

	return '<div class="inline-button-block"><a href="'.get_permalink($atts['pageid']).'" class="btn btn-primary">'. $atts['text'].'</a></div>';
}

/**
 * Renders a Bootstrap Gallery with Fancybox using the shortcode [bsgallery]
 * @param array $atts
 * @param string $content
 */
function bootstrap_gallery_shortcode($atts, $content = null)
{
	global $post;

	if(is_array($atts) && array_key_exists('id', $atts))
		$id = $atts['id'];
	else
		$id = $post->ID;

	$args = array(
			'post_parent' => $post->ID,
			'post_type' => 'attachment'
	);

	// get all attachments
	$attachments = get_children($args);
	
	// get the ID of the featured image so we can remove it from the gallery
	$featured_id = get_post_thumbnail_id($post->ID);

	// load fancybox scripts
	wp_enqueue_script('fancyboxjs', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.pack.js', array('jquery'));
	wp_enqueue_script('fancyboxloader', get_template_directory_uri() . '/js/fancybox/loader.js', array('jquery'));
	wp_enqueue_style('fancyboxcss', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.css');

	$html = '<ul class="thumbnails">';

	foreach($attachments AS $image)
	{
		// exclude the featured image
		if($featured_id != $image->ID)
		{
			$html .= '<li class="span2">';
			$html .= '<a href="' . $image->guid . '" class="thumbnail fancybox" rel="gallery1">';
			$html .= wp_get_attachment_image($image->ID, 'thumbnail');
			$html .= '</a>';
			$html .= '</li>';
		}
	}

	$html .= '</ul>';

	return $html;
}

/**
 * Intro text shortcode [intro]
 */
function intro_text_shortcode($atts, $content = null)
{
	return '<p class="lead">'.$content.'</p>';
}

/**
 * Renders bootstrap buttons
 * @param array $atts
 * @param string $content
 */
function buttons( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'type' => 'default', /* primary, default, info, success, danger, warning, inverse */
			'size' => 'medium', /* small, medium, large */
			'pageid' => '',
			'url'  => '',
			'text' => '',
	), $atts ) );

	if($type == "default"){
		$type = "";
	}
	else{
		$type = "btn-" . $type;
	}

	if($size == "medium"){
		$size = "";
	}
	else{
		$size = "btn-" . $size;
	}
	
	if($pageid != '')
		$url = get_permalink($pageid);

	$output = '<a href="' . $url . '" class="btn '. $type . ' ' . $size . '">';
	$output .= $text;
	$output .= '</a>';

	return $output;
}

/**
 * Renders bootstrap alerts
 * @param array $atts
 * @param string $content
 */
function alerts( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'type' => 'info', /* alert-info, alert-success, alert-error */
			'close' => 'false', /* display close link */
			'text' => '',
	), $atts ) );

	$output = '<div class="fade in alert alert-'. $type . '">';
	if($close == 'true') {
		$output .= '<a class="close" data-dismiss="alert">×</a>';
	}
	$output .= $text . '</div>';

	return $output;
}

/**
 * Renders bootstrap block messages
 * @param array $atts
 * @param string $content
 */
function block_messages( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'type' => 'alert-info', /* alert-info, alert-success, alert-error */
			'close' => 'false', /* display close link */
			'text' => '',
	), $atts ) );

	$output = '<div class="fade in alert alert-block '. $type . '">';
	if($close == 'true') {
		$output .= '<a class="close" data-dismiss="alert">×</a>';
	}
	$output .= '<p>' . $text . '</p></div>';

	return $output;
}

/**
 * Renders bootstrap blockquotes
 * @param array $atts
 * @param string $content
 */
function blockquotes( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'float' => '', /* left, right */
			'cite' => '', /* text for cite */
	), $atts ) );

	$output = '<blockquote';
	if($float == 'left') {
		$output .= ' class="pull-left"';
	}
	elseif($float == 'right'){
		$output .= ' class="pull-right"';
	}
	$output .= '><p>' . $content . '</p>';

	if($cite){
		$output .= '<small>' . $cite . '</small>';
	}

	$output .= '</blockquote>';

	return $output;
}

// load shortcodes
add_shortcode('icon', 'bootstrap_glyph_icons');
add_shortcode('contact', 'contact_us_shortcode');
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'bootstrap_gallery_shortcode');
add_shortcode('intro', 'intro_text_shortcode');
add_shortcode('button', 'buttons');
add_shortcode('alert', 'alerts');
add_shortcode('block-message', 'block_messages');
add_shortcode('blockquote', 'blockquotes');
?>