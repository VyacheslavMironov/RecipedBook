<?php

use Klein\Klein;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use DI\ContainerBuilder;
use PDO;

require_once 'vendor/autoload.php';

$route = new Klein();
$view = new Environment(new FilesystemLoader(['src/views']));
$containerBuilder = new ContainerBuilder();
$container = $containerBuilder->build();
$db_connection = new PDO('sqlite:C:\Users\prepod-001\Desktop\RecipedBook\reciped_book.sqlite');