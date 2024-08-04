<?php


/**
 * Post type registrations should not be hooked before the ‘init’ action. Also, any taxonomy connections should be registered via the $taxonomies argument to ensure consistency when hooks such as ‘parse_query’ or ‘pre_get_posts’ are used.
 * Post types can support any number of built-in core features such as meta boxes, custom fields, post thumbnails, post statuses, comments, and more. See the $supports argument for a complete list of supported features.
 * Reference: https://developer.wordpress.org/reference/functions/register_post_type/
 */
function itssportstime_stories(){
    register_post_type('stories', array(
        'labels' => array(
            'name' => __('Stories', 'itssportstime'),
            'singular_name' => __('Story', 'itssportstime'),
        ),
        'menu_icon' => 'dashicons-buddicons-pm',
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array( 'title', 'thumbnail', 'editor' ),
        'taxonomies' => array( 'post_tag', 'category' ), // Add support for categories and tags, 'category'
    ));
}

add_action('init', 'itssportstime_stories');


function itssportstime_stories_texonomy(){
    register_taxonomy('story_type', array('stories'), array(
        'labels' => array(
            'name' => __('Story Types', 'itssportstime'),
            'singular_name' => __('Story Type', 'itssportstime'),
            'search_items' => __('Search Story Types', 'itssportstime'),
            'all_items' => __('All Story Types', 'itssportstime'),
            'parent_item' => __('Parent Story Type', 'itssportstime'),
            'parent_item_colon' => __('Parent Story Type:', 'itssportstime'),
            'edit_item' => __('Edit Story Type', 'itssportstime'),
            'update_item' => __('Update Story Type', 'itssportstime'),
            'add_new_item' => __('Add New Story Type', 'itssportstime'),
            'new_item_name' => __('New Story Type Name', 'itssportstime'),
            'menu_name' => __('Story Types', 'itssportstime'),
        ),
        'public' => true,
        'hierarchical' => true, // Set to true if you want category-like behavior
        'show_in_rest' => true, // Important for Gutenberg
    ));
}
add_action('init', 'itssportstime_stories_texonomy');







/**
 * Add tournament post type for different tournament update
 */

function itssportstime_tournaments(){
    register_post_type('tournaments', array(
        'labels' => array(
            'name' => __('Tournaments', 'itssportstime'),
            'singular_name' => __('Tournament', 'itssportstime'),
        ),
        'menu_icon' => 'dashicons-table-row-before',
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array( 'title', 'thumbnail', 'editor' ),
        'taxonomies' => array( 'post_tag', 'category' ), // Add support for categories and tags, 'category'
    ));
}

add_action('init', 'itssportstime_tournaments');

/**
 * Register tournament type taxonomy
 */
function itssportstime_tournaments_texonomy(){
    register_taxonomy('tournament_type', array('tournaments'), array(
        'labels' => array(
            'name' => __('Tournament Types', 'itssportstime'),
            'singular_name' => __('Tournament Type', 'itssportstime'),
            'search_items' => __('Search Tournament Types', 'itssportstime'),
            'all_items' => __('All Tournament Types', 'itssportstime'),
            'parent_item' => __('Parent Tournament Type', 'itssportstime'),
            'parent_item_colon' => __('Parent Tournament Type:', 'itssportstime'),
            'edit_item' => __('Edit Tournament Type', 'itssportstime'),
            'update_item' => __('Update Tournament Type', 'itssportstime'),
            'add_new_item' => __('Add New Tournament Type', 'itssportstime'),
            'new_item_name' => __('New Tournament Type Name', 'itssportstime'),
            'menu_name' => __('Tournament Types', 'itssportstime'),
        ),
        'public' => true,
        'hierarchical' => true, // Set to true if you want category-like behavior
        'show_in_rest' => true, // Important for Gutenberg
    ));
}

add_action('init', 'itssportstime_tournaments_texonomy');






/**
 * All transfer news of football
 * There are no post type for this type of post
 */
function itssportstime_transfer_news(){
    register_post_type('transfers', array(
        'labels' => array(
            'name' => __('Transfers', 'itssportstime'),
            'singular_name' => __('Transfer', 'itssportstime'),
        ),
        'menu_icon' => 'dashicons-controls-repeat',
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array( 'title', 'thumbnail', 'editor' ),
        'taxonomies' => array( 'post_tag', 'category' ), // Add support for categories and tags, 'category'
    ));
}

add_action('init', 'itssportstime_transfer_news');

/**
 * Register tournament type taxonomy
 */
function itssportstime_transfer_texonomy(){
    register_taxonomy('transfer_type', array('transfers'), array(
        'labels' => array(
            'name' => __('Transfer Types', 'itssportstime'),
            'singular_name' => __('Transfer Type', 'itssportstime'),
            'search_items' => __('Search Transfer Types', 'itssportstime'),
            'all_items' => __('All Tournament Types', 'itssportstime'),
            'parent_item' => __('Parent Transfer Type', 'itssportstime'),
            'parent_item_colon' => __('Parent Transfer Type:', 'itssportstime'),
            'edit_item' => __('Edit Transfer Type', 'itssportstime'),
            'update_item' => __('Update Transfer Type', 'itssportstime'),
            'add_new_item' => __('Add New Transfer Type', 'itssportstime'),
            'new_item_name' => __('New Transfer Type Name', 'itssportstime'),
            'menu_name' => __('Transfer Types', 'itssportstime'),
        ),
        'public' => true,
        'hierarchical' => true, // Set to true if you want category-like behavior
        'show_in_rest' => true, // Important for Gutenberg
    ));
}

add_action('init', 'itssportstime_transfer_texonomy');
?>
