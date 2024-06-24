<?php
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    add_theme_support('title-tag');
    add_theme_support('widgets');
    add_theme_support( 'post-thumbnails', array( 'carousel' ) );
    set_post_thumbnail_size( 150, 150, true ); // default Featured Image dimensions (cropped)
    add_theme_support( 'custom-logo', array(
        'height' => 40,
        'width' => 100,
        'flex-height'          => true,
        'flex-width'           => true,
    ));





    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'category-thumb', 800, 99999999 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'sport-large', 800, 400, false );
    add_image_size( 'sport-small', 300, 200, true );
    add_theme_support('custom-header', array(
        "default-image" => get_template_directory_uri() . '/assets/img/default-bg.jpg'  ,
        'default-text-color' => 'white',
        'flex-width'         => true,
        'flex-height'        => true,
    ));
}





// ENQUEUE
function thesportsanctum_enqueue_style(){
    // Fonts
    // wp_enqueue_style( 'bellefier-font', get_theme_file_uri("/assets/fonts/Bellefair-Regular.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'tommana-regualr-font', get_theme_file_uri("/assets/fonts/Timmana-Regular.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'elmessiri-regular-font', get_theme_file_uri("/assets/fonts/ElMessiri-Regular.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'elmessiri-bold-font', get_theme_file_uri("/assets/fonts/ElMessiri-Bold.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'playfair-display-regular', get_theme_file_uri("/assets/fonts/PlayfairDisplay-Regular.ttf"), array(), '1.0.0' );

    // Icons
    wp_enqueue_style( 'bootstrap-icons', get_theme_file_uri("/assets/icon/bootstrap-icons/bootstrap-icons.css"), array(), '1.0.0' );
    // CSS
    wp_enqueue_style( 'stylesheet', get_stylesheet_uri());
    wp_enqueue_style( 'custom-bootstrap-and-main', get_theme_file_uri("/assets/css/style.css"), array(), '1.0.0' );
}
add_action("wp_enqueue_scripts", "thesportsanctum_enqueue_style");



function thesportsanctum_enqueue_script(){
//    wp_enqueue_script( 'bootstrap-js', get_theme_file_uri("/assets/js/bootstrap.bundle.min.js"), array(), '5.0.0' );
    wp_enqueue_script( 'axios-js', 'https://unpkg.com/axios/dist/axios.min.js', array(), '5.0.0' );
    wp_enqueue_script( 'bootstrap-js', get_theme_file_uri('/assets/js/bootstrap.min.js'), array(), '5.0.0' );
    wp_enqueue_script( 'main-js', get_theme_file_uri("/assets/js/main.js"), array(), '1.0.0' );
}
add_action("wp_enqueue_scripts", "thesportsanctum_enqueue_script");



//require_once(get_template_directory() . "/inc/custom-sidebar.php");
require_once(get_template_directory() . "/inc/popular-posts.php");



require_once(get_template_directory() . "/inc/custom-post-type.php");




// MAIN MENU WITH FILTERS - main-menu-filter-register
require_once(get_template_directory() . "/inc/menu-registration-filter.php");


require_once(get_template_directory() . "/inc/customize-author-information.php");
new TheSportSanctum_Author_Customizer();




require_once(get_template_directory() . "/inc/menu-walker-class.php");

require_once(get_template_directory() . "/inc/comments-walker-class.php");


require_once(get_template_directory() . "/inc/customize-header-caption.php");

require_once(get_template_directory() . "/inc/customize-pagination.php");


require_once(get_template_directory() . "/inc/form-submission.php");


















?>
