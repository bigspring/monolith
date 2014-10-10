<?php
class Builder
{
    public $layout = 'list';
    public $query = null;
    public $args = array();
    public $default_args = array(
        'columns' => 3,
        'classes' => ''
    );

    public function __construct($layout = null, &$query = null, $args = null)
    {
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
            $this->query = $wp_query;
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
        $loop = &$this->query;
        $args = &$this->args;
        $snippet_size = GRID_SIZE / $args['columns']; // work out span based on columns

        $template_path = dirname(__FILE__) . '/../';
        $layout_file = $template_path . 'parts/builder/organisms/' . $this->layout . '.php';

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