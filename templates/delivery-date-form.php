<!-- FORM x Delivery date input text value -->

<div class="wrap">

    <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>

    <form method="post" action="options.php">

        <!-- Display necessary hidden fields for settings -->
        <?php settings_fields( 'delivdate_setting_field' );
    ?>

        <!-- Display the settings sections for the page -->
        <?php do_settings_sections( 'delivdate_setting_section' );
        
    ?>

        <!-- Default Submit Button -->
        <?php submit_button(); ?>
    </form>

    <hr>

</div>