<?php
class Builder
{
    //private $template_path; // removed this while we see if the template_path var is useful.  will we ever re-use it?
    private $layouts_path;
    private $layout = 'list';
    private $query = null;
    private $args = array();
    private $loop = null;
    private $default_args = array(
        'columns' => 3,
        'classes' => ''
    );

    public function __construct($layout = null, $query = null, $args = null)
    {

        // removed this while we see if the template_path var is useful.  will we ever re-use it?
/*        $this->template_path = dirname(__FILE__) . '/../';
        $this->layouts_path = $this->template_path . 'layouts/';*/

        $this->layouts_path = dirname(__FILE__) . '/../' . 'layouts/';

        $this->layout = $layout ? $layout : 'list'; // get the layout or default to list
        $this->query = $query ? $query : null; // set the query object if we have one
        $this->args = $args ? $args : array(); // set our args if we have any

        $this->_set_loop(); // set the loop object
        $this->_set_args(); // set any custom arguments we have
        $this->_render(); // render the view
    }

    /**
     * Sets the loop object to be the supplied one, or the global wp_query object if not
     * @return bool
     */
    public function _set_loop()
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
    public function _set_args()
    {
        $this->args = array_merge($this->default_args, $this->args); // merge in any custom arguments we have

        // custom rules for special cases
        $this->args['classes'] = ' class="'. $this->args['classes'] . '"'; // we do this to make it easier to echo in a view

        return true;
    }

    /**
     * Echos the full layout
     * @return bool
     */
    public function _render()
    {
        $loop = &$this->loop;
        $args = &$this->args;
        $layouts_path = $this->layouts_path;
        $snippet_size = GRID_SIZE / $args['columns']; // work out span based on columns

        $layout_file = $this->layouts_path . '/organisms/' . $this->layout . '.php';

        ob_start();
        include($layout_file);
        echo ob_get_clean();

        return true;
    }
}

/**
 * Bootstrap function for this class so it can be called directly from a theme in Wordpress style
 * @param string|null $layout The layout file to use
 * @param array|null $args The arguments to be passed to the function
 * @param object|null $query The Wordpress WP_Query object to be used
 */
function get_builder_part($layout = null, $args = null, $query = null)
{
    new Builder($layout, $args, $query);
}