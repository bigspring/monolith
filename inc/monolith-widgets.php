<?php

add_action( 'widgets_init', function () {
  register_widget( 'MonolithRelativePagesWidget' );
} );

class MonolithRelativePagesWidget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    // widget actual processes
    parent::__construct(
      'monolith_relative_pages_widget',
      __( 'Monolith Relative Pages', 'accu-translations' ),
      array( 'description' => __( 'Display relatives of current page.', 'accu-translations' ), )
    );
  }

  /**
   * Front-end display of widget.
   *
   * @param array $args Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    // outputs the content of the widget

    $title = apply_filters( 'monolith_upcoming_events_widget', $instance['title'] );
    $page  = apply_filters( 'monolith_upcoming_events_widget', $instance['page'] );

    if ( $page ) {
      $post = get_post( $page );
    } else {
      global $post;
    }

    $children     = get_pages( 'child_of=' . $post->ID ); // get all child pages
    $has_children = ( $children ) ? true : false; // check if this page has children
    $has_parent   = ( $post->post_parent ) ? true : false; // check if it has a parent

    // now conditionally display the menu depending on the parent / child conditions
    if ( $has_children ) {
      $output = wp_list_pages( array( 'child_of'    => $post->ID,
                                      'echo'        => 0,
                                      'depth'       => 1,
                                      'title_li'    => '',
                                      'sort_column' => 'menu_order, post_title'
      ) );
      //$title = get_the_title();
      $parent_link = get_permalink( $post->ID );
    } elseif ( $has_parent ) {
      $output = wp_list_pages( array( 'child_of'    => $post->post_parent,
                                      'echo'        => 0,
                                      'depth'       => 1,
                                      'title_li'    => '',
                                      'sort_column' => 'menu_order, post_title'
      ) );
      //$title = get_the_title($post->post_parent);
      $parent_link = get_permalink( $post->post_parent );
    }

    echo $args['before_widget'];

    if ( $has_children || $has_parent ) : ?>

      <div class="widget">
        <?php if ( $title ) : ?>
          <h3><?= $title ?></h3>
        <?php endif; ?>
        <ul class="chevron">
          <?php $class = ( ! $has_parent ) ? ' class="current_page_item"' : ''; ?>
          <?= $output; ?>
        </ul>
      </div>

    <?php endif;

    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance The widget options
   * @param array $instance Previously saved values from database.
   *
   * @return string|void (DO NOT RETURN ANYTHING HERE THOUGH)
   */
  public function form( $instance ) {
    // outputs the options form on admin

    $page  = ( isset( $instance['page'] ) ) ? $instance['page'] : __( '' );
    $title = ( isset( $instance['title'] ) ) ? $instance['title'] : __( '' );

    ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
             name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"
             value="<?php echo esc_attr( $title ); ?>"/>

      <label for="<?php echo $this->get_field_id( 'page' ); ?>"><?php _e( 'Specify Page' ); ?></label>
      <select class="widefat" id="<?php echo $this->get_field_id( 'page' ); ?>"
              name="<?php echo $this->get_field_name( 'page' ); ?>">
        <option value="0"<?= ( (int) esc_attr( $page ) === 0 ) ? ' selected' : '' ?>><?php _e( 'Current', 'monolith' ); ?></option>
        <?php foreach ( get_pages() as $p ) : ?>
          <option
            value="<?= $p->ID ?>"<?= ( (int) esc_attr( $page ) === (int) $p->ID ) ? ' selected' : '' ?>><?= $p->post_title ?></option>
        <?php endforeach; ?>
      </select>
    </p>

    <?php

  }

  /**
   * Processing widget options on save
   *
   * @param array $new_instance The new options
   * @param array $old_instance The previous options
   *
   * @return array|void
   */
  public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
    $instance          = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['page']  = ( ! empty( $new_instance['page'] ) ) ? strip_tags( $new_instance['page'] ) : '';

    return $instance;
  }
}
