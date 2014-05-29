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
	wp_enqueue_script( 'create-navigation',				get_template_directory_uri() .  '/assets/js/navigation.js',				array(), '1.1', true );
	wp_enqueue_script( 'create-skip-link-focus-fix',	get_template_directory_uri() .  '/assets/js/skip-link-focus-fix.js',	array(), '1.1', true );
	wp_enqueue_script( 'app',							get_stylesheet_directory_uri() .'/assets/js/app.js',					array( 'jquery' ), '1.1', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'app', 'create_theme', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'create_scripts' );
