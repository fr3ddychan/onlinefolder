<?php
/**
 * The template for displaying all single projects.
 *
 * @package greatwall-pro
 */

	get_header();
?>

	<?php if (get_theme_mod('full-project-on', true) == true) { //Check if the post needs to be full width
		$full_width = 'full-width';
	} else {
		$full_width = '';
	} ?>

	<header class="page-header">
		<div class="container">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</div><!-- .container -->
	</header><!-- .page-header -->

	<div class="container">

		<div id="primary" class="content-area <?php echo $full_width; ?>">
			<main id="main" class="post-wrap" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'project' ); ?>

				<?php if ( get_theme_mod('project_nav', 0) != 1 ) {
					//greatwall_pro_post_navigation();
				} ?>

			<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php if ( get_theme_mod('full-project-on', true) != true ) {
			get_template_part('sidebar','project');
		} ?>

	</div><!-- .container -->

<?php get_footer(); ?>
