<?php get_header(); ?>

<div class="page-header">
	<div class="container">
		<h1 class="page-title"><?php echo get_theme_mod('blog-page-title','News from Our Blog'); ?></h1>
	</div><!-- .container -->
</div><!-- .page-header -->

<div class="container">

	<div id="primary" class="content-area">	

		<?php if (get_theme_mod('featured-content-on', 'true') == true ) { ?>

		<?php		

			$args = array(
			'post_type'      => 'post',
			'posts_per_page' => get_theme_mod('featured-num', '3'),
		    'meta_query' => array(
		        array(
		            'key'   => 'is_featured',
		            'value' => 'true'
		        	)
		    	)				
			);

			// The Query
			$the_query = new WP_Query( $args );

			$i = 1;

			if ( $the_query->have_posts() && (!get_query_var('paged')) ) {	

		?>

		<div id="featured-slider">
		
			<ul class="bxslider">	

			<?php
				// The Loop
				while ( $the_query->have_posts() ) : $the_query->the_post();
			?>	

			<li class="featured-slide hentry">

				<a class="thumbnail-link" href="<?php the_permalink(); ?>">
					
					<div class="thumbnail-wrap">
						<?php 
						if ( has_post_thumbnail() ) {
							the_post_thumbnail('featured_thumb');  
						} else {
							echo '<img src="' . get_template_directory_uri() . '/assets/img/no-featured.png" alt="" />';
						}
						?>
					</div><!-- .thumbnail-wrap -->
					<div class="gradient">
					</div>
				</a>

				<div class="entry-header clear">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</div><!-- .entry-header -->

				<div class="entry-category">
					<?php greatwall_pro_first_category(); ?>
				</div>

				<div class="entry-summary">
					<?php the_excerpt(); ?>
					<span class="read-more"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Continue Reading &raquo;', 'greatwall-pro'); ?></a></span>
				</div><!-- .entry-summary -->

			</li><!-- .featured-slide .hentry -->

			<?php

				$i++;
				endwhile;
			?>

			</ul><!-- .bxslider -->

			</div><!-- #featured-content -->

			<?php
				} elseif  ( !$the_query->have_posts() && (!get_query_var('paged')) ) { // else has no featured posts
			?>


			<?php
				} //end if has featured posts
				wp_reset_postdata();				
			?>

			<?php } ?>
			
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

</div><!-- .container -->

<?php get_footer(); ?>
