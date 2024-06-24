<?php



function thesportsanctum_register_menus(){
    register_nav_menus( array(
        'top_menu' => __( 'Top Menu', 'thesportsanctum' ),
        'main_menu'  => __( 'Main Menu', 'thesportsanctum' ),
        'feature_menu'  => __( 'Feature Menu', 'thesportsanctum' ),
        'social_menu'  => __( 'Social Menu', 'thesportsanctum' ),
        // 'footer_menu'  => __( 'Footer Menu', 'thesportsanctum' ),
    ) );
}
add_action( 'after_setup_theme', 'thesportsanctum_register_menus', 0 );

function add_additional_li_class($classes, $item, $args){
    /**
     * @params add_li_class is now available in wp_nav_menu array
     */
    if(isset($args->add_li_class)){
//        $classes[] = $args->add_li_class;
        $classes = array();
        $classes[] = $args->add_li_class;

    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_li_class', 1, 3);

/*
function clear_nav_menu_item_id($id, $item, $args) {
    return "";
}
add_filter('nav_menu_item_id', 'clear_nav_menu_item_id', 10, 3);
*/



function add_additional_a_class($atts, $item, $args){
    /**
     * @params add_a_class is now available in wp_nav_menu array
     */
    if(isset($args->add_a_class)){
        $atts['class'] = $args->add_a_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_additional_a_class', 1, 3);


?>
