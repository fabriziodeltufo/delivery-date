<?php

// ADMIN PLUGIN MENU
function delivdate_plugin_menu()
{
    add_menu_page(
        __( 'Delivery Date', 'delivdate' ), // page title
        __( 'Delivery Date', 'delivdate' ), // menu title
        'manage_options', // capability
        'delivdate', // plugin text domain / menu-slug
        'delivdate_cb', // callback fx to output the content (form in the page)
        'dashicons-admin-site', // plugin menu icon
        0 // menu position in the sidebar
    );
}
add_action( 'admin_menu', 'delivdate_plugin_menu' );



// HTML PAGE 
function delivdate_cb()
{
    // Double check user capabilities
    if ( !current_user_can('manage_options') ) {
      return;
    }


     
    include( plugin_dir_path( __FILE__ ) . 'delivery-date-setting-fields.php' );  // call to setting fields for form
    
    include( WPPLUGIN_DIR . 'templates/delivery-date-html-page.php' ); // call to html page  - form


}
