<?php
// router/routes.php
require_once 'Router.php';

$router = new Router();

// Gọi phương thức get của đối tượng $router
$router->get('/php/CSE485_2023/BTTH03/users', 'ArticleController@index');
$router->get('/users/create', 'ArticleController@create');
$router->post('/users/store', 'ArticleController@store');