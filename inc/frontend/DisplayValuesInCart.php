<?php
/**
 * @package ExamplePlugin
 */

namespace Inc\frontend;

class DisplayValuesInCart{
    public static function register(){
        add_filter( 'woocommerce_get_item_data', [self::class, 'display_custom_checkbox_cart_data'], 10, 2 );
    }

    public static function display_custom_checkbox_cart_data( $item_data, $cart_item ) {
        if ( isset( $cart_item['custom_checkbox_option'] ) && $cart_item['custom_checkbox_option'] === 'yes' ) {
            $price = 1269.00;
            $item_data[] = array(
                'key'   => __( 'Huller ' . $price . 'kr,-', 'ExamplePlugin' ),
                'value' => __( '', 'ExamplePlugin' ),
            );
        }
        return $item_data;
    }

}
