<?php
/**
 * @package ExamplePlugin
 */

 namespace Inc\frontend;

 class ProcessFees {
    public static function register() {
        add_action( 'woocommerce_cart_calculate_fees', [self::class, 'add_custom_checkbox_fee'] );
    }
    public static function add_custom_checkbox_fee( $cart ) {
        if ( is_admin() && !defined( 'DOING_AJAX' ) ) return;

    $fallback_fee = 5.00;

    foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
        if ( isset( $cart_item['custom_checkbox_option'] ) && $cart_item['custom_checkbox_option'] === 'yes' ) {
            $product       = $cart_item['data'];
            $product_id    = $product->get_id();
            $product_name  = $product->get_name();

            // Get fee from product setting or fallback
            $fee_per_unit = get_post_meta( $product_id, '_custom_number', true );
            if ( empty( $fee_per_unit ) || !is_numeric( $fee_per_unit ) ) {
                $fee_per_unit = $fallback_fee;
            }

            $fee_amount = floatval( $fee_per_unit ) * $cart_item['quantity'];

            // Make fee label unique per cart item
            $label = sprintf( __( '(%s - %s) Checkbox Fee', 'ExamplePlugin' ), $product_name, substr( $cart_item_key, 0, 6 ) );

            $cart->add_fee( $label, $fee_amount );
            }
        }
    }
    


 }