<?php
/**
 * Add story post type for different players' life story and more
 */
function thesportsanctum_stories(){
    register_post_type('stories', array(
        'labels' => array(
            'name' => __('Stories', 'thesportsanctum'),
            'singular_name' => __('Story', 'thesportsanctum'),
        ),
        'menu_icon' => 'dashicons-media-document',
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title',  'thumbnail', 'editor', )
    ));
}

add_action('init', 'thesportsanctum_stories');


function thesportsanctum_texonomy(){
    register_taxonomy('story_type', array('stories'), array(
        'labels' => array(
            'name' => "StoriesType",
            'singular_name'=> "StoryType",
        ),
        'public' => true,
//        'hierarchical' => false
    ));
}
add_action('init', 'thesportsanctum_texonomy');







/**
 * Add tournament post type for different tournament update
 */
function thesportsanctum_tournaments(){
    register_post_type('tournaments', array(
        'labels' => array(
            'name' => __('Tournaments', 'thesportsanctum'),
            'singular_name' => __('Tournament', 'thesportsanctum'),
        ),
        'menu_icon' => 'dashicons-table-row-before',
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title',  'thumbnail', 'editor', )
    ));
}

add_action('init', 'thesportsanctum_tournaments');


function thesportsanctum_tournaments_type(){
    register_taxonomy('tournament_type', array('tournaments'), array(
        'labels' => array(
            'name' => "TournamentsType",
            'singular_name'=> "TournamentType",
        ),
        'public' => true,
//        'hierarchical' => false
    ));
}
add_action('init', 'thesportsanctum_tournaments_type');






/**
 * All transfer news of football
 * There are no post type for this type of post
 */
function thesportsanctum_transfer_news(){
    register_post_type('transfers', array(
        'labels' => array(
            'name' => __('Transfers', 'thesportsanctum'),
            'singular_name' => __('Transfer', 'thesportsanctum'),
        ),
        'menu_icon' => 'dashicons-controls-repeat',
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title',  'thumbnail', 'editor', )
    ));
}

add_action('init', 'thesportsanctum_transfer_news');
?>
