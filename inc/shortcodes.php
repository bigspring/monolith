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
 * Clean up gallery_shortcode()
 *
 * Re-create the [gallery] shortcode and use thumbnails styling from Bootstrap
 * Taken from rootstheme.com with a custom integration by bigspring.co.uk for loading thumbnails via fancybox
 *
 * @link http://twitter.github.com/bootstrap/components.html#thumbnails
 */
function monolith_gallery($attr) {
  $post = get_post();

  static $instance = 0;
  $instance++;
  
  if (!empty($attr['ids'])) {
    if (empty($attr['orderby'])) {
      $attr['orderby'] = 'post__in';
    }
    $attr['include'] = $attr['ids'];
  }

  $output = apply_filters('post_gallery', '', $attr);

  if ($output != '') {
    return $output;
  }

  if (isset($attr['orderby'])) {
    $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
    if (!$attr['orderby']) {
      unset($attr['orderby']);
    }
  }

  extract(shortcode_atts(array(
    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post->ID,
    'itemtag'    => '',
    'icontag'    => '',
    'captiontag' => '',
    'columns'    => 3,
    'size'       => 'thumbnail',
    'include'    => '',
    'exclude'    => ''
  ), $attr));

  $id = intval($id);

  if ($order === 'RAND') {
    $orderby = 'none';
  }

  if (!empty($include)) {
    $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

    $attachments = array();
    foreach ($_attachments as $key => $val) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif (!empty($exclude)) {
    $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
  } else {
    $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
  }

  if (empty($attachments)) {
    return '';
  }

  if (is_feed()) {
    $output = "\n";
    foreach ($attachments as $att_id => $attachment) {
      $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    }
    return $output;
  }
  
    // load fancybox scripts
    wp_enqueue_script('prettyphotojs', get_template_directory_uri() . '/js/prettyphoto/jquery.prettyPhoto.js', array('jquery'));
    wp_enqueue_script('prettyphotoloader', get_template_directory_uri() . '/js/prettyphoto/loader.js', array('jquery'));
    wp_enqueue_style('prettyphotocss', get_template_directory_uri() . '/js/prettyphoto/css/prettyPhoto.css');

  $output = '<div class="thumbnails-gallery">';
  $output .= '<div class="row">';

  $i = 0;
  foreach ($attachments as $id => $attachment) {

    $link = '<a class="thumbnail" href="' . $attachment->guid . '" rel="gallery[image_gallery1]">';
    
    $output .= '<div class="' . GALLERY_SIZE .' ">' . $link;
    $output .= wp_get_attachment_image($attachment->ID, $size);
    if (trim($attachment->post_excerpt)) {
      $output .= '<div class="caption hidden">' . wptexturize($attachment->post_excerpt) . '</div>';
    }
    $output .= '</a>';
    $output .= '</div>';    
  }

  $output .= '</div>';
  $output .= '</div>';

  return $output;
}

/**
 * Intro text shortcode [intro]
 */
function intro_text_shortcode($atts, $content = null)
{
	return '<p class="lead">'.$content.'</p>';
}


/**
 * HR shortcode [hr]
 */
function hr_shortcode($atts, $content = null)
{
	return '<hr class="divider-line" />';
}



/**
 * Renders bootstrap buttons
 * @param array $atts
 * @param string $content
 */
function buttons( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'type' => 'default', /* primary, default, info, success, danger, warning, inverse */
			'size' => '', /* small, medium, large */
			'pageid' => '',
			'url'  => '',
			'text' => '',
	), $atts ) );

	$type = "btn-" . $type;

	if($size == ""){
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
 * childpages shortcode renders a list of childpages 'list' 'grid' 'tabs' 'tabs-accordion' 'accordion' 'heading-accordion'=================================
 * @param array $atts
 * @param string $content
 */
function childpages($atts, $content = null)
{
	// set defaults
	global $post;
	$id = $post->ID;
	$layout = 'list';
				
	if(is_array($atts)) // see if we have been provided with paramaters
	{
		if(array_key_exists('id', $atts)) // if we have a post ID, use it
			$id = $atts['id'];
		
		if(array_key_exists('layout', $atts)) // if we have a layout, use it
			$layout = $atts['layout'];

	}

	$args = array(
			'post_parent' => $post->ID,
			'post_type' => 'page',
			'order' => 'ASC',
			'orderby' => 'menu_order'

	);

	// get all attachments
	$childpages = new wp_query($args);
	
	ob_start();
	if($layout == 'thumbnails') //grid shortcode
	{
		require( get_template_directory() . '/parts/shortcodes/childpages-thumbnails.php' );
	}
	
	elseif($layout == 'tabs') //tabs shortcode

	{
	
		require( get_template_directory() . '/parts/shortcodes/childpages-tabs.php' );
	
	}

	elseif($layout == 'accordions') //tabs accordion shortcode	
	{
	
		require( get_template_directory() . '/parts/shortcodes/childpages-accordions.php' );

	}//end accordion
		
	elseif($layout == 'snippets')
	{
	
		require( get_template_directory() . '/parts/shortcodes/childpages-snippets.php');
            
	}//end snippet
	
	elseif($layout == 'panels')
	{
	
		require( get_template_directory() . '/parts/shortcodes/childpages-panels.php');
            
	}//end panel

	
	else 
	{
        require( get_template_directory() . '/parts/shortcodes/childpages-list.php' );
	}
        
    wp_reset_query();
	return ob_get_clean();
}

//================================ end childpages shortcode stuff ====================================

function pages_shortcode($atts, $content = null) {

	if(is_array($atts))
	{
		if(array_key_exists('ids', $atts))
		{
			//global $page_ids; 
			$page_ids = array();
			$page_ids = explode(',', $atts['ids']);
            
            // get the posts
            $args = array(
                'post__in' => $page_ids,
                'post_type' => 'page',
                'order' => 'ASC',
                'orderby' => 'menu_order'
            
            );
            $pages = new wp_query($args);

            ob_start();
            require( get_template_directory() . '/parts/shortcodes/pages.php' );
            wp_reset_query();
            return ob_get_clean();
		}
	}			
}//end function

//shortcode for bio column structures
function columns_shortcode($atts, $content = null) {
	global $post;
	
	$excerpt = $post->post_excerpt;
	
	return '<div class="columns">' . do_shortcode($content) . '</div>';
}

/**
 * Renders a bootstrap panel.  Option to provide a type (to affect the panel's class), header content or footer content
 */
function panels_shortcode($atts, $content = null) {
    if(!$content)
        return false;
    
    $type = (array_key_exists('style', $atts) ? 'panel-' . $atts['style'] : 'panel-default');
    // get the markup
    $html = '<div class="panel '.$type.'">';
    $html .= (array_key_exists('header', $atts) ? '<div class="panel-heading"><h3 class="panel-title>"'.$atts['header'].'</h3></div>' : ''); // render a header if we need one   
    $html .= '<div class="panel-body">' . $content .'</div>'; // render the main body content
    $html .= (array_key_exists('footer', $atts) ? '<div class="panel-footer">'.$atts['footer'].'</div>' : ''); // render a footer if we need one
    $html .= '</div>'; 
    
    return $html;
}


// load shortcodes
add_shortcode('icon', 'bootstrap_glyph_icons');
add_shortcode('contact', 'contact_us_shortcode');
add_shortcode('gallery', 'monolith_gallery');
add_shortcode('intro', 'intro_text_shortcode');
add_shortcode('button', 'buttons');
add_shortcode('alert', 'alerts');
add_shortcode('blockquote', 'blockquotes');
add_shortcode('childpages', 'childpages');
add_shortcode('pages', 'pages_shortcode');
add_shortcode('columns', 'columns_shortcode');
add_shortcode('panel', 'panels_shortcode');
add_shortcode('divider', 'hr_shortcode'); // hr divider shortcode
?>