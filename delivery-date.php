<?php
/*
* Plugin Name:       Delivery Date
* Plugin URI:        https://wewebby.gumroad.com/
* Description:       Manage / show a Delivery Date for a woocommerce product.
* Version:           1.0.0
* Requires at least: 6.4.2
* Requires PHP:      7.4.33
* Author:            WeWebby.com
* Author URI:        https://wewebby.com
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:       fdtdd
* Domain Path:       /languages
*/


/* SECURITY  */
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

define( 'FDTDD_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'FDTDD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );




// SHORTCODE FRONT END STYLE
function fdtdd_style() {

	wp_enqueue_style( 'fdtdd-style', FDTDD_PLUGIN_URL . 'frontend/css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'fdtdd_style' );



// PLUGIN SHORTCODE
function fdtdd_shortcode(){


    $numDays = get_option( 'fdtdd_delivery_date' );
    $deliverDate = Date('d.m.y' , strtotime( '+' . $numDays . 'days') );
    $deliveryText = '🚚 Order now and receive on : ';


    return ' <p class="delivery-date">' . $deliveryText . '<strong>'. $deliverDate.'</strong></p>';

}
add_shortcode('delivery-date','fdtdd_shortcode');





// PLUGIN BACKEND 
include( FDTDD_PLUGIN_DIR . 'backend/delivery-date-menu.php' );
include( FDTDD_PLUGIN_DIR . 'backend/delivery-date-settings.php' );














