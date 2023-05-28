<?php
require_once 'app/controllers/ArticleController.php';

// router/Router.php

class Router {
    protected $routes = [];

    public function get($url, $controllerAction) {
        $this->routes['GET'][$url] = $controllerAction;
    }

    public function post($url, $controllerAction) {
        $this->routes['POST'][$url] = $controllerAction;
    }
    public function delete($url, $controllerAction) {
        $this->routes['DELETE'][$url] = $controllerAction;
    }
    public function handleRequest() {
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $route => $controllerAction) {
                if ($this->isUrlMatch($url, $route)) {
                    $this->callControllerAction($controllerAction);
                    return;
                }
            }
        }
        echo "404 Not Found";
    }

    protected function isUrlMatch($url, $route) {
        $pattern = preg_replace('/\/{(\w+)}/', '/([^\/]+)', $route);
        return preg_match("#^$pattern$#", $url);
    }

    protected function callControllerAction($controllerAction) {
        list($controller, $action) = explode('@', $controllerAction);

        $controllerObj = new $controller();

        $id = $this->extractIdFromUrl($_SERVER['REQUEST_URI']);

        $controllerObj->$action($id);
    }

    public function extractIdFromUrl($url)
    {
        $matches = [];
        preg_match('/\/(edit|delete)\/(\d+)/', $url, $matches);
        return isset($matches[2]) ? $matches[2] : null;
    }
}