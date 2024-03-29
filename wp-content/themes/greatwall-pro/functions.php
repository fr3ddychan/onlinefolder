<?php
/**
 * greatwall_pro functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package greatwall_pro
 */

if ( ! function_exists( 'greatwall_pro_setup' ) ) :

function greatwall_pro_setup() {

	load_theme_textdomain( 'greatwall-pro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'greatwall-pro' ),
		'footer' => esc_html__( 'Footer Menu', 'greatwall-pro' ),		
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'greatwall_pro_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    add_editor_style( array( 'assets/css/editor-style.css', '' ) ); 
}
endif;
add_action( 'after_setup_theme', 'greatwall_pro_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function greatwall_pro_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'greatwall_pro_content_width', 790 );
}
add_action( 'after_setup_theme', 'greatwall_pro_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function greatwall_pro_sidebar_init() {
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'greatwall-pro' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'greatwall-pro' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Project Sidebar', 'greatwall-pro' ),
		'id'            => 'sidebar-project',
		'description'   => esc_html__( 'Add widgets here.', 'greatwall-pro' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'greatwall-pro' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'greatwall-pro' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'greatwall-pro' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'greatwall-pro' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'greatwall-pro' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'greatwall-pro' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'greatwall-pro' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'greatwall-pro' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'greatwall_pro_sidebar_init' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */

require get_template_directory() . '/admin/customizer-library.php';

require get_template_directory() . '/admin/customizer-options.php';

require get_template_directory() . '/admin/styles.php';

require get_template_directory() . '/admin/mods.php';

require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load plugins.
 */
require get_template_directory() . '/inc/plugins.php';

/**
 * Config Page Builder.
 */
require get_template_directory() . '/inc/page-builder.php';

/**
 * Woocommerce compatibility
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Enqueues scripts and styles.
 */
function greatwall_pro_scripts() {

    // load jquery if it isn't

    //wp_enqueue_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), '', true );

    //  Enqueues Javascripts                                                             	  
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), '', true );    
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/jquery.custom.js', array(), '20180101', true );

    // Enqueues CSS styles
    wp_enqueue_style( 'greatwall-pro-style', get_stylesheet_uri(), array(), '20180523' );     
    wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'genericons-style',  get_template_directory_uri() . '/genericons/genericons.css' );
    wp_enqueue_style( 'woocommerce-style',  get_template_directory_uri() . '/woocommerce.css' );

    if ( get_theme_mod( 'site-layout', 'choice-1' ) == 'choice-1' ) {
    	wp_enqueue_style( 'responsive-style',   get_template_directory_uri() . '/responsive.css', array(), '20180410' ); 
	}
	
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }    
}
add_action( 'wp_enqueue_scripts', 'greatwall_pro_scripts' );

/**
 * Post Thumbnails.
 */
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 300, true ); // default Post Thumbnail dimensions (cropped)
    add_image_size( 'featured_thumb', 790, 442, true );      
    add_image_size( 'post_thumb', 790, 442, true );  
    add_image_size( 'single_thumb', 790, 442, true );  
    add_image_size( 'grid_thumb', 360, 201, true );
    add_image_size( 'full_thumb', 1170);
    add_image_size( 'employee_thumb', 343);
    add_image_size( 'project_thumb', 343, 228, true );
    add_image_size( 'blog_thumb', 343, 228, true );
    add_image_size( 'widget_post_thumb', 80, 80, true );                                    
}

/**
 * Registers custom widgets.
 */
function greatwall_pro_widgets_init() {


	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-featured-content.php';
	register_widget( 'greatwall_pro_Home_Featured_Content_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-services-type-a.php';
	register_widget( 'GreatWall_Pro_Services_Type_A' );			

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-services-type-b.php';
	register_widget( 'GreatWall_Pro_Services_Type_B' );	

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-latest-news.php';
	register_widget( 'GreatWall_Pro_Latest_News' );				

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-testimonials.php';
	register_widget( 'GreatWall_Pro_Testimonials' );	

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-facts.php';
	register_widget( 'GreatWall_Pro_Facts' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-skills.php';
	register_widget( 'GreatWall_Pro_Skills' );						

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-timeline.php';
	register_widget( 'GreatWall_Pro_Timeline' );	

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-portfolio.php';
	register_widget( 'GreatWall_Pro_Portfolio' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-employees.php';
	register_widget( 'GreatWall_Pro_Employees' );					

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-contact.php';
	register_widget( 'GreatWall_Pro_Home_Contact_Info' );	

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-clients.php';
	register_widget( 'GreatWall_Pro_Clients' );	

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-call-to-action.php';
	register_widget( 'GreatWall_Pro_Action' );	

	require trailingslashit( get_template_directory() ) . 'inc/widgets/home-pricing.php';
	register_widget( 'GreatWall_Pro_Pricing_Tables_Widget' );				

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-contact.php';
	register_widget( 'GreatWall_Pro_Contact_Info' );				

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-popular.php';
	register_widget( 'greatwall_pro_Popular_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-recent.php';
	register_widget( 'greatwall_pro_Recent_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-random.php';
	register_widget( 'greatwall_pro_Random_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-views.php';
	register_widget( 'greatwall_pro_Views_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-social.php';
	register_widget( 'greatwall_pro_Social_Widget' );

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-ad.php';
	register_widget( 'greatwall_pro_Ad_Widget' );	

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-newsletter.php';
	register_widget( 'greatwall_pro_Newsletter_Widget' );												

}
add_action( 'widgets_init', 'greatwall_pro_widgets_init' );

/* Demo Content*/
require_once dirname( __FILE__ ) . '/demo-content/setup.php';

/* Fix PHP warning */
function _get($str){
    $val = !empty($_GET[$str]) ? $_GET[$str] : null;
    return $val;
}

/**
 * Preloader
 */
function greatwall_pro_preloader() {
	?>
<div class='preloader-wrap'>
  <div class='preloader'>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
  </div>
</div>

	<?php
}
add_action('greatwall_pro_before_site', 'greatwall_pro_preloader');

