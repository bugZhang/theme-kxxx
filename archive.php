<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package kxxx
 */

get_header(); ?>
    <div class="col-md-9 ">

        <div class="kxxx-content">

		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

            the_posts_pagination( array(
                'prev_text'          => '&laquo;',
                'next_text'          => '&raquo;',
                'mid_size'           => 3,
                'screen_reader_text'    => ' '
            ) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

        </div><!-- .kxxx-content -->
	</div><!-- col-md-9 -->

<?php
get_sidebar();
get_footer();
