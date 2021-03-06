<?php
/**
 * lakefront_chophouse functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lakefront_chophouse
 */

if ( ! function_exists( 'lakefront_chophouse_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lakefront_chophouse_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on lakefront_chophouse, use a find and replace
	 * to change 'lakefront_chophouse' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lakefront_chophouse', get_template_directory() . '/languages' );

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
	 * Enable multiple support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This allows two locations for menus
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'lakefront_chophouse' ),
		'footer' => esc_html__( 'Footer', 'lakefront_chophouse' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lakefront_chophouse_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'lakefront_chophouse_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lakefront_chophouse_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lakefront_chophouse_content_width', 640 );
}
add_action( 'after_setup_theme', 'lakefront_chophouse_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lakefront_chophouse_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lakefront_chophouse' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lakefront_chophouse_widgets_init' );

// LOAD BX SLIDER
// *********************************************************
function loadbxslider()
{
    wp_enqueue_style('bxstyle', '/wp-content/themes/lakefront_chophouse/jquery.bxslider.css');
    wp_enqueue_script('bxscript', '/wp-content/themes/lakefront_chophouse/jquery.bxslider.min.js?ver=4.4 ', array('jquery'));
}
add_action('init', 'loadbxslider');


/*Call the widget */

require get_stylesheet_directory() . '/inc/lakefront_chophouse_testimonial.php'; 

/*Enqueue goolge Fonts*/
function google_font(){
	/*Registers the google font and then enqueues it into the theme */
	wp_register_style('google_font', 'https://fonts.googleapis.com/css?family=Lobster|Lato');
	wp_enqueue_style('google_font');
}
add_action ('wp_enqueue_scripts', 'google_font');

/*Enqueue font awesome*/
function enqueue_our_required_stylesheets() {
	wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'); 
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');

/**
 * Enqueue scripts and styles.
 */
function lakefront_chophouse_scripts() {
	wp_enqueue_style( 'lakefront_chophouse-style', get_stylesheet_uri() );

	wp_enqueue_script( 'lakefront_chophouse-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'lakefront_chophouse-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_script('backstretch', get_template_directory_uri() . '/js/backstretch.js', array ('jquery'), '2.0.4', true );
	
	wp_enqueue_script('scroll', get_template_directory_uri() . '/js/sc.js', array ('jquery'), '1.0.4', true );

	wp_enqueue_script('my-scripts', get_template_directory_uri() . '/js/scripts.js', array ('jquery'), '1.0.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lakefront_chophouse_scripts' );

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

/** Load the options pages.
*/

require get_template_directory() .'/inc/options.php';