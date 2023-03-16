<?php

namespace Config;



class AppConfig
{
    private static array $config = [
        'version' => '0.0.1',
        'name' => 'Shoplist 2.0',
        'autor' => 'Keven Clausen',
        'year' => '2023',
        'root_dir' => '/',
        'default_action' => 'index',
        'default_site_title' => 'Qapla',
        'default_site_header' => 'header',
        'default_site_navigation' => 'navigation',
        'default_site_message' => 'message',
    ];

    public static function get($name): string|int
    {
        return array_key_exists($name, self::$config) ? self::$config[$name] : "";
    }

}