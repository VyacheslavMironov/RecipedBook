<?php

use Twig\Environment;

require_once 'bootstrap.php';
require_once 'migration.php';
require_once 'src/controllers/HomeController.php';

create_table_recipeds();

$container->set(Environment::class, $view);
$container->set(PDO::class, $db_connection);
$container->set(HomeController::class, 
    \DI\create(HomeController::class)->constructor($container->get(Environment::class)
));

$route->get('/', function () use($container)
{
    return $container->get(HomeController::class)->index();
});

// $route->get('/show', function () use($homeController, $view)
// {
//     return $homeController->show($view);
// });

$route->dispatch();