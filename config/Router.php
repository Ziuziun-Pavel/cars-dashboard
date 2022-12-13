<?php

namespace config;
use app\core\View;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function __construct()
    {
        $arr = require 'routes.php';
        $this->view = new View();
        foreach ($arr as $key => $value) {
            $this->add($key, $value);
        }
    }

    public function add($route, $params)
    {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $routes = explode("/", $_SERVER['REQUEST_URI']);
        unset($routes[5]);
        $url = trim(implode("/", $routes), '/');

        foreach ($this->routes as $route => $params ) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $path = 'app\controllers\\'.ucfirst($this->params['controller']).'Controller';

            if (class_exists($path)) {
                $action = $this->params['action'];
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    $this->view->errorCode(404);
                }
            } else {
                $this->view->errorCode(404);
            }
        } else {
            $this->view->errorCode(404);
        }
    }
}
