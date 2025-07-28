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
            'label'       => __( 'Label text', 'oliver1269woocommerce' ),
            'description' => __( 'Option description', 'oliver1269woocommerce' )
        ) );

        woocommerce_wp_select( array(
            'id'          => '_custom_select',
            'label'       => __( 'Select Option', 'your-textdomain' ),
            'options'     => array(
                ''        => __( 'Select an option', 'your-textdomain' ),
                'option1' => __( 'Option 1', 'your-textdomain' ),
                'option2' => __( 'Option 2', 'your-textdomain' ),
            )
        ) );

        woocommerce_wp_text_input( array(
            'id'                => '_custom_number',
            'label'             => __( 'Quantity', 'your-textdomain' ),
            'type'              => 'number',
            'custom_attributes' => array(
                'step' => '1',
                'min'  => '0'
            )
        ) );
        
        
    }
}
