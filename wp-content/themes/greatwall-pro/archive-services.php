<?php
/**
 * Services archives template
 *
 * @package greatwall-pro
 */

get_header(); ?>

	<div class="page-header">
		<div class="container">
			<h1 class="page-title"><?php echo get_theme_mod('services-page-title','Our Services'); ?></h1>
		</div>
	</div><!-- .page-header -->

	<div class="container">

	<div id="primary" class="content-area full-width">
		<main id="main" class="post-wrap roll-services" role="main">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php $icon = get_post_meta( get_the_ID(), 'wpcf-service-icon', true ); ?>
				<?php $link = get_post_meta( get_the_ID(), 'wpcf-service-link', true ); ?>
				<div class="service ht_grid ht_grid_1_3">
					<div class="roll-icon-box">
						<?php if ($icon) : ?>			
						<div class="icon">
							<?php echo '<i class="fa ' . esc_html($icon) . '"></i>'; ?>
						</div>
						<?php endif; ?>							
						<div class="content">
							<h3>
								<?php if ($link) : ?>
								<a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a>
								<?php else : ?>
								<?php the_title(); ?>
								<?php endif; ?>
							</h3>
							<?php the_content(); ?>
						</div>	
					</div>
				</div>
			<?php endwhile; ?>

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	</div><!-- .container -->

<?php get_footer(); ?>
