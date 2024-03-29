<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package greatwall_pro
 */

get_header(); ?>

	<header class="page-header">
		<div class="container">
			<h1 class="page-title"><?php esc_html_e( '404 Error - Page Not Found', 'greatwall-pro' ); ?></h1>
		</div><!-- .container -->
	</header><!-- .page-header -->

	<div class="container">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" >

				<section class="error-404 not-found">

					<div class="page-content">
						<p><?php esc_html_e( 'Sorry, but it looks like nothing was found at this location. You may try one of the links below or do a search.', 'greatwall-pro' ); ?></p>

						<p>
						<?php
							get_search_form(); 
						?>
						</p>

						<?php
							the_widget( 'WP_Widget_Recent_Posts' );

							// Only show the widget if site has multiple categories.
							if ( greatwall_pro_categorized_blog() ) :
						?>

						<div class="widget widget_categories">
							<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'greatwall-pro' ); ?></h2>
							<ul>
							<?php
								wp_list_categories( array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								) );
							?>
							</ul>
						</div><!-- .widget -->

						<?php
							endif;

							/* translators: %1$s: smiley */
							$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'greatwall-pro' ), convert_smilies( ':)' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
							echo '<p></p>';
							the_widget( 'WP_Widget_Tag_Cloud' );
						?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- .container -->

<?php get_footer(); ?>
