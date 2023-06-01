<?php

/**
 * Plugin Name: First Widget
 * Plugin URI: http://wp-local.com/
 * Description: This is the very first plugin I ever created.
 * Version: 1.0
 * Author: HieuPT
 * Author URI: http://wp-local.com/
 **/

class FirstWidget extends \WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            // widget ID
            'hstngr_widget',
            // widget name
            'Hieupt',
            // widget description
            array ( 'description' => __( 'Hostinger Widget Tutorial', 'hstngr_widget_domain' ), )
        );
    }

    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $args['before_widget'];
        //if title is present
        If ( ! empty ( $title ) )
            Echo $args['before_title'] . $title . $args['after_title'];
        //output
        echo __( 'First widget by hieupt', 'hstngr_widget_domain' );
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) )
            $title = $instance[ 'title' ];
        else
            $title = __( 'Default Title', 'hstngr_widget_domain' );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}


add_action( 'widgets_init', 'hstngr_register_widget' );
function hstngr_register_widget() {
    register_widget( 'FirstWidget' );
}