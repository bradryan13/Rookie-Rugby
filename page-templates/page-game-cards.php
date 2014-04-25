<?php 
/* Template Name: Game Cards */
 

$paged = 1;
if ( get_query_var('paged') ) $paged = get_query_var('paged');
if ( get_query_var('page') ) $paged = get_query_var('page');

$difficulty = $_GET["difficulty"];

// args
$args = array(
    'posts_per_page'=> -1,
    'paged' => $paged,
    'post_type' => 'game-cards',
);

if ($difficulty) {
    $args['tax_query'] = array(
        array(
            'taxonomy'=>'game-diff',
            'field'=>'slug',
            'terms'=> $difficulty,
            ),
    );
}

if ($tag) {
    $args['tag'] = $tag;
}

query_posts( $args );
 
require_once(get_stylesheet_directory() . '/includes/templates/archive-game-cards.php');

?>