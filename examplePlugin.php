<?php
/**
 * @package ExamplePlugin
 */
/* 
Plugin Name: Example Plugin
Description: This is an example plugin that contains many of the basic features I need
Version: 1.0.0
Author: Oliver "Oliver1269" Larsen
Author URI: https://github.com/Oliver1269ii
License: GPL-3.0-or-later
Text Domain: examplePlugin
*/

defined( 'ABSPATH' ) or die();

// Require Composer's autoloader
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

use Inc\base\Activate;
use Inc\base\Deactivate;



function Activate() {
    Activate::activate();
}

function Deactivate() {
    Deactivate::deactivate();
}
register_activation_hook( __FILE__, 'Activate');
register_deactivation_hook( __FILE__, 'Deactivate');

if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}