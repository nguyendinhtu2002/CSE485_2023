<?php
// router/routes.php
require_once 'Router.php';

$router = new Router();

// Gọi phương thức get của đối tượng $router
$router->get('/php/CSE485_2023/BTTH03/users', 'ArticleController@index');
$router->get('/php/CSE485_2023/BTTH03/create', 'ArticleController@getViewCreate');
$router->post('/php/CSE485_2023/BTTH03/create', 'ArticleController@createArticle');
$router->delete('/php/CSE485_2023/BTTH03/delete/{id}', 'ArticleController@deleteArticle');
$router->get('/php/CSE485_2023/BTTH03/edit/{id}', 'ArticleController@getDetails');
$router->post('/php/CSE485_2023/BTTH03/edit/{id}', 'ArticleController@Update');
