<?php
/**
 * @package ExamplePlugin
 */
namespace Inc\base;

class Enqueue{
    public static function register(){
        add_action('wp_enqueue_scripts', [self::class, 'custom_option_enqueue']);
    }

    public static function custom_option_enqueue(){
        if (is_product()){
            global $post;
            $enabled = get_post_meta($post->ID, '_custom_checkbox', true);
            if ($enabled === 'yes') {
                wp_enqueue_style(
                    'ExamplePluginStyle', // Referral name
                    plugin_dir_url( dirname( __FILE__, 2 ) ) . 'assets/css/optionstyles.css',
                    array(),
                    '1.0'
                );

                wp_enqueue_script(
                    'ExamplePluginScript',
                    plugin_dir_url( dirname( __FILE__, 2 ) ) . 'assets/js/optionscript.js',
                    array(),
                    '1.0',
                    true
                );
            }
        }
    }

}