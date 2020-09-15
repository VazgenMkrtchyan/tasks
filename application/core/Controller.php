<?php

namespace App\core;



abstract class Controller {

    public $route;
    public $view;

    public function __construct($route) {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    public function loadModel($name) {
        $name = ucfirst($name);
        $path = webroot.'/application/models/'.$name.'.php';

        $model = 'App\models\\'.$name;

        if (file_exists($path)) {
            return new $model;
        }
    }

}