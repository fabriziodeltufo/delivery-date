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


// SHORTCODE STYLE
function delivdate_include_style_and_scripts() {

	wp_enqueue_style( 'delivdate-style', plugins_url( 'style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'delivdate_include_style_and_scripts' );





// PLUGIN SHORTCODE
function delivdate_product(){

    $deliver = Date('d.m.y', strtotime('+3 days'));

    return ' <p class="delivery-date">🚚 Ordina oggi e ricevi il <strong>'. $deliver.'</strong></p>';

}
add_shortcode('delivery-date','delivdate_product');









