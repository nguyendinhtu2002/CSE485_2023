<?php
// router/routes.php
use app\router\Router;

require_once 'Router.php';

$router = new Router();
$rootApp = $_SERVER['SCRIPT_NAME'];
$basePath = '/' . trim(str_replace('\\', '/', dirname($rootApp)), '/');

// Gọi phương thức get của đối tượng $router
$router->get( $basePath.'/users', 'ArticleController@index');
$router->get($basePath.'/create', 'ArticleController@getViewCreate');
$router->post($basePath.'/create', 'ArticleController@createArticle');
$router->delete($basePath.'/delete/{id}', 'ArticleController@deleteArticle');
$router->get($basePath.'/edit/{id}', 'ArticleController@getDetails');
$router->post($basePath.'/edit/{id}', 'ArticleController@Update');
