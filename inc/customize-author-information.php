<?php
class TheSportsanctum_Author_Customizer {
    public function __construct() {
        add_action( 'customize_register', array( $this, 'register_customize_sections' ) );
    }
    public function register_customize_sections( $wp_customize ) {
        /*
        * Add settings to sections.
        */
        $this->author_callout_section( $wp_customize );
    }

    /* Sanitize Inputs to validate data */
    public function sanitize_custom_option($input) {
        return ( $input === "No" ) ? "No" : "Yes";
    }
    public function sanitize_custom_text($input) {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }
    public function sanitize_custom_url($input) {
        return filter_var($input, FILTER_SANITIZE_URL);
    }
    public function sanitize_custom_email($input) {
        return filter_var($input, FILTER_SANITIZE_EMAIL);
    }
    public function sanitize_hex_color( $color ) {
        if ( '' === $color ) {
            return '';
        }

        // 3 or 6 hex digits, or the empty string.
        if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
            return $color;
        }
    }

    /* Author Section */
    private function author_callout_section( $wp_customize ) {


        /**
         * We are going to have only one panel so add only one section
         */
        $wp_customize->add_section('author-callout-section', array(
            'title' => 'Author',
            'priority' => 2,
            'description' => __('The Author section is only displayed on the Blog page.', 'theminimalist'),
        ));




        /**
         * In this control we will add a dropdown choices to. If they say yes it will display else won't display
         * And this has one section and one control
         */
        $wp_customize->add_setting('author-callout-display', array(
            'default' => 'No',
            'sanitize_callback' => array( $this, 'sanitize_custom_option' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'author-callout-display-control', array(
            'label' => 'Display this section?',
            'section' => 'author-callout-section',
            'settings' => 'author-callout-display',
            'type' => 'select',
            'choices' => array('No' => 'No', 'Yes' => 'Yes')
        )));





        /**
         * In this control we will add some text about author
         * And this has one section and one control
         */
        $wp_customize->add_setting('author-callout-text', array(
            'default' => '',
            'sanitize_callback' => array( $this, 'sanitize_custom_text' )
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-author-callout-control', array(
            'label' => 'About Author',
            'section' => 'author-callout-section',
            'settings' => 'author-callout-text',
            'type' => 'textarea'
        )));




        /**
         * In this control we will add an image for author
         * And this has one section and one control
         */
        $wp_customize->add_setting('author-callout-image', array(
            'default' => '',
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => array( $this, 'sanitize_custom_url' )
        ));
        $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'author-callout-image-control', array(
            'label' => 'Image',
            'section' => 'author-callout-section',
            'settings' => 'author-callout-image',
            'width' => 442,
            'height' => 310
        )));
    }
}
