<?php

/**
 * add_theme_support( string $feature, mixed $args ): void|false
 * Registers theme support for a given feature.
 *
 * Must be called in the theme’s functions.php file to work.
 * If attached to a hook, it must be ‘after_setup_theme’.
 * The ‘init’ hook may be too late for some features.
 *
 * Reference: https://developer.wordpress.org/reference/functions/add_theme_support/
 */

// Ensure the theme supports various features
function itssportstime_theme_setup() {
    add_theme_support( 'post-thumbnails' ); // General support for post thumbnails
    add_theme_support('title-tag'); // Support for title tag
    add_theme_support('widgets'); // Support for widgets
    add_theme_support( 'custom-logo', array(
        'height' => 40,
        'width' => 100,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Additional image sizes
    add_image_size( 'category-thumb', 800, 99999999 ); // 800 pixels wide (and unlimited height)
    add_image_size( 'sport-large', 800, 400, false );
    add_image_size( 'sport-small', 300, 200, true );
    add_theme_support('custom-header', array(
        'default-image' => get_template_directory_uri() . '/assets/img/default-bg.jpg',
        'default-text-color' => 'white',
        'flex-width' => true,
        'flex-height' => true,
    ));
}
add_action( 'after_setup_theme', 'itssportstime_theme_setup' );

/**
 * @return void
 * Enqueues a CSS stylesheet.
 * Registers the style if source provided (does NOT overwrite) and enqueues.
 * Reference: https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 */
function itssportstime_enqueue_style(){
    // Fonts
    /*
    wp_enqueue_style( 'bellefier-font', get_theme_file_uri("/assets/fonts/Bellefair-Regular.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'tommana-regualr-font', get_theme_file_uri("/assets/fonts/Timmana-Regular.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'elmessiri-regular-font', get_theme_file_uri("/assets/fonts/ElMessiri-Regular.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'elmessiri-bold-font', get_theme_file_uri("/assets/fonts/ElMessiri-Bold.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'playfair-display-regular', get_theme_file_uri("/assets/fonts/PlayfairDisplay-Regular.ttf"), array(), '1.0.0' );
    */

    wp_enqueue_style( 'roboto-black', get_theme_file_uri("/assets/fonts/Roboto-Black.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'roboto-blackitalic', get_theme_file_uri("/assets/fonts/Roboto-BlackItalic.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'roboto-bold', get_theme_file_uri("/assets/fonts/Roboto-Bold.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'roboto-bolditalic', get_theme_file_uri("/assets/fonts/Roboto-BoldItalic.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'roboto-italic', get_theme_file_uri("/assets/fonts/Roboto-Italic.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'roboto-light', get_theme_file_uri("/assets/fonts/Roboto-Light.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'roboto-lightitalic', get_theme_file_uri("/assets/fonts/Roboto-LightItalic.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'roboto-regular', get_theme_file_uri("/assets/fonts/Roboto-Regular.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'roboto-medium', get_theme_file_uri("/assets/fonts/Roboto-Medium.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'roboto-mediumitalic', get_theme_file_uri("/assets/fonts/Roboto-MediumItalic.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'roboto-thin', get_theme_file_uri("/assets/fonts/Roboto-Thin.ttf"), array(), '1.0.0' );
    wp_enqueue_style( 'roboto-thinitalic', get_theme_file_uri("/assets/fonts/Roboto-ThinItalic.ttf"), array(), '1.0.0' );

    // Icons
    wp_enqueue_style( 'bootstrap-icons', get_theme_file_uri("/assets/icon/bootstrap-icons/bootstrap-icons.css"), array(), '1.0.0' );
    // CSS
    wp_enqueue_style( 'stylesheet', get_stylesheet_uri());
    wp_enqueue_style( 'custom-bootstrap-and-main', get_theme_file_uri("/assets/css/style.css"), array(), '1.0.0' );
}
add_action("wp_enqueue_scripts", "itssportstime_enqueue_style");



function itssportstime_enqueue_script(){
//    wp_enqueue_script( 'bootstrap-js', get_theme_file_uri("/assets/js/bootstrap.bundle.min.js"), array(), '5.0.0' );
    wp_enqueue_script( 'axios-js', 'https://unpkg.com/axios/dist/axios.min.js', array(), '5.0.0' );
    wp_enqueue_script( 'bootstrap-js', get_theme_file_uri('/assets/js/bootstrap.min.js'), array(), '5.0.0' );
    wp_enqueue_script( 'bootstrap-interactivity-js', get_theme_file_uri("/assets/js/BootstrapInteractivity.js"), array(), '1.0.0' );
    wp_enqueue_script( 'main-js', get_theme_file_uri("/assets/js/dist/main.min.js"), array(), '1.0.0' );
}
add_action("wp_enqueue_scripts", "itssportstime_enqueue_script");





//require_once(get_template_directory() . "/inc/custom-sidebar.php");
require_once(get_template_directory() . "/inc/popular-posts.php");
require_once(get_template_directory() . "/inc/custom-post-type.php");
// MAIN MENU WITH FILTERS - main-menu-filter-register
require_once(get_template_directory() . "/inc/menu-registration-filter.php");
require_once(get_template_directory() . "/inc/customize-author-information.php");
new itssportstime_Author_Customizer();
require_once(get_template_directory() . "/inc/menu-walker-class.php");
require_once(get_template_directory() . "/inc/comments-walker-class.php");
require_once(get_template_directory() . "/inc/customize-header-caption.php");
require_once(get_template_directory() . "/inc/customize-pagination.php");

require_once(get_template_directory() . "/inc/form-submission.php");
require_once(get_template_directory() . "/inc/newsletter-subscribe.php");



















?>
