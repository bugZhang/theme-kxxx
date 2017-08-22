<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kxxx
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="http://cdn.bootcss.com/material-design-icons/3.0.1/iconfont/material-icons.min.css" rel="stylesheet">

<?php wp_head(); ?>
</head>

<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    var is_mobile = <?php echo is_mobile() ? 1 : 0; ?>;
    var is_single_page = <?php echo is_single() || is_page() ? 1 : 0; ?>;
</script>

<body <?php body_class(); ?>>
<div id="page" class="site">
<!--	<a class="skip-link screen-reader-text" href="#content">--><?php //esc_html_e( 'Skip to content', 'kxxx' ); ?><!--</a>-->

    <div class="kxxx-header" id="content" tabindex="-1">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <?php
//                    the_custom_logo();
                    // Check to see if the header image has been removed
                    $header_image = get_header_image();
                    if ( $header_image ) :
                    // Compatibility with versions of WordPress prior to 3.4.
                    if ( function_exists( 'get_custom_header' ) ) {
                        /*
                         * We need to figure out what the minimum width should be for our featured image.
                         * This result would be the suggested width if the theme were to implement flexible widths.
                         */
                        $header_image_width = get_theme_support( 'custom-header', 'width' );
                    } else {
                        $header_image_width = HEADER_IMAGE_WIDTH;
                    }
                    ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
                        <?php
                        /*
                         * The header image.
                         * Check if this is a post or page, if it has a thumbnail, and if it's a big one
                         */
                        if ( is_singular() && has_post_thumbnail( $post->ID ) &&
                            ( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_width ) ) ) &&
                            $image[1] >= $header_image_width ) :
                            // Houston, we have a new header image!
                            echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
                        else :
                            // Compatibility with versions of WordPress prior to 3.4.
                            if ( function_exists( 'get_custom_header' ) ) {
                                $header_image_width  = get_custom_header()->width;
                                $header_image_height = get_custom_header()->height;
                            } else {
                                $header_image_width  = HEADER_IMAGE_WIDTH;
                                $header_image_height = HEADER_IMAGE_HEIGHT;
                            }
                            ?>
                            <img src="<?php header_image(); ?>" width="<?php echo esc_attr( $header_image_width ); ?>" height="<?php echo esc_attr( $header_image_height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
                        <?php endif; // end check for featured image or standard header ?>
                    </a>
                    <?php endif; // end check for removed header image ?>

                </div>

                <p class="navbar-text"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></p>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<!--                    <ul class="nav navbar-nav">-->
<!--                        <li class="active">-->
<!--                            <a href="#">Link <span class="sr-only">(current)</span></a>-->
<!--                        </li>-->
<!--                        <li><a href="#">Link</a></li>-->
<!--                        <li><a href="#">Link</a></li>-->
<!--                        <li><a href="#">Link</a></li>-->
<!--                        <li><a href="#">Link</a></li>-->
<!---->
<!--                    </ul>-->

                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'container'        => 'ul',
                        'menu_class'   => 'nav navbar-nav',
                    ) );
                    ?>

                    <form class="navbar-form navbar-right" role="search" method="get" action="<?php esc_url( home_url( '/' ) ) ?>">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="Search" value="<?php get_search_query() ?>" name="s" >
                        </div>
                        <button type="submit" class="btn btn-default">查找</button>
                    </form>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

    </div>

    <div class="container kxxx-main">
        <div class="row">