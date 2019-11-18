<?php
/**
 * @package greatwall-pro
 */
?>

<?php //Get the custom field values
	$photo 	  = get_post_meta( get_the_ID(), 'wpcf-photo', true );
	$position = get_post_meta( get_the_ID(), 'wpcf-position', true );
	$facebook = get_post_meta( get_the_ID(), 'wpcf-facebook', true );
	$twitter  = get_post_meta( get_the_ID(), 'wpcf-twitter', true );
	$google   = get_post_meta( get_the_ID(), 'wpcf-google-plus', true );
	$link     = get_post_meta( get_the_ID(), 'wpcf-custom-link', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="team-item">
	    <div class="team-inner">
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="avatar">
				<?php the_post_thumbnail('large-thumb'); ?>
				<ul class="team-social">
					<?php if ($facebook != '') : ?>
						<li><a class="facebook" href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
					<?php endif; ?>
					<?php if ($twitter != '') : ?>
						<li><a class="twitter" href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
					<?php endif; ?>
					<?php if ($google != '') : ?>
						<li><a class="google" href="<?php echo esc_url($google); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
					<?php endif; ?>
				</ul>							
			</div>
			<?php endif; ?>
		    <div class="team-content">
		        <div class="pos"><?php echo esc_html($position); ?></div>	        				    
		        <div class="name">
		        	<?php the_title(); ?>
		        </div>

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

		    </div>					
	    </div>
	</div><!-- /.team-item -->

</article><!-- #post-## -->
