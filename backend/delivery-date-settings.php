<?php
/*
Delivery Date settings:  option / section / field
*/

function fdtdd_settings_cb() {



    // SETTING THE OPTION
    // If option is not present, it is created in wp-options table.
    if ( !get_option( 'fdtdd_delivery_date' ) ) {
        add_option( 'fdtdd_delivery_date' ) ;
    }


    // SETTING SECTION : Define ( at least ) one section

    function fdtdd_section_cb() {
        esc_html_e( 'Insert the number of days after the order to deliver the item', 'fdtdd' );
    }

    add_settings_section(
        // Unique identifier for the section
        'fdtdd_section',
        // Section Title
        __( 'Delivery Date Section', 'fdtdd' ),
        // Callback for an optional description
        'fdtdd_section_cb',
        // Admin page to add section to
        'fdtdd_page'
    );




    // SETTING FIELD
    function fdtdd_field_cb() {
        $options = get_option( 'fdtdd_delivery_date' );

        // $deliveryDate = '';

        // if ( isset( $options[ 'delivery_date' ] ) ) {
        //     $deliveryDate = esc_html( $options[ 'delivery_date' ] );
        // }
        echo '<input REQUIRED type="text" name="fdtdd_delivery_date" value="' . $options . '" />';
    }

    add_settings_field(
        // Unique identifier for field
        'fdtdd_field',
        // Field Title
        __( 'Delivery Date', 'fdtdd' ),
        // Callback for field markup
        'fdtdd_field_cb',
        // Page to go on
        'fdtdd_page',
        // Section to go in
        'fdtdd_section',

        array( 'class' => 'delivery-date' )

    );



    // REGISTERING THE SETTINGS //
    register_setting(
        'fdtdd_field', // settings_field
        'fdtdd_delivery_date' // input text field nzme
    );

}

add_action( 'admin_init', 'fdtdd_settings_cb' );
