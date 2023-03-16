<?php

spl_autoload_register(function ($className) {
    $parts = explode('\\', $className);
    $class = end($parts);
    array_pop($parts);
    $path = strtolower(implode(DS, $parts));
    $path = SRC . DS . $path . DS . $class . '.php';
    if (file_exists($path)) {
        include($path);
    } else {
        # ToDo Weiterleitung auf /error mit Session MSG
        print('<br />Class not Found ');
        print($className);
    }

});