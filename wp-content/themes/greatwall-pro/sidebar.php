<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package greatwall_pro
 */


?>

<aside id="secondary" class="widget-area sidebar">
	<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) { ?>
		<div class="widget setup-notice">
			<p><?php echo __('There is no content here', 'greatwall-pro'); ?></p>
			<p><?php echo __('Please put widgets to the <strong>Sidebar</strong>', 'greatwall-pro'); ?></p>
			<p><a href="<?php echo home_url(); ?>/wp-admin/widgets.php"><?php echo __('Okay, I\'m doing now &raquo;', 'greatwall-pro'); ?></a></p>
		</div>
	<?php } ?>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
