<?php
/**
 * @package ExamplePlugin
 */
namespace Inc\frontend;

class BeforeCartButton {
    public static function register(){
        add_action( 'woocommerce_before_add_to_cart_button', [self::class, 'display_options']);
    }

    public static function display_options() {
        global $product;
        $enabled = get_post_meta($product->get_id(), '_custom_checkbox', true);
        if ($enabled === 'yes') {
            ?>
            <div class='customOption'>
                <label for="custom_checkbox_option" class='custom_options'>
                <input type="checkbox" name="custom_checkbox_option" id="custom_checkbox_option" value="yes">
                <?php _e( 'Enable custom feature', 'ExamplePlugin' ); ?>
            </label>
            </div>
            <?php    
        }

    }
}

