
<div id="post-<?php the_ID(); ?>" <?php post_class('ht_grid ht_grid_1_2'); ?>>	

	<?php if ( has_post_thumbnail() ) { ?>
		<a class="thumbnail-link" href="<?php the_permalink(); ?>">
			<div class="thumbnail-wrap">
				<?php 
					the_post_thumbnail('grid_thumb'); 
				?>
			</div><!-- .thumbnail-wrap -->
		</a>

		<div class="entry-category">
			<?php greatwall_pro_first_category(); ?>
		</div><!-- .entry-category -->
			
	<?php } ?>	

	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
	<div class="entry-meta">

		<span class="entry-author"><?php the_author_posts_link(); ?></span> 
		<span class="entry-date"><?php echo get_the_date(); ?></span>

	</div><!-- .entry-meta -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<div class="read-more"><a href="<?php the_permalink(); ?>"><?php esc_html_e('Continue Reading &raquo;', 'greatwall-pro'); ?></a></div>

</div><!-- #post-<?php the_ID(); ?> -->