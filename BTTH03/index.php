<?php
require_once 'router/Router.php';

$router = new Router();

require_once 'router/routers.php';

$router->handleRequest();