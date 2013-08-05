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
		$output .= '<button class="close" data-dismiss="alert">&times;</a>';
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
	if($layout == 'grid') //grid shortcode
	{
		require( get_template_directory() . '/parts/shortcodes/childpages-grid.php' );
	}
	
	elseif($layout == 'tabs') //tabs shortcode

	{
	
		require( get_template_directory() . '/parts/shortcodes/childpages-tabs.php' );
	
	}

	elseif($layout == 'tabs-accordion')//tabs accordion shortcode	
	{
		$count = 0;
	
		$html = '<div class="child-tabs">';
		$html .= '<ul class="nav nav-tabs">';
	
		foreach ($childpages AS $childpage)
		{
				
				$active = '';
				if ($count == 0) $active = 'class="active"';
				
				$html .= '<li '. $active . ' id="childpage-item-' . $childpage->ID .'">';
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
	
				$html .= '<div class="tab-pane ' . $active . '" id="childpage-item-' . $childpage->ID .'">';
				
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
		}

		elseif($layout == 'accordion')//accordion shortcode
		{
			$html .= '<div class="accordion" id="accordion">';
			foreach($childpages AS $childpage)
			{
				$html .= '<div id="childpage-item-' . $childpage->ID . '">';
				$html .= '<div class="accordion-group">';
				$html .= '<div class="accordion-heading">';
				$html .= '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$childpage->ID.'">';
				$html .= $childpage->post_title;
				$html .= '</a>';
				$html .= '</div>';
				$html .= '<div id="collapse'.$childpage->ID.'" class="accordion-body collapse">';
				$html .= '<div class="accordion-inner">';
				$html .= apply_filters('the_content', $childpage->post_content);
				$html .= '</div>';
				$html .= '</div>';
				$html .= '</div>';
				$html .= '</div>';

			}
			
			$html .= '</div>';
		}//end accordion
		
		elseif($layout == 'snippet')
		{
		
			require( get_template_directory() . '/parts/shortcodes/childpages-snippet.php');
                
		}//end snippet
		
		elseif($layout == 'heading-accordion')	
		{
			foreach ($childpages AS $childpage)
			{
		
					$html .= '<h3>' . $childpage->post_title . '</h3>';
					
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
					
			}
		}
		
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


// load shortcodes
add_shortcode('icon', 'bootstrap_glyph_icons');
add_shortcode('contact', 'contact_us_shortcode');
add_shortcode('gallery', 'monolith_gallery');
add_shortcode('intro', 'intro_text_shortcode');
add_shortcode('button', 'buttons');
add_shortcode('alert', 'alerts');
add_shortcode('block-message', 'block_messages');
add_shortcode('blockquote', 'blockquotes');
add_shortcode('childpages', 'childpages');
add_shortcode('pages', 'pages_shortcode');
add_shortcode('columns', 'columns_shortcode');
?>