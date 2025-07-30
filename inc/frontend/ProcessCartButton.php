<?php
/**
* @package ExamplePlugin
*/

namespace Inc\frontend;

class ProcessCartButton{
    public static function register(){
        add_filter( 'woocommerce_add_cart_item_data', [self::class, 'add_checkbox_to_cart'], 10, 2 );
    }
    public static function add_checkbox_to_cart( $cart_item_data, $product_id ) {
        if ( isset( $_POST['custom_checkbox_option'] ) && $_POST['custom_checkbox_option'] === 'yes' ) {
            $cart_item_data['custom_checkbox_option'] = 'yes';
            $cart_item_data['unique_key'] = md5( microtime() . rand() ); // Prevents merging identical items
        }
        return $cart_item_data;
        }
}