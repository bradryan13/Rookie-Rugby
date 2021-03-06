<?php
/**
 * USA Wheel Chair Rugby functions and definitions
 *
 * @package USA Wheel Chair Rugby
 */

if ( ! function_exists( 'rookie_setup' ) ) :

function rookie_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'rookie', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' 			 => __( 'Primary Menu', 'rookie' ), 
		'teachers' 	 		 => __( 'Teachers Menu', 'rookie' ), 
		'coaches' 	 		 => __( 'Coaches Menu', 'rookie' ), 
		'organizations' 	 => __( 'Organizations Menu', 'rookie' ), 
		'players' 			 => __( 'Players Menu', 'rookie' ), 
	) );

}
endif; // rookie_setup

add_action( 'after_setup_theme', 'rookie_setup' );

// Register Widgets --------------------------------------------------------------------------------------------------

function rookie_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Hero', 'rookie' ),
		'id'            => 'hero',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Top-A', 'rookie' ),
		'id'            => 'top-a',
		'before_widget' => '<div class="role">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Teacher Sidebar', 'rookie' ),
		'id'            => 'teachers-sidebar',
		'before_widget' => '<div class="sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Forums Sidebar', 'rookie' ),
		'id'            => 'forums-sidbar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Organizations Sidebar', 'rookie' ),
		'id'            => 'organizations-sidbar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Coaches Sidebar', 'rookie' ),
		'id'            => 'coaches-sidbar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Players Sidebar', 'rookie' ),
		'id'            => 'players-sidbar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Skill-Cards Sidebar', 'rookie' ),
		'id'            => 'skill-cards-sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Game-Cards Sidebar', 'rookie' ),
		'id'            => 'game-cards-sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );

		register_sidebar( array(
		'name'          => __( 'Videos Sidebar', 'rookie' ),
		'id'            => 'videos-sidebar',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'rookie_widgets_init' );

// Enqueue scripts and styles --------------------------------------------------------------------------------------------------

function rookie_scripts() {

	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', false, '1.1', 'all' );
	wp_enqueue_script( 'rookie-Foundation', get_template_directory_uri() . '/js/main.min.js', array(), '1', true );	
}
add_action( 'wp_enqueue_scripts', 'rookie_scripts' );

//Include custom widgets --------------------------------------------------------------------------------------------------------

include("widgets/simple-widget.php");

//Add Image Sizes ---------------------------------------------------------------------------------------------------------------

add_image_size( 'latest', 268, 268, true );
add_image_size( 'card', 120, 150, true );


// Require jquery ---------------------------------------------------------------------------------------------------------------

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

// Selects Custom Post Type Templates for single and archive pages ---------------------------------------------------------------
add_filter('template_include', 'custom_template_include');
function custom_template_include($template) {
	$custom_template_location = '/includes/templates/';
     if ( get_post_type () ) {
        if ( is_archive() ) :
           if(file_exists(get_stylesheet_directory() . $custom_template_location . 'archive-' . get_post_type() . '.php'))
              return get_stylesheet_directory() . $custom_template_location . 'archive-' . get_post_type() . '.php';
        endif;
        if ( is_single() ) :
           if(file_exists(get_stylesheet_directory() . $custom_template_location . 'single-' . get_post_type() . '.php'))
              return get_stylesheet_directory() . $custom_template_location . 'single-' . get_post_type() . '.php';
        endif;
    }
    return $template;
  }


// Read More text ---------------------------------------------------------------------------------------------------------------

function new_content_more($more) {
       global $post;
       return ' <a href="' . get_permalink() . ' " class="more-link ajax">Read More...</a> ';
}   
add_filter( 'the_content_more_link', 'new_content_more' );


// Pagination ------------------------------------------------------------------------------------------------------------------


function paginate() {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
        'base' => @add_query_arg('page','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'show_all' => true,
        'type' => 'plain'
    );
    if ( $wp_rewrite->using_permalinks() ) $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
    if ( !empty($wp_query->query_vars['s']) ) $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
    echo paginate_links( $pagination );
}


// CUSTOM POSTS PER PAGE

function game_posts_per_page($query) {
    if ( $query->query_vars['post_type'] == 'game-cards' ) $query->query_vars['posts_per_page'] = 12;
    return $query;
}
if ( !is_admin() ) add_filter( 'pre_get_posts', 'game_posts_per_page' );


?>