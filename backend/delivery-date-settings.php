<?php
/*
Delivery Date settings:  option / section / field
*/

function delivdate_settings_cb() {



    // SETTING THE OPTION
    // If option is not present, it is created in wp-options table.
    if ( !get_option( 'delivery_date' ) ) {
        add_option( 'delivery_date' ) ;
    }


    // SETTING SECTION : Define ( at least ) one section

    add_settings_section(
        // Unique identifier for the section
        'delivdate_section',
        // Section Title
        __( 'Delivery Date Section', 'delivdate' ),
        // Callback for an optional description
        'delivdate_section_cb',
        // Admin page to add section to
        'delivdate_page'
    );

    function delivdate_section_cb() {
        esc_html_e( 'Insert the number of days after the order to deliver the item', 'delivdate' );
    }






    // SETTING FIELD
    add_settings_field(
        // Unique identifier for field
        'delivdate_field',
        // Field Title
        __( 'Delivery Date', 'delivdate' ),
        // Callback for field markup
        'delivdate_field_cb',
        // Page to go on
        'delivdate_page',
        // Section to go in
        'delivdate_section',

        array( 'class' => 'delivery-date' )

    );




    function delivdate_field_cb() {

        $options = get_option( 'delivery_date' );

        // $deliveryDate = '';

        // if ( isset( $options[ 'delivery_date' ] ) ) {
        //     $deliveryDate = esc_html( $options[ 'delivery_date' ] );
        // }

        echo '<input REQUIRED type="text" name="delivery_date" value="' . $options . '" />';

    }





    // REGISTERING THE SETTINGS //
    register_setting(
        'delivdate_field',
        'delivery_date'
    );

}

add_action( 'admin_init', 'delivdate_settings_cb' );