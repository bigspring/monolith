<?php
add_action( 'after_setup_theme', 'monolith_setup' );
add_filter('wp_nav_menu', 'roots_wp_nav_menu');
remove_action('wp_head', 'wp_generator');

function monolith_setup() {

	add_action( 'init', 'register_menu' );
	add_action( 'wp_enqueue_scripts', 'script_enqueuer' );
	add_theme_support('post-thumbnails');

	function register_menu(){
		register_nav_menu( 'top-bar', 'Primary Navigation' );
	}
	
	/**
	 * Adds required scripts to the header
	 */
	function script_enqueuer() {

        wp_enqueue_script('jquery');

		//if we enabled custom js, load the file
		if(CUSTOM_JS)
		{
			wp_register_script( 'site-js', get_template_directory_uri().'/js/site.js');
			wp_enqueue_script( 'site-js' );
		}
	}
	
	class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {


		function start_lvl( &$output, $depth ) {
			$indent = str_repeat( "\t", $depth );
			$output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";

		}

		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$li_attributes = '';
			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = ($args->has_children) ? 'dropdown' : '';
			$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
			$classes[] = 'menu-item-' . $item->ID;


			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			$class_names = ' class="' . esc_attr( $class_names ) . '"';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

			if ( !$element )
				return;

			$id_field = $this->db_fields['id'];

			//display this element
			if ( is_array( $args[0] ) )
				$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
			else if ( is_object( $args[0] ) )
				$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
			$cb_args = array_merge( array(&$output, $element, $depth), $args);
			call_user_func_array(array(&$this, 'start_el'), $cb_args);

			$id = $element->$id_field;

			// descend only when the depth is right and there are childrens for this element
			if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

				foreach( $children_elements[ $id ] as $child ){

					if ( !isset($newlevel) ) {
						$newlevel = true;
						//start the child delimiter
						$cb_args = array_merge( array(&$output, $depth), $args);
						call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
					}
					$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
				}
				unset( $children_elements[ $id ] );
			}

			if ( isset($newlevel) && $newlevel ){
				//end the child delimiter
				$cb_args = array_merge( array(&$output, $depth), $args);
				call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
			}

			//end this element
			$cb_args = array_merge( array(&$output, $element, $depth), $args);
			call_user_func_array(array(&$this, 'end_el'), $cb_args);

		}
	}
	
	/**
     * Cleaner walker for wp_nav_menu()
     *
     * Walker_Nav_Menu (WordPress default) example output:
     *   <li id="menu-item-8" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-8"><a href="/">Home</a></li>
     *   <li id="menu-item-9" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9"><a href="/sample-page/">Sample Page</a></l
     *
     * Roots_Nav_Walker example output:
     *   <li class="menu-home"><a href="/">Home</a></li>
     *   <li class="menu-sample-page"><a href="/sample-page/">Sample Page</a></li>
     */
    class Monolith_Nav_Walker extends Walker_Nav_Menu {
        
        /**
         * @see Walker::start_lvl()
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param int $depth Depth of page. Used for padding.
         */
        function start_lvl( &$output, $depth ) {

            $indent = str_repeat( "\t", $depth );
            $output    .= "\n$indent<ul class=\"dropdown-menu\">\n";
                    
        }
    
        /**
         * @see Walker::start_el()
         * @since 3.0.0
         *
         * @param string $output Passed by reference. Used to append additional content.
         * @param object $item Menu item data object.
         * @param int $depth Depth of menu item. Used for padding.
         * @param int $current_page Menu item ID.
         * @param object $args
         */
    
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            global $wp_query;
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    
            if (strcasecmp($item->title, 'divider')) {
                $class_names = $value = '';
                $classes = empty( $item->classes ) ? array() : (array) $item->classes;
                $classes[] = ($item->current) ? 'active' : '';
                $classes[] = 'menu-item-' . $item->ID;
                $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
                
                if ($args->has_children && $depth > 0) {
                    $class_names .= ' dropdown-submenu';
                } else if($args->has_children && $depth === 0) {
                    $class_names .= ' dropdown';
                }
    
                $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    
                $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
                $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    
                $output .= $indent . '<li' . $id . $value . $class_names .'>';
    
                $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
                $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
                $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
                $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
                $attributes .= ($args->has_children)        ? ' data-toggle="dropdown" data-target="#" class="dropdown-toggle"' : '';
    
                $item_output = $args->before;
                $item_output .= '<a'. $attributes .'>';
                $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
                $item_output .= ($args->has_children && $depth == 0) ? ' <span class="caret"></span></a>' : '</a>';
                $item_output .= $args->after;
    
                $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            } else {
                $output .= $indent . '<li class="divider">';
            }
        }
    
    
        /**
         * Traverse elements to create list from elements.
         *
         * Display one element if the element doesn't have any children otherwise,
         * display the element and its children. Will only traverse up to the max
         * depth and no ignore elements under that depth. 
         *
         * This method shouldn't be called directly, use the walk() method instead.
         *
         * @see Walker::start_el()
         * @since 2.5.0
         *
         * @param object $element Data object
         * @param array $children_elements List of elements to continue traversing.
         * @param int $max_depth Max depth to traverse.
         * @param int $depth Depth of current element.
         * @param array $args
         * @param string $output Passed by reference. Used to append additional content.
         * @return null Null on failure with no changes to parameters.
         */
    
        function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
            
            if ( !$element ) {
                return;
            }
            
            $id_field = $this->db_fields['id'];
    
            //display this element
            if ( is_array( $args[0] ) ) 
                $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
            else if ( is_object( $args[0] ) ) 
                $args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
            $cb_args = array_merge( array(&$output, $element, $depth), $args);
            call_user_func_array(array(&$this, 'start_el'), $cb_args);
    
            $id = $element->$id_field;
    
            // descend only when the depth is right and there are childrens for this element
            if ( ($max_depth == 0 || $max_depth > $depth ) && isset( $children_elements[$id]) ) {
    
                foreach( $children_elements[ $id ] as $child ){
    
                    if ( !isset($newlevel) ) {
                        $newlevel = true;
                        //start the child delimiter
                        $cb_args = array_merge( array(&$output, $depth), $args);
                        call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                    }
                    $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
                }
                    unset( $children_elements[ $id ] );
            }
    
            if ( isset($newlevel) && $newlevel ){
                //end the child delimiter
                $cb_args = array_merge( array(&$output, $depth), $args);
                call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
            }
    
            //end this element
            $cb_args = array_merge( array(&$output, $element, $depth), $args);
            call_user_func_array(array(&$this, 'end_el'), $cb_args);
        }
    }
}


/**
 * Replace various active menu class names with "active"
 */
function roots_wp_nav_menu($text) {
	$text = preg_replace('/(current(-menu-|[-_]page[-_])(item|parent|ancestor))/', 'active', $text);
	$text = preg_replace('/( active){2,}/', ' active', $text);
	return $text;
}