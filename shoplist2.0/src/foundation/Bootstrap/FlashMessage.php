<?php

namespace Foundation\Bootstrap;

use Foundation\Request\Session;

class FlashMessage
{
    public static function add($type, $msg): void
    {
        print_r($_SESSION);
        if (isset($_SESSION['message'][$type])) {
            array_unshift($_SESSION['message'][$type], $msg);
        } else {
            $_SESSION['message'][$type][] = $msg;
        }
    }

    public static function get(): array
    {
        return $_SESSION['message'] ?? [];
    }

    public static function delete(): void
    {
        Session::delete('message');
    }
}