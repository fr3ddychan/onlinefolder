<?php
/**
 * Page builder support
 *
 * @package GreatWall_Pro
 */


/* Defaults */
add_theme_support( 'siteorigin-panels', array( 
	'margin-bottom' => 0,
) );

/* Theme widgets */
function greatwall_theme_widgets($widgets) {
	$theme_widgets = array(
		'greatwall_pro_Home_Featured_Content_Widget',		
		'GreatWall_Pro_Services_Type_A',
		'GreatWall_Pro_Services_Type_B',
		'GreatWall_Pro_Pricing_Tables_Widget',
		'GreatWall_Pro_Facts',
		'GreatWall_Pro_Clients',
		'GreatWall_Pro_Testimonials',
		'GreatWall_Pro_Skills',
		'GreatWall_Pro_Action',
		//'GreatWall_Pro_Video_Widget',
		//'GreatWall_Pro_Social_Profile',
		'GreatWall_Pro_Employees',
		'GreatWall_Pro_Timeline',
		'GreatWall_Pro_Latest_News',
		'GreatWall_Pro_Home_Contact_Info',
		//'GreatWall_Pro_Latest_News_Type_B',
		'GreatWall_Pro_Portfolio',
		//'GreatWall_Pro_Image_Widget',
		'GreatWall_Pro_Pricing_Tables'
	);
	foreach($theme_widgets as $theme_widget) {
		if( isset( $widgets[$theme_widget] ) ) {
			$widgets[$theme_widget]['groups'] = array('greatwall-pro-theme');
			$widgets[$theme_widget]['icon'] = 'dashicons dashicons-schedule';
		}
	}
	return $widgets;
}
add_filter('siteorigin_panels_widgets', 'greatwall_theme_widgets');

/* Add a tab for the theme widgets in the page builder */
function greatwall_theme_widgets_tab($tabs){
	$tabs[] = array(
		'title' => __('GreatWall Pro Theme Widgets', 'greatwall-pro'),
		'filter' => array(
			'groups' => array('greatwall-pro-theme')
		)
	);
	return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'greatwall_theme_widgets_tab', 20);

/* Replace default row options */
function greatwall_row_styles($fields) {

	$fields['bottom_border'] = array(
		'name' => __('Bottom Border Color', 'greatwall-pro'),
		'type' => 'color',
		'priority' => 3,
		'group'	   => 'design'		
	);
	$fields['padding'] = array(
		'name' => __('Top/bottom padding', 'greatwall-pro'),
		'type' => 'measurement',
		'description' => __('Add a value in the field to change the top/bottom row padding, otherwise 100px will be applied by default', 'greatwall-pro'),
		'priority' => 4,
		'group'	   => 'layout'
	);
	$fields['align'] = array(
		'name' => __('Center align the content?', 'greatwall-pro'),
		'type' => 'checkbox',
		'description' => __('This may or may not work. It depends on the widget styles.', 'greatwall-pro'),
		'priority' => 5,
		'group'	   => 'design'		
	);		

	$fields['color'] = array(
		'name' => __('Color', 'greatwall-pro'),
		'type' => 'color',
		'description' => __('Color of the row.', 'greatwall-pro'),
		'priority' => 7,
		'group'	   => 'design'	
	);	
	$fields['background_image'] = array(
		'name' => __('Background Image', 'greatwall-pro'),
		'type' => 'image',
		'description' => __('Background image of the row.', 'greatwall-pro'),
		'priority' => 8,
		'group'		=> 'design'
	);

	$fields['mobile_padding'] = array(
		'name' 		  => __('Mobile padding', 'greatwall-pro'),
		'type' 		  => 'select',
		'description' => __('Here you can select a top/bottom row padding for screen sizes < 1024px', 'greatwall-pro'),		
		'options' 	  => array(
			'' 				=> __('Default', 'greatwall-pro'),
			'mob-pad-0' 	=> __('0', 'greatwall-pro'),
			'mob-pad-15'    => __('15px', 'greatwall-pro'),
			'mob-pad-30'    => __('30px', 'greatwall-pro'),
			'mob-pad-45'    => __('45px', 'greatwall-pro'),
		),
		'priority'    => 21,
		'group'	   => 'layout'		
	);
	$fields['overlay'] = array(
	    'name'        => __('Disable row overlay?', 'greatwall-pro'),
	    'type'        => 'checkbox',
	    'group'       => 'design',
	    'priority'    => 14,
	);
	$fields['overlay_color'] = array(
	    'name'        => __('Overlay color', 'greatwall-pro'),
	    'type'        => 'color',
	    'default'	  => '#000000',
	    'group'       => 'design',
	    'priority'    => 15,
	);

	return $fields;
}
//remove_filter('siteorigin_panels_row_style_fields', array('SiteOrigin_Panels_Default_Styling', 'row_style_fields' ) );
add_filter('siteorigin_panels_row_style_fields', 'greatwall_row_styles');

