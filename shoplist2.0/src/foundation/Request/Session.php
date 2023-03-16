<?php

namespace Foundation\Request;

class Session
{
    public static function start(): void
    {
        session_start();
    }

    public static function stop(): void
    {
        session_destroy();
    }

    public static function exists(string $name): bool
    {
        return isset($_SESSION[$name]);
    }

    public static function set(string $name, string|int $value): bool
    {
        return $_SESSION = $value;
    }

    public static function get(string $name): string|int
    {
        return self::exists($name) && !empty($_SESSION[$name]) ? $_SESSION[$name] : "";
    }

    public static function delete(string $name): void
    {
       unset($_SESSION[$name]);
    }

}