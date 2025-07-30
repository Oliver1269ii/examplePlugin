<?php 
/**
 * @package ExamplePlugin
 */

namespace Inc\admin;

class ProductSettings {

    public static function register() {
        add_action( 'woocommerce_product_options_general_product_data', [ self::class, 'extra_options' ] );
    }

    public static function extra_options() {
        woocommerce_wp_checkbox( array(
            'id'          => '_custom_checkbox',
            'label'       => __( 'Label text', 'ExamplePlugin' ),
            'description' => __( 'Option description', 'ExamplePlugin' )
        ) );

        woocommerce_wp_select( array(
            'id'          => '_custom_select',
            'label'       => __( 'Select Option', 'ExamplePlugin' ),
            'options'     => array(
                ''        => __( 'Select an option', 'ExamplePlugin' ),
                'option1' => __( 'Option 1', 'ExamplePlugin' ),
                'option2' => __( 'Option 2', 'ExamplePlugin' ),
            )
        ) );

        woocommerce_wp_text_input( array(
            'id'                => '_custom_number',
            'label'             => __( 'Quantity', 'ExamplePlugin' ),
            'type'              => 'number',
            'custom_attributes' => array(
                'step' => '1',
                'min'  => '0'
            )
        ) );
        
        
    }
}
