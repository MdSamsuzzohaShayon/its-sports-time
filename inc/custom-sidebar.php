<?php
/**
 * Theme sidebar
 */


class Sidebars{
    public function __construct(){
        $this->setup_hooks();
    }

    protected function setup_hooks(){
        add_action('widgets_init', [$this, 'register_sidebars']);
    }

    public function register_sidebars(){
        register_sidebar( array(
            'name'          => __( 'Main Sidebar', 'thesportsanctum' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'thesportsanctum' ),
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h2 class="widgettitle">',
            'after_title'   => '</h2>',
        ) );

    }
}

$sidebar = new Sidebars();


?>
