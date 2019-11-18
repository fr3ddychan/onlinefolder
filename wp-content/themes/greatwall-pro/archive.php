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
			<?php
				global $wp_version;

				if ( $wp_version >= 4.1 ) {
					echo get_the_archive_title('');
				} else {
					echo "Archives";
				}
			?>	
		</h1>
	</div>
</div><!-- .page-header -->

<div class="container">

	<div id="primary" class="content-area clear">
				
		<main id="main" class="site-main clear">
		
			<div id="recent-content" class="content-<?php if(get_theme_mod('loop-style','choice-1') == 'choice-1') { echo 'list'; } elseif(get_theme_mod('loop-style','choice-1') == 'choice-2') { echo 'loop'; } else { echo 'grid'; } ?>">

				<?php

				if ( have_posts() ) :	
				
				$i = 1;		
					
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					if (get_theme_mod('loop-style','choice-1') == 'choice-1') {

						get_template_part('template-parts/content', 'list');

					} elseif (get_theme_mod('loop-style','choice-1') == 'choice-2') {

						get_template_part('template-parts/content', 'loop');

					} else {

						get_template_part('template-parts/content', 'grid');

					}
					
					$i++;

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; 

				?>

			</div><!-- #recent-content -->

		</main><!-- .site-main -->

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>

