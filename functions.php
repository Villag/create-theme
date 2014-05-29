<?php
/**
 * create functions and definitions
 *
 * @package create
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'create_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function create_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'create', get_template_directory() . '/languages' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'create' ),
	) );

	// Disable admin bar on front-end
	add_action( 'show_admin_bar', '__return_false' );

	// Register profile sidebar
	register_sidebar(array(
		'name' => __( 'Profile' ),
		'id' => 'profile',
		'description' => __( 'Widgets in this area will be shown on the right-hand side.' )
	));

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // _s_setup
add_action( 'after_setup_theme', 'create_setup' );

/**
 * Clean up wp_head()
 *
 * Remove unnecessary <link>'s
 * Remove inline CSS used by Recent Comments widget
 * Remove inline CSS used by posts with galleries
 * Remove self-closing tag and change ''s to "'s on rel_canonical()
 */
function create_head_cleanup() {
	// Originally from http://wpengineer.com/1438/wordpress-header/
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0) ;

	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );

	if ( ! class_exists( 'WPSEO_Frontend' ) ) {
		remove_action( 'wp_head', 'rel_canonical' );
		add_action( 'wp_head', 'roots_rel_canonical' );
	}
}

function roots_rel_canonical() {
	global $wp_the_query;

	if (!is_singular()) {
		return;
	}

	if (!$id = $wp_the_query->get_queried_object_id()) {
		return;
	}

	$link = get_permalink( $id );
	echo "\t<link rel=\"canonical\" href=\"$link\">\n";
}
add_action( 'init', 'create_head_cleanup' );

/**
 * Enqueue scripts and styles.
 */
function create_scripts() {
	wp_enqueue_style( '_s-style', get_stylesheet_uri() );

	// Queue CSS
	wp_enqueue_style( 'bootstrap',			get_stylesheet_directory_uri() .'/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap-responsive', get_stylesheet_directory_uri() .'/assets/css/bootstrap-responsive.min.css' );
	wp_enqueue_style( 'create-style',		get_stylesheet_uri() );
	wp_enqueue_style( 'iealertstyle',		get_stylesheet_directory_uri() .'/library/iealert/style.css' );

	// Queue JS
	// Load Modernizr into the HEAD, before any other scripts
	wp_enqueue_script( 'modernizr',						get_stylesheet_directory_uri() .'/assets/js/modernizr.2.5.3.min.js',	false, '1.0', false );
	wp_enqueue_script( 'handlebars',					get_stylesheet_directory_uri() .'/assets/js/handlebars.js',				false, '1.0', false );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap',						get_stylesheet_directory_uri() .'/assets/js/bootstrap.min.js',			array( 'jquery' ), '1.1', true );
	wp_enqueue_script( 'isotope',						get_stylesheet_directory_uri() .'/assets/js/jquery.isotope.min.js',		array( 'jquery' ), '1.1', true );
	wp_enqueue_script( 'foundation',					get_stylesheet_directory_uri() .'/assets/js/foundation.min.js',			array( 'jquery' ), '1.1', true );
	wp_enqueue_script( 'iealert',						get_stylesheet_directory_uri() .'/assets/js/iealert.min.js',			array(), '1.1', true );
	wp_enqueue_script( 'create-navigation',				get_template_directory_uri() .	'/assets/js/navigation.js',				array(), '1.1', true );
	wp_enqueue_script( 'create-skip-link-focus-fix',	get_template_directory_uri() .	'/assets/js/skip-link-focus-fix.js',	array(), '1.1', true );
	wp_enqueue_script( 'app',							get_stylesheet_directory_uri() .'/assets/js/app.js',					array( 'jquery' ), '1.1', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'app', 'create_theme', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'create_scripts' );
