<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package greatwall_pro
 */

get_header(); ?>

	<div class="page-header">
		<div class="container">
			<h1 class="page-title">
				<?php printf( esc_html__( 'Search Results for %s', 'greatwall-pro' ), '"' . get_search_query() . '"' ); ?>
			</h1>	
		</div><!-- .container -->
	</div><!-- .page-header -->

	<div class="container">

		<div id="primary" class="content-area clear">

			<main id="main" class="site-main clear">

			<div id="recent-content" class="content-search">

				<?php

				if ( have_posts() ) :	
							
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'search' );

					endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					?>

				<?php endif; ?>


			</div><!-- #recent-content -->

			</main><!-- .site-main -->

			<?php get_template_part( 'template-parts/pagination', '' ); ?>

		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- .container -->

<?php get_footer(); ?>

