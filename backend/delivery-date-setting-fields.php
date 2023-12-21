<?php
/*
Delivery Date setting field
*/

function delivdate_settings_cb() {



    // SETTING THE OPTION
    // If option is not present, it is created in wp-options table.
    if ( !get_option( 'delivery_date' ) ) {
        add_option( 'delivery_date' );




    }

    // SETTING SECTION : Define ( at least ) one section is mandatory

    add_settings_section(
        // Unique identifier for the section
        'delivdate_settings_section',
        // Section Title
        __( 'Delivery Date Section', 'delivdate' ),
        // Callback for an optional description
        'delivdate_settings_section_callback',
        // Admin page to add section to
        'delivdate'
    );

    function delivdate_settings_section_callback() {
        esc_html_e( 'Insert the number of days after the order to deliver the item', 'delivdate' );
    }






    // SETTING FIELD
    add_settings_field(
        // Unique identifier for field
        'delivdate_settings_field',
        // Field Title
        __( 'Delivery Date', 'delivdate' ),
        // Callback for field markup
        'delivdate_settings_field_callback',
        // Page to go on
        'delivdate',
        // Section to go in
        'delivdate_settings_section',

        array( 'class' => 'delivery-date' )

    );

    function delivdate_settings_field_callback() {

        $options = get_option( 'delivery_date' );

        $deliveryDate = '';

        if ( isset( $options[ 'delivery_date' ] ) ) {
            $deliveryDate = esc_html( $options[ 'delivery_date' ] );
        }

        // else {
        //   $cotd_field = get_option( 'admin_email' );
        // Settings: Administration Email Address
        //
        // }

        echo '<input REQUIRED type="text" id="" name="delivdate_settings[delivery_date]" value="' . $deliveryDate . '" />';

    }

    // REGISTERING THE SETTINGS //
    register_setting(
        'delivdate_settings',
        'delivdate_settings'
    );

}

add_action( 'admin_init', 'delivdate_settings_cb' );