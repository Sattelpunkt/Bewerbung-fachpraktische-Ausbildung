<?php

namespace Foundation\Utils;

class D
{

    public static function dnd(string|array $data): void
    {
        echo "<pre>";
        print_r($data);
        echo "</pre><br />";
        echo "Programm has stopped";
        die();
    }

}