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
* Text Domain:       delivdate
* Domain Path:       /languages
*/



/* SECURITY  */
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


// define( 'WPPLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WPPLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WPPLUGIN_URL', plugin_dir_url( __FILE__ ) );




// SHORTCODE STYLE
function delivdate_style_and_scripts() {

	wp_enqueue_style( 'delivdate-style', WPPLUGIN_URL . 'css/style.css' );
}
add_action( 'wp_enqueue_scripts', 'delivdate_style_and_scripts' );



// PLUGIN SHORTCODE
function delivdate_shortcode(){


    $numDays = get_option( 'delivery_date' );
    $deliverDate = Date('d.m.y' , strtotime( '+' . $numDays . 'days') );

    return ' <p class="delivery-date">🚚 Ordina oggi e ricevi il <strong>'. $deliverDate.'</strong></p>';

}
add_shortcode('delivery-date','delivdate_shortcode');





// PLUGIN BACKEND 
include( WPPLUGIN_DIR . 'backend/delivery-date-menu.php' );
include( WPPLUGIN_DIR . 'backend/delivery-date-settings.php' );














