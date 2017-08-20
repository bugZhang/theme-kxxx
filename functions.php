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

/**
 * 返回ajax数据，最多传入三个参数
 * 第一个参数必须是返回状态，字符串类型
 * 第二个参数可以是字符串或者是数组
 * 当传入第三个参数时，三个参数必须都是字符串
 * @param string $status
 */
function ajax_return_json($status){

    $args		= func_get_args();
    $argsNum 	= count($args);
    $data		= array();
    $data['status']	= $status;

    if ($argsNum == 2){
        if(is_string($args[1])){
            $data['status']	= $status;
            $data['info'] 	= $args[1];
        }
        if(is_array($args[1])){
            $data = array_merge($data, $args[1]);
        }
    }elseif ($argsNum == 3){
        if(is_string($args[0]) && is_string($args[1]) && is_string($args[2])){
            $data['status'] = $args[0];
            $data['info'] = $args[1];
            $data['field'] = $args[2];
        }
    }elseif($argsNum == 0 || $argsNum > 3){
        wlog('ajax_return_json 参数错误');
    }
    header('Content-Type:application/json; charset=utf-8');
    exit(json_encode($data));
}

function kxxx_click_history_ajax(){
    $post_id = $_GET['pid'];
//    $post   = get_post($post_id);
//    $title = $post->post_title;
//    $post_name = $post->post_name;
    $history = $_COOKIE['i_history'];
    $historyArr = array();
    if($history){
        $oldArr = explode(',', $history);
        foreach ($oldArr as $id){
            if($id != $post_id){
                $historyArr[] = $id;
            }
        }
    }
    array_unshift($historyArr, $post_id);
    $historyArr = array_slice($historyArr, 0, 10, false);
    setcookie( 'i_history', implode(',', $historyArr), 180 * DAYS_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );
    ajax_return_json('success', $historyArr);
}

add_action('wp_ajax_nopriv_click_history_ajax', 'kxxx_click_history_ajax');
add_action('wp_ajax_click_history_ajax', 'kxxx_click_history_ajax');

function is_mobile(){
    $useragent=$_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
        return true;
    }else{
        return false;
    }
}