<?php
/**
 * @function this function will be used in single.php to get the viewer from the post
 */
function itssportstime_save_post_views($postID)
{
    $metaKey = 'ist_post_views';
    $views = get_post_meta($postID, $metaKey, true);

    $count = (empty($views) ? 0 : $views);
    $count++;
    update_post_meta($postID, $metaKey, $count);
}

// Removes a callback function from an action hook.
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**
 * @sidebar Popular posts sidebar
 */
function itssportstime_popular_post_sidebar()
{
    register_sidebar(array(
        'name' => __('Popular sidebar', 'itssportstime'),
        'id' => 'sidebar-popular',
        'description' => __('Widgets in this area will be shown on all popular posts.', 'itssportstime'),
        'before_widget' => '',
        'after_widget' => '',
    ));
}

add_action('widgets_init', 'itssportstime_popular_post_sidebar');

/**
 * @widget for registering a widget and add different properties to widgets
 */
class IST_Popular_Posts_Widgets extends WP_Widget
{
    /**
     * Sets up the widgets name etc.
     */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'ist-popular-posts-widgets',
            'description' => 'Popular Posts Widgets',
        );
        parent::__construct('popular_posts', 'IST Popular Posts', $widget_ops);
    }

    /**
     * Outputs the content of the widget
     * Front-end of the widget
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        // outputs the content of the widget
        $tot = absint($instance['tot']);
        $post_args = array(
            'post_type' => 'post',
            'posts_per_page' => $tot,
            'meta_key' => 'ist_post_views',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        );

        $post_query = new WP_Query($post_args);
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo "<h2 class='text-danger mb-5 sec-heading'>" . apply_filters('widget_title', $instance['title']) . "</h2>";
        }

        if ($post_query->have_posts()) {
            echo '<ol class="list-group">';
            while ($post_query->have_posts()) : $post_query->the_post();
                echo '<li class="list-group-item d-flex justify-content-start align-items-start bg-transparent">
                        <a href="' . get_permalink() . '" class="text-decoration-none w-100 ms-2">
                            <div class="ms-2 me-auto">
                                <h3 class="text-white">' . get_the_title() . '</h3>
                                <small class="text-white">Posted: ' . get_the_modified_date('F j, Y') . ' at ' . get_the_modified_date('g:i a') . '</small>
                            </div>
                        </a>
                    </li>';
            endwhile;
            echo '</ol>';
        } else {
            echo "<p>No Post</p>";
        }
        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance)
    {
        $title = (!empty($instance['title']) ? $instance['title'] : 'Popular Posts');
        $tot = (!empty($instance['tot']) ? absint($instance['tot']) : 4); // How many posts are going to display

        $output = '<p>';
        $output .= '<label for="' . esc_attr($this->get_field_id('title')) . '">Title </label>';
        $output .= '<input type="text" class="widefat" id="' . esc_attr($this->get_field_id('title')) . '" name="' . esc_attr($this->get_field_name('title')) . '" value="' . esc_attr($title) . '" />';
        $output .= '</p>';

        $output .= '<p>';
        $output .= '<label for="' . esc_attr($this->get_field_id('tot')) . '">Number of Posts </label>';
        $output .= '<input type="number" class="widefat" id="' . esc_attr($this->get_field_id('tot')) . '" name="' . esc_attr($this->get_field_name('tot')) . '" value="' . esc_attr($tot) . '" />';
        $output .= '</p>';

        echo $output;
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     *
     * @return array
     */
    public function update($new_instance, $old_instance)
    {
        // processes widget options to be saved
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ? strip_tags($new_instance['title']) : '');
        $instance['tot'] = (!empty($new_instance['tot']) ? absint(strip_tags($new_instance['tot'])) : 0);
        return $instance;
    }
}

add_action('widgets_init', function () {
    register_widget('IST_Popular_Posts_Widgets');
});
?>
