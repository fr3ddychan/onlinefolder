<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package greatwall_pro
 */

?>

	</div><!-- #content .site-content -->
	
	<footer id="colophon" class="site-footer">

		<?php if ( ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) && get_theme_mod('footer-widgets-on', true) ) { ?>

			<div class="footer-columns clear">

				<div class="container clear">

					<div class="footer-column footer-column-1 ht_grid ht_grid_1_4">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>

					<div class="footer-column footer-column-2 ht_grid ht_grid_1_4">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>

					<div class="footer-column footer-column-3 ht_grid ht_grid_1_4">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>

					<div class="footer-column footer-column-4 ht_grid ht_grid_1_4">
						<?php dynamic_sidebar( 'footer-4' ); ?>
					</div>				

				</div><!-- .container -->

			</div><!-- .footer-columns -->

		<?php } ?>

		<div class="clear"></div>

		<div id="site-bottom" class="clear">

			<div class="container">

			<div class="site-info">

				<?php if(get_theme_mod('footer-credit')) { 
					
					echo get_theme_mod('footer-credit');
					
					} else { 
						$theme_uri = 'https://www.happythemes.com/wordpress-themes/';
						$author_uri = 'https://www.happythemes.com/';
				?>

				&copy; <?php echo date("o"); ?> <a href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?></a> - <?php echo __('Theme by', 'greatwall-pro'); ?> <a href="<?php echo $author_uri; ?>" target="_blank">HappyThemes</a>

			<?php } ?>

			</div><!-- .site-info -->

			<?php 
				if ( has_nav_menu( 'footer' ) ) {
					wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu', 'menu_class' => 'footer-nav' ) );
				}
			?>	

			</div><!-- .container -->

		</div>
		<!-- #site-bottom -->
							
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php if ( get_theme_mod('back-top-on', true) ) : ?>

	<div id="back-top">
		<a href="#top" title="<?php echo __('Back to top', 'greatwall-pro'); ?>"><span class="genericon genericon-collapse"></span></a>
	</div>

<?php endif; ?>

<?php if ( get_theme_mod('sticky-nav-on', true) == true ) : ?>

	<script type="text/javascript">

	(function($){ //create closure so we can safely use $ as alias for jQuery

	    $(document).ready(function(){

	        "use strict"; 

			$(window).scroll(function(){
				var aTop = $('.site-header').height();
				if($(this).scrollTop()>=aTop){
				    $('.site-header').addClass('site-header-scrolled');
				} else {
					$('.site-header').removeClass('site-header-scrolled');
				}
			});

	    });

	})(jQuery);

	</script>

<?php else: ?>

	<style type="text/css">
		.site-header {
			position: static;
		}
		.header-space {
			height: 0;
		}
	</style>

<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>
