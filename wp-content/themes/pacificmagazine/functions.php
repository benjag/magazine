<?php

/**
 * pacificmagazine functions and definitions
 *
 * @package pacificmagazine
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600; /* pixels */
}

if ( ! function_exists( 'pacificmagazine_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pacificmagazine_setup() {

	// This theme styles the visual editor to resemble the theme style.
	$font_url = 'http://fonts.googleapis.com/css?family=Roboto+Slab:300,700,400|PT+Sans:400,700,400italic';
	add_editor_style( array( 'inc/editor-style.css', str_replace( ',', '%2C', $font_url ) ) );
                

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on pacificmagazine, use a find and replace
	 * to change 'pacificmagazine' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'pacificmagazine', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'large-thumb', 1060, 650, true);
	add_image_size( 'index-thumb', 780, 250, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'pacificmagazine' ),
		'social' => __( 'Social Menu', 'pacificmagazine' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );
	
	add_theme_support("aesop-component-styles", array("parallax", "image", "quote", "gallery", "content", "video", "audio", "collection", "chapter", "document", "character", "map", "timeline") );

	// Set up the WordPress core custom background feature.
	/*
add_theme_support( 'custom-background', apply_filters( 'pacificmagazine_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
*/
}
endif; // pacificmagazine_setup
add_action( 'after_setup_theme', 'pacificmagazine_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function pacificmagazine_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'pacificmagazine' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'pacificmagazine' ),
		'id'            => 'sidebar-2',
		'description'   => __('Widget Area in Footer'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'pacificmagazine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pacificmagazine_scripts() {
	wp_enqueue_style( 'pacificmagazine-style', get_stylesheet_uri() );
	
	if (is_page_template('page-templates/page-nosidebar.php')) {
    wp_enqueue_style( 'pacificmagazine-layout-style' , get_template_directory_uri() . '/layouts/no-sidebar.css');
} else {
    wp_enqueue_style( 'pacificmagazine-layout-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
}

	//Custom Fonts
	wp_enqueue_style( 'pacificmagazine-roboto', 'http://fonts.googleapis.com/css?family=Roboto+Slab:300,700,400' );
	
	wp_enqueue_style( 'pacificmagazine-ptsans', 'http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic' );
	
	wp_enqueue_style( 'pacificmagazine-fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'pacificmagazine-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20150512', true );
	
	wp_enqueue_script( 'pacificmagazine-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('pacificmagazine-superfish'), '20150512', true );
	
	wp_enqueue_script( 'pacificmagazine-hide-search', get_template_directory_uri() . '/js/hide-search.js', array(), '20150512', true );

	wp_enqueue_script( 'pacificmagazine-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'pacificmagazine-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script( 'pacificmagazine-masonry', get_template_directory_uri() . '/js/masonry-settings.js', array('masonry'), '20140401', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pacificmagazine_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
