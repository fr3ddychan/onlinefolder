<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package greatwall_pro
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if (get_theme_mod('favicon', '') != null) { ?>
<link rel="icon" type="image/png" href="<?php echo esc_url( get_theme_mod('favicon', '') ); ?>" />
<?php } ?>
<?php wp_head(); ?>
<?php
  
	// Primary Font
	$setting = 'primary-font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.primary'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Secondary Font
	$setting2 = 'secondary-font';
	$mod2 = get_theme_mod( $setting2, customizer_library_get_default( $setting2 ) );
	$stack2 = customizer_library_get_font_stack( $mod2 );

	if ( $mod2 != customizer_library_get_default( $setting2 ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.secondary'
			),
			'declarations' => array(
				'font-family' => $stack2
			)
		) );

	}

	// Theme Color
	$primary_color = get_theme_mod('primary-color', '#f65a5b');
	$secondary_color = get_theme_mod('secondary-color', '');

?>
<style type="text/css" media="all">
	body,
	input,
	input[type="text"],
	input[type="email"],
	input[type="url"],
	input[type="search"],
	input[type="password"],
	textarea,
	table,
	.sidebar .widget_ad .widget-title,
	.site-footer .widget_ad .widget-title {
		font-family: "<?php echo $mod; ?>", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	#secondary-menu li a,
	.footer-nav li a,
	.pagination .page-numbers,
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	.comment-form label,
	label,
	h1,h2,h3,h4,h5,h6 {
		font-family: "<?php echo $mod2; ?>", "Helvetica Neue", Helvetica, Arial, sans-serif;
	}
	a,
	a:visited,
	a:hover,
	.site-header .search-icon:hover span,
	.sf-menu li a:hover,
	.sf-menu li li a:hover,
	.sf-menu li.sfHover a,
	.sf-menu li.current-menu-item a,
	.sf-menu li.current-menu-item a:hover,
	.breadcrumbs .breadcrumbs-nav a:hover,
	.read-more a,
	.read-more a:visited,
	.entry-title a:hover,
	article.hentry .edit-link a,
	.author-box a,
	.page-content a,
	.entry-content a,
	.comment-author a,
	.comment-content a,
	.comment-reply-title small a:hover,
	.sidebar .widget a,
	.sidebar .widget ul li a:hover,
	.post-type-archive-services .service .fa,
	.greawall_pro_services_widget .service .fa,
	.greawall_pro_timeline_widget .timeline .icon,
	.greawall_pro_timeline_widget .timeline .content .timeline-date,
	.project-filter li a.active, .project-filter li a:hover,
	.roll-project .project-item:hover .project-pop,
	.roll-project .project-item:hover > .item-wrap .project-title-wrap,
	#secondary .project-filter li a.active,
	#secondary .project-filter li a:hover,
	.plan-price	 {
		color: <?php echo $primary_color; ?>;
	}
	a.roll-button,
	button,
	.btn,
	input[type="submit"],
	input[type="reset"],
	input[type="button"],
	.pagination .prev:hover,
	.pagination .next:hover,
	.cart-amount,
	.content-loop .entry-category a,
	.content-list .entry-category a,
	.content-grid .entry-category a,
	.content-search .entry-category a,
	.single #primary .entry-category a,
	#featured-slider .entry-category a,
	.panel-widget-style[data-title_alignment="center"] .widget-title:after,
	.panel-grid-cell .widget-title:after,
	.featured-content .content-wrap .button-wrap .button-orange a,
	.roll-progress .progress-animate,
	.pricing-section.style2 .plan-item.featured-plan .plan-btn .roll-button	 {
		background-color: <?php echo $primary_color; ?>;
	}
	.read-more a:hover,
	.author-box a:hover,
	.page-content a:hover,
	.entry-content a:hover,
	.widget_tag_cloud .tagcloud a:hover:before,
	.entry-tags .tag-links a:hover:before,
	.content-loop .entry-title a:hover,
	.content-list .entry-title a:hover,
	.content-grid .entry-title a:hover,
	article.hentry .edit-link a:hover,
	.site-footer .widget ul li a:hover,
	.comment-content a:hover {
		color: <?php echo $primary_color; ?>;
	}	
	.bx-wrapper .bx-pager.bx-default-pager a:hover,
	.bx-wrapper .bx-pager.bx-default-pager a.active,
	.bx-wrapper .bx-pager.bx-default-pager a:focus,
	.pagination .page-numbers:hover,
	.pagination .page-numbers.current,
	.sidebar .widget ul li:before,
	.widget_newsletter input[type="submit"],
	.widget_newsletter input[type="button"],
	.widget_newsletter button {
		background-color: <?php echo $primary_color; ?>;
	}
	.slicknav_nav,
	.header-search,
	.sf-menu li a:before,
	 .featured-content .content-wrap .button-wrap .button-orange a,
	.roll-project .project-item:hover > .item-wrap .project-title-wrap,
	.pricing-section.style2 .plan-item.featured-plan {
		border-color: <?php echo $primary_color; ?>;
	}

	<?php if ($secondary_color != null) : ?>
		.page-header {
			background: <?php echo $secondary_color; ?>;
			background: linear-gradient(0,<?php echo $secondary_color; ?>,<?php echo $secondary_color; ?>);	
		}
	<?php endif; ?>

	/* WooCommerce Colors */
	.woocommerce #respond input#submit.alt,
	.woocommerce a.button.alt,
	.woocommerce button.button.alt,
	.woocommerce input.button.alt,
	.woocommerce #respond input#submit,
	.woocommerce a.button,
	.woocommerce button.button,
	.woocommerce input.button,
	.woocommerce #respond input#submit.alt:hover,
	.woocommerce a.button.alt:hover,
	.woocommerce button.button.alt:hover,
	.woocommerce input.button.alt:hover,
	.woocommerce #respond input#submit:hover,
	.woocommerce a.button:hover,
	.woocommerce button.button:hover,
	.woocommerce input.button:hover,
	.woocommerce nav.woocommerce-pagination ul li:hover  {
		background-color: <?php echo $primary_color; ?>;
	}

	.woocommerce #respond input#submit.alt,
	.woocommerce a.button.alt,
	.woocommerce button.button.alt,
	.woocommerce input.button.alt,
	.woocommerce #respond input#submit,
	.woocommerce a.button,
	.woocommerce button.button,
	.woocommerce input.button,
	.woocommerce #respond input#submit.alt:hover,
	.woocommerce a.button.alt:hover,
	.woocommerce button.button.alt:hover,
	.woocommerce input.button.alt:hover,
	.woocommerce #respond input#submit:hover,
	.woocommerce a.button:hover,
	.woocommerce button.button:hover,
	.woocommerce input.button:hover  { 
		border-color: <?php echo $primary_color; ?>;
	}

	body.woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover,
	.woocommerce nav.woocommerce-pagination ul li span.current,
	.woocommerce ul.products li.product:hover .woocommerce-loop-product__title { 
		color: <?php echo $primary_color; ?>;
	}

</style>

</head>

<body <?php body_class(); ?>>

<?php if (is_front_page()) { do_action('greatwall_pro_before_site'); } //Hooked: greatwall_pro_preloader() ?>

<div id="page" class="site">

	<header id="masthead" class="site-header clear">

		<div class="container">

		<div class="site-branding">

			<?php if (get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png') != null) { ?>
			
			<div id="logo">
				<span class="helper"></span>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img src="<?php echo get_theme_mod('logo', get_template_directory_uri().'/assets/img/logo.png'); ?>" alt=""/>
				</a>
			</div><!-- #logo -->

			<?php } else { ?>

			<div class="site-title">
				<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			</div><!-- .site-title -->

			<?php } ?>

		</div><!-- .site-branding -->		

		<nav id="primary-nav" class="primary-navigation <?php if ( get_theme_mod('header-search-on', true) ) { echo 'has-search-icon'; } ?>">

			<?php 
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
				} else {
			?>

				<ul id="primary-menu" class="sf-menu">
					<li><a href="<?php echo home_url(); ?>/wp-admin/nav-menus.php"><?php echo __('Add menu for location: Primary Menu', 'greatwall-pro'); ?></a></li>
				</ul><!-- .sf-menu -->

			<?php } ?>

		</nav><!-- #primary-nav -->

		<div id="slick-mobile-menu"></div>

		<?php if ( get_theme_mod('header-search-on', true) ) : ?>
			
			<span class="search-icon">
				<span class="genericon genericon-search"></span>
				<span class="genericon genericon-close"></span>			
			</span>

			<div class="header-search">
				<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" name="s" class="search-input" placeholder="Search for..." autocomplete="off">
					<button type="submit" class="search-submit"><?php echo __('Search', 'greatwall-pro'); ?></button>		
				</form>
			</div><!-- .header-search -->

		<?php endif; ?>						

		</div><!-- .container -->

	</header><!-- #masthead -->	

	<div class="header-space">
	</div>

<div id="content" class="site-content clear">
