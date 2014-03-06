<?php
/**
 * USA Wheel Chair Rugby functions and definitions
 *
 * @package USA Wheel Chair Rugby
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'rookie_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rookie_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on USA Wheel Chair Rugby, use a find and replace
	 * to change 'rookie' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rookie', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' 			 => __( 'Primary Menu', 'rookie' ), 
		'teachers' 	 		 => __( 'Teachers Menu', 'rookie' ), 
		'coaches' 	 		 => __( 'Coaches Menu', 'rookie' ), 
		'organizations' 	 => __( 'Organizations Menu', 'rookie' ), 
		'players' 			 => __( 'Players Menu', 'rookie' ), 

	) );


	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rookie_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // rookie_setup
add_action( 'after_setup_theme', 'rookie_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function rookie_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Hero', 'rookie' ),
		'id'            => 'hero',
		'before_widget' => '<div class="row">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="hide">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Top-A', 'rookie' ),
		'id'            => 'top-a',
		'before_widget' => '<div>',
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

}
add_action( 'widgets_init', 'rookie_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rookie_scripts() {

	wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.css', false, '1.1', 'all' );
	wp_enqueue_script( 'rookie-Foundation', get_template_directory_uri() . '/js/jquery.stellar.js', array(), '1', true );
	wp_enqueue_script( 'rookie-customjs', get_template_directory_uri() . '/js/custom.js', array(), '20120206', true );
	wp_enqueue_script( 'rookie-mobile-menu', get_template_directory_uri() . '/js/mobile-menu.js', array(), '20120206', true );
	wp_enqueue_script( 'rookie-isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array(), '20120206', true );
	wp_enqueue_script( 'rookie-modal', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array(), '20120206', true );
	wp_enqueue_script( 'rookie-video', get_template_directory_uri() . '/js/videoplayer.js', array(), '20120206', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rookie_scripts' );

//imclude custom widgets
include("widgets/simple-widget.php");

//add images
add_image_size( 'latest', 268, 268, true );

// require jquery 
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}

// Automatically add FitVids to oembed YouTube videos
function your_theme_embed_filter( $output, $data, $url ) {
 
	$return = '<div class="video">'.$output.'</div>';
	return $return;
 
}
add_filter('oembed_dataparse', 'your_theme_embed_filter', 90, 3 );

// customize embed settings
add_filter( 'oembed_result', 'hide_youtube_related_videos', 10, 3);
 function hide_youtube_related_videos($data, $url, $args = array()) {
 $data = preg_replace('/(youtube\.com.*)(\?feature=oembed)(.*)/', '$1?' . apply_filters("hyrv_extra_querystring_parameters", "&modestbranding=1&rel=0&showinfo=0&autohide=1&vq=hd720") . 'rel=0$3', $data);
 return $data;
 }
