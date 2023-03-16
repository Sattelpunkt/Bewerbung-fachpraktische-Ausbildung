<?php

namespace Foundation\Bootstrap;

class Log
{
    public static function m(string $typ, string $message): void
    {
        $logFile = PROOT. DS . 'log' . DS . date("Y-m-d"). '.log';
        $time = date("H:i:s");
        $logMessage = "[$time] [$typ] - $message" . PHP_EOL;
        file_put_contents($logFile, $logMessage, FILE_APPEND);
    }
}