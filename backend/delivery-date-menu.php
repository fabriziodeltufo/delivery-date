<?php

// PLUGIN FORM
function fdtdd_template_cb()
{
    // Double check user capabilities
    if ( !current_user_can('manage_options') ) {
      return;
    }

    include( FDTDD_PLUGIN_DIR . 'templates/delivery-date-form.php' ); // call to form
}




//  PLUGIN MENU / PAGE
function fdtdd_plugin_menu()
{
    add_menu_page(
        __( 'Delivery Date', 'fdtdd' ), // page title
        __( 'Delivery Date', 'fdtdd' ), // menu title
        'manage_options', // capability
        'fdtdd', // plugin text domain / menu-slug
        'fdtdd_template_cb', // callback fx to output the content (form in the page)
        'dashicons-menu', // plugin menu icon
        0 // menu position in the sidebar
    );
}
add_action( 'admin_menu', 'fdtdd_plugin_menu' );


 ?>
