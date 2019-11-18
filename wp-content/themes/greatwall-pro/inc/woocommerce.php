<?php
/**
 * Woocommerce Compatibility 
 *
 * @package greatwall-pro Pro
 */


if ( !class_exists('WooCommerce') )
    return;

/**
 * Declare support
 */
/* WooCommerce */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
  echo '<div class="container">';  
}

function my_theme_wrapper_end() {
  echo '</div>';    
  echo '</section>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support( 'wc-product-gallery-slider');    
}

$link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
/**
 * Variable products button
 */
function greatwall_pro_single_variation_add_to_cart_button() {
    global $product;
    ?>
    <div class="woocommerce-variation-add-to-cart variations_button">
        <?php
            do_action( 'woocommerce_before_add_to_cart_quantity' );

            woocommerce_quantity_input( array(
                'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1,
            ) );

            do_action( 'woocommerce_after_add_to_cart_quantity' );
        ?>
        <button type="submit" class="roll-button cart-button"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
        <input type="hidden" name="add-to-cart" value="<?php echo absint( $product->get_id() ); ?>" />
        <input type="hidden" name="product_id" value="<?php echo absint( $product->get_id() ); ?>" />
        <input type="hidden" name="variation_id" class="variation_id" value="0" />
    </div>
     <?php
}
add_action( 'woocommerce_single_variation', 'greatwall_pro_single_variation_add_to_cart_button', 21 );

/**
 * Update cart
 */
function greatwall_pro_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    ?>
    <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>"><i class="fa fa-shopping-cart"></i><span class="cart-amount"><?php echo WC()->cart->cart_contents_count; ?></span></a>
    <?php
    
    $fragments['a.cart-contents'] = ob_get_clean();
    
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'greatwall_pro_header_add_to_cart_fragment' );

/**
 * Add cart to menu
 */
function greatwall_pro_nav_cart ( $items, $args ) {
    $show_car_menu = get_theme_mod('cart-menu-on', true);
    if ( $show_car_menu ) {
        if ( $args -> theme_location == 'primary' ) {
            $items .= '<li class="nav-cart"><a class="cart-contents" href="' . wc_get_cart_url() . '"><i class="fa fa-shopping-cart"></i><span class="cart-amount">' . WC()->cart->cart_contents_count . '</span></a></li>';
        }
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'greatwall_pro_nav_cart', 10, 2 );

/**
 * Woocommerce account link in header
 */
function greatwall_pro_woocommerce_account_link( $items, $args ) {
    $show_car_menu = get_theme_mod('cart-menu-on', true);
    if ( $show_car_menu && ( $args -> theme_location == 'primary' ) ) {
        if ( is_user_logged_in() ) {
            $account = __( 'My Account', 'greatwall-pro' );
        } else {
            $account = __( 'Login/Register', 'greatwall-pro' );
        }
        $items .= '<li class="header-account"><a href="' . get_permalink( get_option('woocommerce_myaccount_page_id') ) . '" title="' . $account . '"><i class="fa fa-user"></i></a></li>';
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'greatwall_pro_woocommerce_account_link', 10, 2 );

/**
 * Number of products
 */
//function greatwall_pro_woocommerce_products_number() {
 //   $default = get_option( 'posts_per_page' );
 //   $number  = get_theme_mod( 'swc_products_number', $default);

 //   return $number;
//}
//add_filter( 'loop_shop_per_page', 'greatwall_pro_woocommerce_products_number', 20 );
function greatwall_pro_products_per_page() {
    return intval( apply_filters( 'greatwall_pro_products_per_page', 12 ) );
}
add_filter( 'loop_shop_per_page', 'greatwall_pro_products_per_page' );


/**
 * Returns true if current page is shop, product archive or product tag
 */
function greatwall_pro_wc_archive_check() {
    if ( is_shop() || is_product_category() || is_product_tag() ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Remove sidebar from all archives
 */
function greatwall_pro_remove_wc_sidebar_archives() {
    $archive_check = greatwall_pro_wc_archive_check();
    $rs_archives = get_theme_mod( 'swc_sidebar_archives' );
    $rs_products = get_theme_mod( 'swc_sidebar_products' );

    //if ( ( $rs_archives && $archive_check ) || ( $rs_products && is_product() ) ) {
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    //} 
}
add_action( 'wp', 'greatwall_pro_remove_wc_sidebar_archives' );
