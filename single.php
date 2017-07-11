<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kxxx
 */

get_header(); ?>

    <div class="col-md-9">
        <div class="kxxx-content">
        <?php
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', get_post_format() );

            the_post_navigation(
                    array(
                        'prev_text' => "上一篇：%title",
                        'next_text' => "下一篇：%title",
                        'in_same_term'  => true,
//                        'screen_reader_text'    => '导航'
                    )
            );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>
        </div>
    </div>

<?php
get_sidebar();
get_footer();
