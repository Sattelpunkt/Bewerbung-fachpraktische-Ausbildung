<?php

namespace Foundation\Middleware;

class CleanUserDataMiddleware
{
    private array $container = [];

    public function handle(): array
    {
        $this->container['post'] = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->container['get'] = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
        return $this->container;
    }
}