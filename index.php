<?php
require_once 'bootstrap.php';
require_once 'src/controllers/HomeController.php';

$homeController = new HomeController();

$route->get('/', function () use($homeController, $view)
{
    return $homeController->index($view);
});

$route->dispatch();