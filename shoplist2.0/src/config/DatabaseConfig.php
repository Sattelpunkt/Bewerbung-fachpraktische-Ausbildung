<?php

namespace Config;

class DatabaseConfig
{
    private static array $config = [
        'Host' => 'db',
        'User' => 'root',
        'Password' => 'root',
        'Name' => 'shoplist2'
    ];

    public static function get($name): string|int
    {
        return array_key_exists($name, static::$config) ? static::$config[$name] : "";
    }

}