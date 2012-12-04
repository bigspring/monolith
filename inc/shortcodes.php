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

	if(is_array($atts))
	{
		// see if a id parameter has been passed and set, or use the current post
		if(array_key_exists('id', $atts))
			$id = $atts['id'];
		else
			$id = $post->ID;
		
		// see if a size parameter has been passed and set, or use the default
		if(array_key_exists('size', $atts))
			$size = $atts['size'];
		else
			$size = GALLERY_SPAN_SIZE;
		
		// see if a border parameter has been passed, if not then use the default
		if(array_key_exists('border', $atts))
			$image_class = 'thumbnail';
		else 
			$image_class = GALLERY_IMAGE_CLASSES;
	}

	$args = array(
			'post_parent' => $post->ID,
			'post_type' => 'attachment',
			'order' => 'ASC',
            'orderby' => 'menu_order'	);

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
			$html .= '<li class="span'. $size .'">';
			$html .= '<a href="' . $image->guid . '" class="fancybox '.$image_class.'" rel="gallery1">';
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

/**
 * childpages shortcode renders a bootstrap thumbnail ul of childpages including post thumbnail. title and read more button.
 * @param array $atts
 * @param string $content
 */
function childpages($atts, $content = null)
{
	global $post;

	if(is_array($atts) && array_key_exists('id', $atts))
		$id = $atts['id'];
	else
		$id = $post->ID;

	$args = array(
			'post_parent' => $post->ID,
			'post_type' => 'page'
	);

	// get all attachments
	$childpages = get_children($args);
	


	$html = '<ul class="thumbnails">';

	foreach ($childpages AS $childpage)
	{
			$html .= '<li class="span2">';
			$html .= get_the_post_thumbnail($childpage->ID);
			$html .= $childpage->post_title;
			$html .= '<a href="'. get_permalink($childpage->ID) .' " class="btn">More</a>';
			$html .= '</li>';
	}

	$html .= '</ul>';

	return $html;
}


/**
 * sub_tabs_collapse shortcode, renders a bootstrap tabs of child pages with an accordion within of grandchildren pages
 * @param array $atts
 * @param string $content
 */
function sub_tabs_collapse($atts, $content = null)
{
	global $post;

	if(is_array($atts) && array_key_exists('id', $atts))
		$id = $atts['id'];
	else
		$id = $post->ID;

	$args = array(
			'post_parent' => $post->ID,
			'post_type' => 'page',
			'order' => 'ASC',
			'orderby' => 'menu_order'
	);

	// get all attachments
	$childpages = get_children($args);
	
	$count = 0;

	$html = '<div class="child-tabs">';
	$html .= '<ul class="nav nav-tabs">';

	foreach ($childpages AS $childpage)
	{
			$active = '';
			if ($count == 0) $active = 'class="active"';
			
			$html .= '<li '. $active . '>';
			$html .= '<a href="#' . $childpage->ID . '" data-toggle="tab">' . $childpage->post_title . '</a>';
			$html .= '</li>';
			
			$count++;
	}

	$html .= '</ul>';
	
	$count = 0;

	$html .= '<div class="tab-content">';
	
	foreach ($childpages AS $childpage)
	{
			$active = '';
			if ($count == 0) $active = 'active';

			$html .= '<div class="tab-pane ' . $active . '" id="' . $childpage->ID .'">';
			
			$args = array(
				'post_parent' => $childpage->ID,
				'post_type' => 'page',
				'order' => 'ASC',
				'orderby' => 'menu_order'
			);

			// get all attachments
			$grandchildpages = get_children($args);
			
			$html .= '<div class="accordion" id="accordion">';
			
			foreach($grandchildpages AS $grandchildpage)
			{

				$html .= '<div class="accordion-group">';
				$html .= '<div class="accordion-heading">';
				$html .= '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$grandchildpage->ID.'">';
				$html .= $grandchildpage->post_title;
				$html .= '</a>';
				$html .= '</div>';
				$html .= '<div id="collapse'.$grandchildpage->ID.'" class="accordion-body collapse">';
				$html .= '<div class="accordion-inner">';
				$html .= apply_filters('the_content', $grandchildpage->post_content);
				$html .= '</div>';
				$html .= '</div>';
				$html .= '</div>';

			}
			
			$html .= '</div>';
			$html .= '</div>';
			
			$count++;
	}

	$html .= '</div>';
	$html .= '</div>';
	return $html;


}

//================================ end sub tabs accordion shortcode ====================================

/**
 * sub_tabs shortcode renders bootstrap tabs of child pages
 * @param array $atts
 * @param string $content
 */
function sub_tabs($atts, $content = null)
{
	global $post;

	if(is_array($atts) && array_key_exists('id', $atts))
		$id = $atts['id'];
	else
		$id = $post->ID;

	$args = array(
			'post_parent' => $post->ID,
			'post_type' => 'page',
			'order' => 'ASC',
			'orderby' => 'menu_order'
	);

	// get all attachments
	$childpages = get_children($args);
	
	$count = 0;

	$html = '<div class="child-tabs">';
	$html .= '<ul class="nav nav-tabs">';

	foreach ($childpages AS $childpage)
	{
			$active = '';
			if ($count == 0) $active = 'class="active"';
			
			$html .= '<li '. $active . '>';
			$html .= '<a href="#' . $childpage->ID . '" data-toggle="tab">' . $childpage->post_title . '</a>';
			$html .= '</li>';
			
			$count++;
	}

	$html .= '</ul>';
	
	$count = 0;

	$html .= '<div class="tab-content">';
	
	foreach ($childpages AS $childpage)
	{
			$active = '';
			if ($count == 0) $active = 'active';

			$html .= '<div class="tab-pane ' . $active . '" id="' . $childpage->ID .'">';
			
			if($childpage->post_title == 'Specification Sheets') // if it's a spec sheet page, get the documents
			{
				$html .= do_shortcode('[documents_modified]');
			}
			else
			{
				$html .= apply_filters('the_content', $childpage->post_content);
			}

			$html .= '</div>';
			
			$count++;
	}

	$html .= '</div>';
	$html .= '</div>';
	return $html;


}

//================================ end sub tabs shortcode ====================================

/**
 * childpageslist shortcode renders a list of childpages
 * @param array $atts
 * @param string $content
 */
function childpageslist($atts, $content = null)
{
	global $post;

	if(is_array($atts) && array_key_exists('id', $atts))
		$id = $atts['id'];
	else
		$id = $post->ID;

	$args = array(
			'post_parent' => $post->ID,
			'post_type' => 'page',
			'order' => 'ASC',
			'orderby' => 'menu_order'

	);

	// get all attachments
	$childpages = get_children($args);
	


	$html = '<ul class="unstyled childpages">';

	foreach ($childpages AS $childpage)
	{
			$html .= '<li>';
			$html .= '<a href="'. get_permalink($childpage->ID) . '">' . $childpage->post_title . '</a>';
			$html .= '</li>';
	}

	$html .= '</ul>';

	return $html;
}

//================================ end childpage list shortcode ====================================

//shortcode for bio column structures
function columns_shortcode($atts, $content = null) {
		global $post;
		
		$excerpt = $post->post_excerpt;
		
		return '<div class="columns">' . do_shortcode($content) . '</div>';
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
add_shortcode('childpages', 'childpages');
add_shortcode('childpageslist', 'childpageslist');
add_shortcode('sub_tabs', 'sub_tabs');
add_shortcode('sub_tabs_collapse', 'sub_tabs_collapse'); 
add_shortcode('columns', 'columns_shortcode');
?>