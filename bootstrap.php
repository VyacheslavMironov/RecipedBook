<?php

use Klein\Klein;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

require_once 'vendor/autoload.php';

$route = new Klein();
$view = new Environment(new FilesystemLoader(['src/views']));