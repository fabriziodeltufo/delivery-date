<!-- FORM x Delivery date input text value -->

<div class="wrap">

    <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>

    <form method="post" action="options.php">

        <!-- Display the settings sections for the page -->
        <?php do_settings_sections( 'delivdate_page' );

  ?>

        <!-- Display necessary hidden fields for settings -->
        <?php settings_fields( 'delivdate_field' );
    ?>



        <!-- Default Submit Button -->
        <?php submit_button(); ?>
        <!-- Status -->
        <?php settings_errors() ?>
    </form>

    <hr>

</div>