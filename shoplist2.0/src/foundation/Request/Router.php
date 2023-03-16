<?php

namespace Foundation\Request;

use Config\ModulConfig;
use Config\AppConfig;

class Router
{
    private array $routes = [];

    public function __construct()
    {
        foreach (ModulConfig::getModule() as $modul) {
            require_once SRC . DS . 'app' . DS . $modul . DS . 'routes.php';
        }
    }

    private function add(string $pattern, string $handler, string $method, array $middleware = []): void
    {
        $pattern = preg_replace('/:([\w-]+)/', '(?<$1>[\w-]+)', $pattern);
        $this->routes[] = [
            'pattern' => "#^$pattern$#",
            'handler' => $handler,
            'method' => $method,
            'middleware' => $middleware
        ];
    }

    public function route(): void
    {
        foreach ($this->routes as $route) {
            if (preg_match($route['pattern'], $_SERVER['REQUEST_URI'], $matches) && $route['method'] == $_SERVER['REQUEST_METHOD']) {
                $params = [];
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $params[$key] = $value;

                    }
                }
                $this->callHandler($route['handler'], $params, $route['middleware']);
                return;
            }
        }
        #ToDo Weiterleitung auf Error-> Keine Route gefunden
        echo "Route nicht gefunden";
    }

    private function callHandler(string $handler, array $params = [], array $middleware = []): void
    {
        if (preg_match('/@/i', $handler)) {
            list($controller, $action) = explode('@', $handler);
        } else {
            $controller = $handler;
            $action = AppConfig::get('default_action');
        }
        $controller = "App\\" . $controller . "Controller";
        $action .= "Action";
        $cleanUserData = $this->callMiddleware($middleware);
        $app = new $controller();
        $app->$action($params, $cleanUserData);
    }

    private function callMiddleware(array $middleware): array
    {
        $mw = 'Foundation\Middleware\CleanUserDataMiddleware';
        $mwInstance = new $mw();
        $cleanUserData = $mwInstance->handle();
        if (!empty($middleware)) {
            foreach ($middleware as $mw) {
                $mw = 'App\\'. $mw . 'Middleware';
                $mwInstance = new $mw();
                $mwInstance->handle();
            }
        }
        return $cleanUserData;
    }

    public static function go($location): void
    {
        header('Location: https://' . URL . $location);
        exit();
    }


}