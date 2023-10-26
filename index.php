<?php

use Twig\Environment;

require_once 'bootstrap.php';
require_once 'migration.php';
require_once 'src/controllers/HomeController.php';
require_once 'src/controllers/PostController.php';

create_table_recipeds();

$container->set(Environment::class, $view);
$container->set(PDO::class, $db_connection);
$container->set(HomeController::class, 
    \DI\create(HomeController::class)->constructor(
        $container->get(Environment::class),
        $container->get(PDO::class)
    )
);
$container->set(PostController::class, 
    \DI\create(PostController::class)->constructor(
        $container->get(PDO::class)
    )
);

$route->get('/', function () use($container)
{
    return $container->get(HomeController::class)->index();
});

// $route->get('/show', function () use($homeController, $view)
// {
//     return $homeController->show($view);
// });
$route->get('/create', function() use($container)
{
    return $container->get(HomeController::class)->create();
});

$route->with('/post', function () use($route, $container){
    $route->post('/create', function () use($container){
        return $container->get(PostController::class)->create();
    });
});

$route->dispatch();