<?php

use Klein\Klein;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use DI\Container;

require_once 'vendor/autoload.php';

$route = new Klein();
$view = new Environment(new FilesystemLoader(['src/views']));
$container = new Container();