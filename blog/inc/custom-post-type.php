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
        'menu_icon' => 'dashicons-media-document',
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title',  'thumbnail', 'editor', )
    ));
}

add_action('init', 'itssportstime_stories');


function itssportstime_stories_texonomy(){
    register_taxonomy('story_type', array('stories'), array(
        'labels' => array(
            'name' => "StoriesType",
            'singular_name'=> "StoryType",
        ),
        'public' => true,
//        'hierarchical' => false
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
        'supports' => array( 'title', 'thumbnail', 'editor', ),
        'taxonomies' => array( 'post_tag'), // Add support for categories and tags , 'category',
    ));
}

add_action('init', 'itssportstime_tournaments');


function itssportstime_tournaments_type(){
    register_taxonomy('tournament_type', array('tournaments'), array(
        'labels' => array(
            'name' => "TournamentsType",
            'singular_name'=> "TournamentType",
        ),
        'public' => true,
//        'hierarchical' => false
    ));
}
add_action('init', 'itssportstime_tournaments_type');






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
        'supports' => array( 'title',  'thumbnail', 'editor', )
    ));
}

add_action('init', 'itssportstime_transfer_news');
?>
