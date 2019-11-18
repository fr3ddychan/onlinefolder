<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package greatwall_pro
 */


?>

<aside id="secondary" class="widget-area sidebar project-sidebar">
	<?php if ( ! is_active_sidebar( 'sidebar-project' ) ) { ?>
		<div class="widget setup-notice">
			<p><?php echo __('There is no content here', 'greatwall-pro'); ?></p>
			<p><?php echo __('Please put widgets to the <strong>Project Sidebar</strong>', 'greatwall-pro'); ?></p>
			<p><a href="<?php echo home_url(); ?>/wp-admin/widgets.php"><?php echo __('Okay, I\'m doing now &raquo;', 'greatwall-pro'); ?></a></p>
		</div>
	<?php } ?>

	<?php dynamic_sidebar( 'sidebar-project' ); ?>
</aside><!-- #secondary -->
