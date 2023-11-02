<?php

use Twig\Environment;

require_once 'bootstrap.php';
require_once 'migration.php';
require_once 'src/services/uploadFileService.php';
require_once 'src/repository/recipedsRepository.php';
require_once 'src/controllers/HomeController.php';
require_once 'src/controllers/PostController.php';

create_table_recipeds();

$container->set(Environment::class, $view);
$container->set(PDO::class, $db_connection);
// Services
$container->set(UploadFileService::class, new UploadFileService());
// Repositoryes
$container->set(RecipedsRepository::class, 
    \DI\create(RecipedsRepository::class)->constructor(
        $container->get(PDO::class)
    )
);
// View Controllers
$container->set(HomeController::class, 
    \DI\create(HomeController::class)->constructor(
        $container->get(Environment::class),
        $container->get(RecipedsRepository::class)
    )
);
// Query Controllers
$container->set(PostController::class, 
    \DI\create(PostController::class)->constructor(
        $container->get(PDO::class),
        $container->get(UploadFileService::class)
    )
);

$route->get('/', function () use($container)
{
    return $container->get(HomeController::class)->index();
});

// $route->get('/show/id', function () use($homeController, $view)
// {
//     return $homeController->show($view);
// });
$route->get('/create', function() use($container)
{
    return $container->get(HomeController::class)->create();
});

$route->with('/post', function () use($route, $container){
    $route->post('/create', function () use($container){
        $container->get(PostController::class)->create();
        // header('Location: http://localhost/');
    });
});

$route->dispatch();