/* Filter for the styles */
function greatwall_row_styles_output($attr, $style) {
	//$attr['style'] = '';

	if(!empty($style['bottom_border'])) $attr['style'] .= 'border-bottom: 1px solid '. esc_attr($style['bottom_border']) . ';';
	
	if(!empty($style['color'])) {
		$attr['style'] .= 'color: ' . esc_attr($style['color']) . ';';
		$attr['data-hascolor'] = 'hascolor';
	}
	
	if(!empty($style['align'])) $attr['style'] .= 'text-align: center;';
	if(!empty( $style['background_image'] )) {
		$url = wp_get_attachment_image_src( $style['background_image'], 'full' );
		if( !empty($url) ) {
			$attr['style'] .= 'background-image: url(' . esc_url($url[0]) . ');';
			$attr['data-hasbg'] = 'hasbg';
		}
	}
	if(!empty($style['padding'])) {
		$attr['style'] .= 'padding: ' . esc_attr($style['padding']) . ' 0; ';
	} else {
		$attr['style'] .= 'padding: 100px 0; ';
	}

	if( !empty( $style['mobile_padding'] ) ) {
		$attr['class'][] = esc_attr($style['mobile_padding']);
	}
    if( !empty( $style['column_padding'] ) ) {
       $attr['class'][] = 'no-col-padding';
    }
    
	if ( empty($style['overlay']) ) {
    	$attr['data-overlay'] = 'true';
	}
	if ( !empty($style['overlay_color']) ) {
    	$attr['data-overlay-color'] = esc_attr($style['overlay_color']);		
	}

	if(empty($attr['style'])) unset($attr['style']);
	return $attr;
}
add_filter('siteorigin_panels_row_style_attributes', 'greatwall_row_styles_output', 10, 2);

/**
 * Page builder widget options
 */
function greatwall_custom_widget_style_fields($fields) {
	$fields['title_alignment'] = array(
	    'name'        => __('Title alignment', 'greatwall-pro'),
		'type' 		  => 'select',
	    'group'       => 'design',
		'options' => array(
			'left' => __('Left', 'greatwall-pro'),
			'center' => __('Center', 'greatwall-pro'),
			'right' => __('Right', 'greatwall-pro'),
		),
		'default'	  => 'center',
	    'description' => __('This setting depends on the content, it may or may not work', 'greatwall-pro'),
	    'priority'    => 9,
	);		
	$fields['content_alignment'] = array(
	    'name'        => __('Content alignment', 'greatwall-pro'),
		'type' 		  => 'select',
	    'group'       => 'design',
		'options' => array(
			'left' => __('Left', 'greatwall-pro'),
			'center' => __('Center', 'greatwall-pro'),
			'right' => __('Right', 'greatwall-pro'),
		),
		'default'	  => 'center',
	    'description' => __('This setting depends on the content, it may or may not work', 'greatwall-pro'),
	    'priority'    => 10,
	);	
	$fields['title_color'] = array(
	    'name'        => __('Widget title color', 'greatwall-pro'),
	    'type'        => 'color',
	    'default'	  => '#443f3f',
	    'group'       => 'design',
	    'priority'    => 11,
	);	
	$fields['headings_color'] = array(
	    'name'        => __('Headings color', 'greatwall-pro'),
	    'type'        => 'color',
	    'default'	  => '#443f3f',
	    'group'       => 'design',
	    'description' => __('This applies to all headings in the widget, except the widget title', 'greatwall-pro'),
	    'priority'    => 12,
	);

  return $fields;
}
add_filter( 'siteorigin_panels_widget_style_fields', 'greatwall_custom_widget_style_fields');

/**
 * Output page builder widget options
 */
function greatwall_custom_widget_style_attributes( $attributes, $args ) {

	if ( !empty($args['title_color']) ) {
    	$attributes['data-title-color'] = esc_attr($args['title_color']);		
	}
	if ( !empty($args['headings_color']) ) {
    	$attributes['data-headings-color'] = esc_attr($args['headings_color']);		
	}
	if ( !empty($args['title_alignment']) ) {
    	$attributes['data-title_alignment'] = esc_attr($args['title_alignment']);		
	}	
	if ( !empty($args['content_alignment']) ) {
		$attributes['style'] .= 'text-align: ' . esc_attr($args['content_alignment']) . ';';
	}	
    return $attributes;
}
add_filter('siteorigin_panels_widget_style_attributes', 'greatwall_custom_widget_style_attributes', 10, 2);

/**
 * Remove defaults
 */
function greatwall_remove_default_so_row_styles( $fields ) {
	unset( $fields['background_image_attachment'] );
	unset( $fields['background_display'] );
	unset( $fields['border_color'] );	
	return $fields;
}
add_filter('siteorigin_panels_row_style_fields', 'greatwall_remove_default_so_row_styles' );
add_filter('siteorigin_premium_upgrade_teaser', '__return_false');