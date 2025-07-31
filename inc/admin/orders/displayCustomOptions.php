<?php
/**
 * @package ExamplePlugin
 */

namespace Inc\admin\orders;

class displayCustomOptions {
    public static function register() {
        add_action( 'woocommerce_checkout_create_order_line_item', [self::class, 'add_custom_fields_to_order_items'], 10, 4 );
    }

    public static function add_custom_fields_to_order_items( $item, $cart_item_key, $values, $order ) {
        if ( isset( $values['custom_checkbox_option'] ) ) {
            $item->add_meta_data( __( 'Custom Option', 'your-textdomain' ), 'Enabled', true );
        }
    
        if ( isset( $values['custom_select_option'] ) ) {
            $item->add_meta_data( __( 'Custom Select', 'your-textdomain' ), esc_html( $values['custom_select_option'] ), true );
        }
    
        if ( isset( $values['custom_number_input'] ) ) {
            $item->add_meta_data( __( 'Custom Quantity', 'your-textdomain' ), intval( $values['custom_number_input'] ), true );
        }
    }
}




