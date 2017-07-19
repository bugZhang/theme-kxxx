<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kxxx
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h3 class="kxxx-single-title text-center">', '</h3>' );
		else :
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if(is_single() || is_page()):
                the_content( sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kxxx' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ) );
            else :
                the_post_thumbnail('full', 'class=img-responsive kxxx-thumb');
                the_excerpt();

                kxxx_show_video_main();

            endif;
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kxxx' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php kxxx_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
