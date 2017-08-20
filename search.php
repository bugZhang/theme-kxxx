<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package kxxx
 */

get_header(); ?>

    <div class="col-md-9 ">

    <div class="kxxx-content">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h3 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'kxxx' ), '<span>' . get_search_query() . '</span>' );
				?></h3>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content-search', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content-search', 'none' );

		endif; ?>

    </div>
    </div>

<?php
get_sidebar();
get_footer();
