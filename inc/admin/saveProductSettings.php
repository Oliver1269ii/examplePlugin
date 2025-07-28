<?php 
/**
 * @package ExamplePlugin
 */

namespace Inc\admin;

class SaveProductSettings {

    public static function register() {
        add_action( 'woocommerce_process_product_meta', [ self::class, 'save_custom_product_option_fields' ] );
    }

    public static function save_custom_product_option_fields( $post_id ) {
        // Checkbox
        $value = isset( $_POST['_custom_checkbox'] ) ? 'yes' : 'no';
        update_post_meta( $post_id, '_custom_checkbox', $value );

        // Number input
        if ( isset( $_POST['_custom_number'] ) ) {
            update_post_meta( $post_id, '_custom_number', floatval( $_POST['_custom_number'] ) );
        }

        // Dropdown (select)
        if ( isset( $_POST['_custom_select'] ) ) {
            update_post_meta( $post_id, '_custom_select', sanitize_key( $_POST['_custom_select'] ) );
        }
    }
}
