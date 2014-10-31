<?php
class Builder
{
    private $layouts_path;
    private $layout = 'list';
    private $query = null;
    private $args = array();
    private $loop = null;
    private $default_args = array(
        'classes' => '',
        'size' => BLOCK_GRID_SIZE
    );

    public function __construct($layout = null, $args = null, $query = null)
    {
        $this->layouts_path = dirname(__FILE__) . '/../' . 'layouts/';

        $this->layout = $layout ? $layout : 'list'; // get the layout or default to list
        $this->query = $query ? $query : null; // set the query object if we have one
        $this->args = $args ? $args : array(); // set our args if we have any

        $this->_set_loop(); // set the loop object
        $this->_set_args(); // set any custom arguments we have

        echo $this->_render(); // render the view
    }

    /**
     * Sets the loop object to be the supplied one, or the global wp_query object if not
     * @return bool
     */
    private function _set_loop()
    {
        if(!$this->query) {
            global $wp_query;
            $this->loop = $wp_query;
        } else {
            $this->loop = new WP_Query($this->query);
        }

        return true;
    }

    /**
     * Sets up the arguments by merging in supplied args with default args, then applies any custom rules required
     * @return bool
     */
    private function _set_args()
    {

        $this->args = array_merge($this->default_args, $this->args); // merge in any custom arguments we have
        $this->args['classes'] = 'builder builder-'.$this->layout.' '. $this->args['classes']; // we do this to add all dynamically generated classes

        return true;
    }

    /**
     * Echos the full layout
     * @return bool
     */
    private function _render()
    {
        $loop = &$this->loop;
        $args = &$this->args;
        $layouts_path = $this->layouts_path;
        $layout_file = $this->layouts_path . 'organisms/' . $this->layout . '.php';

        ob_start();
        if(!@include($layout_file)) // if the file doesn't exist, display an alert on the front end
            return $this->_raise_alert('The layout file "'.$this->layout.'"could not be found');
        else // otherwise return the content
            return ob_get_clean();
    }

    /**
     * Function for returning an alert on failure
     * @param $message
     * @return string
     */
    private function _raise_alert($message)
    {
        // @TODO conditionally do this based on teh development / production mode
        return '<p class="alert-box alert">'.$message.'</p>';
    }
}

/**
 * Bootstrap function for this class so it can be called directly from a theme in Wordpress style
 * @param string|null $layout The layout file to use
 * @param array|null $args The arguments to be passed to the function
 * @param object|null $query The Wordpress WP_Query object to be used
 */
function build($layout = null, $args = null, $query = null)
{
    new Builder($layout, $args, $query);
}