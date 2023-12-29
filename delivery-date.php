<?php
/*
* Plugin Name:       Delivery Date
* Plugin URI:        https://github.com/fabriziodeltufo/delivery-date
* Description:       Show Delivery Date 
* Version:           1.0.0
* Requires at least: 6.4.2
* Requires PHP:      7.4.33
* Author:            Fabrizio Del Tufo
* Author URI:        https://github.com/fabriziodeltufo
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




// SHORTCODE STYLE
function fdtdd_style() {

	wp_enqueue_style( 'fdtdd-style', FDTDD_PLUGIN_URL . 'css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'fdtdd_style' );



// PLUGIN SHORTCODE
function fdtdd_shortcode(){


    $numDays = get_option( 'fdtdd_delivery_date' );
    $deliverDate = Date('d.m.y' , strtotime( '+' . $numDays . 'days') );

    return ' <p class="delivery-date">🚚 Ordina oggi e ricevi il <strong>'. $deliverDate.'</strong></p>';

}
add_shortcode('delivery-date','fdtdd_shortcode');





// PLUGIN BACKEND 
include( FDTDD_PLUGIN_DIR . 'backend/delivery-date-menu.php' );
include( FDTDD_PLUGIN_DIR . 'backend/delivery-date-settings.php' );














