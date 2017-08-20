<?php

class Kxxx_History_Widget extends WP_Widget{


    function __construct()
    {
//        parent::__construct($id_base, $name, $widget_options, $control_options);
        parent::__construct("kxxx-history-widget", '浏览记录');
//        add_action('widgets_init', function(){
//            register_widget('Kxxx_History_Widget');
//        });
    }



    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );


    public function widget( $args, $instance ) {

        $history = 0;
        if(isset($_COOKIE['i_history'])){
            $history = $_COOKIE['i_history'];
        }
        if($history){
            echo $args['before_widget'];
            if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
            }
            $historyArr = array();
            echo '<ul id="kxxx-history-posts">';
            $historyArr = explode(',', $history);
            foreach ($historyArr as $key => $post_id){
                $post   = get_post($post_id);
                $title = $post->post_title;
                echo '<li class="kxxx-history-title"> <a href="' . $post->guid . '" target="_blank">' . $title . '</a></li>';
                if($key == 5){
                    break;
                }
            }
            echo '</ul>';
            echo $args['after_widget'];
        }


//        echo '<div class="textwidget">';
//
//        echo esc_html__( $instance['text'], 'text_domain' );
//
//        echo '</div>';


    }

    public function form( $instance ) {

        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'text_domain' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <?php

    }

    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';

        return $instance;
    }

}
