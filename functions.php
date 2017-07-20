<?php
/**
 * kxxx functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kxxx
 */

if ( ! function_exists( 'kxxx_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kxxx_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on kxxx, use a find and replace
	 * to change 'kxxx' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kxxx', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'kxxx' ),
	) );

    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kxxx_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );
}
endif;
add_action( 'after_setup_theme', 'kxxx_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kxxx_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kxxx_content_width', 640 );
}
add_action( 'after_setup_theme', 'kxxx_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kxxx_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kxxx' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kxxx' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section><hr class="kxxx-line">',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'kxxx_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kxxx_scripts() {
	wp_enqueue_style( 'kxxx-style', get_stylesheet_uri() );

//	wp_enqueue_script( 'kxxx-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
//	wp_enqueue_script( 'kxxx-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

//    wp_enqueue_script( 'kxxx-bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20151215', true );

    wp_enqueue_script( 'kxxx-jquery-min', 'http://cdn.bootcss.com/jquery/1.12.4/jquery.min.js', array(), '20151216', false );
    wp_enqueue_script( 'kxxx-jquery-pin', get_template_directory_uri() . '/js/jquery.pin.js', array('kxxx-jquery-min'), '20151216', true );
    wp_enqueue_script( 'kxxx-com', get_template_directory_uri() . '/js/kxxx.js', array(), '20151216', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kxxx_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

require get_template_directory() . '/inc/Kxxx_History_Widget.php';

add_action( 'widgets_init', function() { register_widget( 'Kxxx_History_Widget' ); } );

function wpdocs_custom_excerpt_length( $length ) {
    return 300;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function wpdocs_excerpt_more( $more ) {
    return '.....';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

function custom_navigation_markup_template(){

    $html   = '
    <nav class="navigation %1$s" role="navigation">
		    <h4 class="screen-reader-text">%2$s</h4>
		    <div class="nav-links">%3$s</div>
	        </nav>';
    return $html;
}

add_filter('navigation_markup_template', 'custom_navigation_markup_template');

function kxxx_show_video_main(){

    if(has_post_format('video') && !is_single() && !is_page()){
        $post = get_post_field('post_content');
        if($post){
            $preg = "/<video\s*.*>\s*.*<\/video>$/";
            $match = preg_match($preg, $post, $videos);
            if($match){
                $video = $videos[0];
                $preg = "/style=\".*?\"/";
                echo preg_replace($preg, 'style="width:480px;height:360px;"', $video);
            }
        }
    }
}

function kxxx_ajax(){

}

add_action();