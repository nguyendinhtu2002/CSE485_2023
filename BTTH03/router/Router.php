<?php
require_once './app/controllers/ArticleController.php';

// router/Router.php

class Router {
    protected $routes = [];

    public function get($url, $controllerAction) {
        $this->routes['GET'][$url] = $controllerAction;
    }

    public function post($url, $controllerAction) {
        $this->routes['POST'][$url] = $controllerAction;
    }

    public function handleRequest() {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        if (isset($this->routes[$method][$url])) {
            $controllerAction = $this->routes[$method][$url];
            $this->callControllerAction($controllerAction);
        } else {
            // Xử lý khi không tìm thấy tuyến đường
            echo "404 Not Found";
        }
   
    }

    protected function callControllerAction($controllerAction) {
        list($controller, $action) = explode('@', $controllerAction);

        // Tạo đối tượng Controller và gọi phương thức tương ứng
        $controllerObj = new $controller();
        $controllerObj->$action();
    }
}