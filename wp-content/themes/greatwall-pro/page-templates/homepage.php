<?php
/**
 * Template Name: Homepage
 *
 * The template for displaying homepage.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package greatwall_pro
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area full-width">
		<main id="main" class="site-main">

			
			<?php
			while ( have_posts() ) : the_post();

				the_content();

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

			</div>

<?php get_footer(); ?>