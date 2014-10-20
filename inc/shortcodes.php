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
    wp_enqueue_script('prettyphotojs', get_template_directory_uri() . '/library/bower_components/jquery-prettyphoto/js/jquery.prettyPhoto.js', array('jquery'));
    wp_enqueue_script('prettyphotoloader', get_template_directory_uri() . '/js/prettyphoto-loader.js', array('jquery'));
    wp_enqueue_style('prettyphotocss', get_template_directory_uri() . '/library/bower_components/jquery-prettyphoto/css/prettyPhoto.css');

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
			'orderby' => 'menu_order',
			'posts_per_page' => -1

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



function kitchensink_shortcode($atts, $content = null) {

	return '
	
	<hr /><code>Typo</code><hr />
	
	<h1>Heading One</h1>
	<h2>Heading Two</h2>
	<h3>Heading Three</h3>
	<h4>Heading Four</h4>
	<h5>Heading Five</h5>
	<h6>Heading Six</h6>
	<p class="lead">Hello I am lead text</p>
	
	<hr /><code>Table</code><hr />
	
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>#</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Username</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Mark</td>
				<td>Otto</td>
				<td>@mdo</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
			</tr>
			<tr>
				<td>3</td>
				<td colspan="2">Larry the Bird</td>
				<td>@twitter</td>
			</tr>
		</tbody>
	</table>	
	<hr />
	
	<hr /><code>Form</code><hr />
	
	<form role="form">
		<div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		</div>
		<div class="form-group">
			<label for="exampleInputFile">File input</label>
			<input type="file" id="exampleInputFile">
			<p class="help-block">Example block-level help text here.</p>
		</div>
		<div class="checkbox">
			<label>
				<input type="checkbox"> Check me out
			</label>
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>	
	
	<hr /><code>Buttons</code><hr />
	
	<!-- Standard button -->
	<button type="button" class="btn btn-default">Default</button>
	
	<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
	<button type="button" class="btn btn-primary">Primary</button>
	
	<!-- Indicates a successful or positive action -->
	<button type="button" class="btn btn-success">Success</button>
	
	<!-- Contextual button for informational alert messages -->
	<button type="button" class="btn btn-info">Info</button>
	
	<!-- Indicates caution should be taken with this action -->
	<button type="button" class="btn btn-warning">Warning</button>
	
	<!-- Indicates a dangerous or potentially negative action -->
	<button type="button" class="btn btn-danger">Danger</button>
	
	<!-- Deemphasize a button by making it look like a link while maintaining button behavior -->
	<button type="button" class="btn btn-link">Link</button>	
	
	<hr /><code>Images</code><hr />
	
	<img src="holder.js/100x100" class="img-rounded">
	<img src="holder.js/100x100" class="img-circle">
	<img src="holder.js/100x100" class="img-thumbnail">	
	
	<hr /><code>Thumbnails</code><hr />
	
	<div class="row">
	  <div class="col-sm-6 col-md-3">
	    <a href="#" class="thumbnail">
	      <img data-src="holder.js/100%x180" alt="...">
	    </a>
	  </div>
	  <div class="col-sm-6 col-md-3">
	    <a href="#" class="thumbnail">
	      <img data-src="holder.js/100%x180" alt="...">
	    </a>
	  </div>
	  <div class="col-sm-6 col-md-3">
	    <a href="#" class="thumbnail">
	      <img data-src="holder.js/100%x180" alt="...">
	    </a>
	  </div>
	</div>	
	
	<hr /><code>Jumbotron</code><hr />
	
	<div class="jumbotron">
	  <h1>Hello, world!</h1>
	  <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
	  <p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
	</div>	
	
	<hr /><code>Alert</code><hr />
	
	<div class="alert alert-success">Well done! You successfully read this important alert message.</div>
	<div class="alert alert-info">Heads up! This alert needs your attention, but its not super important</div>
	<div class="alert alert-warning">Warning! Best check yo self, youre not looking too good.</div>
	<div class="alert alert-danger">Oh snap! Change a few things up and try submitting again.</div>	
	
	<hr /><code>Panels</code><hr />
	
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Panel title</h3>
	  </div>
	  <div class="panel-body">
	    Panel content
	  </div>
	</div>	
	
	<hr /><code>Well</code><hr />
	
	<div class="well">Look, Im in a well!</div>	
	
	<hr /><code>Tabs</code><hr />
	
	<!-- Nav tabs -->
	<ul class="nav nav-tabs">
	  <li><a href="#home" data-toggle="tab">Home</a></li>
	  <li><a href="#profile" data-toggle="tab">Profile</a></li>
	  <li><a href="#messages" data-toggle="tab">Messages</a></li>
	  <li><a href="#settings" data-toggle="tab">Settings</a></li>
	</ul>
	
	<!-- Tab panes -->
	<div class="tab-content">
	  <div class="tab-pane active" id="home">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede..</div>
	  <div class="tab-pane" id="profile">Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus..</div>
	  <div class="tab-pane" id="messages">Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</div>
	  <div class="tab-pane" id="settings">Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit. Pellentesque egestas sem. Suspendisse commodo ullamcorper magna.</div>
	</div>	
	
	<hr /><code>Alerts Dismiss</code><hr />
	
	  <div class="alert alert-danger fade in">
	    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	    <h4>Oh snap! You got an error!</h4>
	    <p>Change this and that and try again. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum.</p>
	    <p>
	      <button type="button" class="btn btn-danger">Take this action</button>
	      <button type="button" class="btn btn-default">Or do this</button>
	    </p>
	  </div>
	  
	<hr /><code>Accordion</code><hr />


	<div class="panel-group" id="accordion">
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
	          Collapsible Group Item #1
	        </a>
	      </h4>
	    </div>
	    <div id="collapseOne" class="panel-collapse collapse in">
	      <div class="panel-body">
	        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
	      </div>
	    </div>
	  </div>
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
	          Collapsible Group Item #2
	        </a>
	      </h4>
	    </div>
	    <div id="collapseTwo" class="panel-collapse collapse">
	      <div class="panel-body">
	        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
	      </div>
	    </div>
	  </div>
	  <div class="panel panel-default">
	    <div class="panel-heading">
	      <h4 class="panel-title">
	        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
	          Collapsible Group Item #3
	        </a>
	      </h4>
	    </div>
	    <div id="collapseThree" class="panel-collapse collapse">
	      <div class="panel-body">
	        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
	      </div>
	    </div>
	  </div>
	</div>	  
	
	
	';
	
}


// load shortcodes
add_shortcode('kitchensink', 'kitchensink_shortcode');
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