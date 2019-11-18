<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function customizer_library_demo_options() {

	// Theme defaults
	$primary_color = '#f65a5b';
	$secondary_color = '';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// More Examples
	$section = 'examples';

	// Arrays 

	$layout_choices = array(
		'choice-1' => 'Responsive Layout',
		'choice-2' => 'Fixed Layout'
	);

	$loop_style_choices = array(
		'choice-1' => 'List Layout',
		'choice-2' => 'Blog Layout',
		'choice-3' => 'Grid Layout'
	);	

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Theme Settings', 'greatwall-pro' ),
		'priority' => '10'
	);

	$options['logo'] = array(
		'id' => 'logo',
		'label'   => __( 'Logo', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'image',
		'default' => get_template_directory_uri().'/assets/img/logo.png'
	);

	$options['favicon'] = array(
		'id' => 'favicon',
		'label'   => __( 'Favicon', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'image',
		'default' => ''
	);	

	$options['primary-color'] = array(
		'id' => 'primary-color',
		'label'   => __( 'Theme Primary Color', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color // hex
	);

	$options['secondary-color'] = array(
		'id' => 'secondary-color',
		'label'   => __( 'Page Header Background Color', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color // hex
	);

	$options['primary-font'] = array(
		'id' => 'primary-font',
		'label'   => __( 'Body Font', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => customizer_library_get_font_choices(),
		'default' => 'Open Sans'
	);

	$options['secondary-font'] = array(
		'id' => 'secondary-font',
		'label'   => __( 'Heading Font', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => customizer_library_get_font_choices(),
		'default' => 'Open Sans'
	);	

	$options['site-layout'] = array(
		'id' => 'site-layout',
		'label'   => __( 'Site Layout', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'radio',
		'choices' => $layout_choices,
		'default' => 'choice-1'
	);

	$options['sticky-nav-on'] = array(
		'id' => 'sticky-nav-on',
		'label'   => __( 'Sticky header navigation', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);			

	$options['header-search-on'] = array(
		'id' => 'header-search-on',
		'label'   => __( 'Display header search form', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['cart-menu-on'] = array(
		'id' => 'cart-menu-on',
		'label'   => __( 'Display cart menu on header', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['projects-page-title'] = array(
		'id' => 'projects-page-title',
		'label'   => __( 'Projects Page Title', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'Our Work',		
	);	

	$options['services-page-title'] = array(
		'id' => 'services-page-title',
		'label'   => __( 'Services Page Title', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'Our Services',		
	);

	$options['employees-page-title'] = array(
		'id' => 'employees-page-title',
		'label'   => __( 'Employees Page Title', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'Leadership Team',		
	);

	$options['blog-page-title'] = array(
		'id' => 'blog-page-title',
		'label'   => __( 'Blog Page Title', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'News from Our Blog',		
	);	

	$options['featured-content-on'] = array(
		'id' => 'featured-content-on',
		'label'   => __( 'Display featured content on homepage', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['featured-num'] = array(
		'id' => 'featured-num',
		'label'   => __( 'Number of featured posts to show', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '3',		
	);

	$options['loop-style'] = array(
		'id' => 'loop-style',
		'label'   => __( 'Latest Posts Style', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $loop_style_choices,
		'default' => 'choice-1'
	);	

	$options['entry-excerpt-length'] = array(
		'id' => 'entry-excerpt-length',
		'label'   => __( 'Number of words to show on excerpt', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'text',
		'default' => '30',		
	);

	$options['full-project-on'] = array(
		'id' => 'full-project-on',
		'label'   => __( 'Make single project page full width', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['single-breadcrumbs-on'] = array(
		'id' => 'single-breadcrumbs-on',
		'label'   => __( 'Display breadcrumbs on single posts', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['single-share-on'] = array(
		'id' => 'single-share-on',
		'label'   => __( 'Display share icons on single posts', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['single-featured-on'] = array(
		'id' => 'single-featured-on',
		'label'   => __( 'Display featured image on single posts', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => true,
	);	

	$options['author-box-on'] = array(
		'id' => 'author-box-on',
		'label'   => __( 'Display author box on single posts', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	
	$options['related-posts-on'] = array(
		'id' => 'related-posts-on',
		'label'   => __( 'Display related posts on single posts', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['footer-widgets-on'] = array(
		'id' => 'footer-widgets-on',
		'label'   => __( 'Display footer widgets', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);

	$options['back-top-on'] = array(
		'id' => 'back-top-on',
		'label'   => __( 'Display "back to top" icon link on the site bottom', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 1,
	);	

	$options['footer-credit'] = array(
		'id' => 'footer-credit',
		'label'   => __( 'Customize Site Footer Text/Link', 'greatwall-pro' ),
		'section' => $section,
		'type'    => 'textarea',
		'default' => '&copy; ' . date("o") . ' <a href="' . home_url() .'">' . get_bloginfo('name') . '</a> - Theme by <a href="https://www.happythemes.com" target="_blank">HappyThemes</a>'
	);			

	//$options['example-range'] = array(
	//	'id' => 'example-range',
	//	'label'   => __( 'Example Range Input', 'greatwall-pro' ),
	//	'section' => $section,
	//	'type'    => 'range',
	//	'input_attrs' => array(
	//      'min'   => 0,
	//        'max'   => 10,
	//        'step'  => 1,
	//       'style' => 'color: #0a0',
	//	)
	//);

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_demo_options' );