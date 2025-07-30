<?php 
/**
 * @package ExamplePlugin
 */

namespace Inc;

final class Init {
    public static function get_services(){
        return [
            admin\ProductSettings::class,
            admin\SaveProductSettings::class,
            frontend\BeforeCartButton::class,
            frontend\ProcessCartButton::class,
            frontend\DisplayValuesInCart::class
        ];
    }

    public static function register_services(){
        foreach(self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    private static function instantiate($class){
        $service = new $class();
        return $service;
    }
}