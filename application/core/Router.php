<?php

namespace App\core;

class Router {

    protected $routes = [];
    protected $params = [];

    public function __construct() {
        $arr = require webroot.'/application/config/routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    public function add($route, $params) {
        $route = preg_replace('/{([a-z]+):([^\}]+)}/', '(?P<\1>\2)', $route);
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');

        foreach ($this->routes as $route => $params) {

            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    $params[$key] = $match;
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run(){
        if ($this->match()) {
            $controller = ucfirst($this->params['controller']).'Controller';
            $path = webroot.'/application/controllers/'.$controller.'.php';
            if (file_exists($path)) {
                $action = $this->params['action'].'Action';
                $controller = 'App\controllers\\'.$controller;
                if (method_exists($controller, $action)) {
                    $controller = new $controller($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }

}

