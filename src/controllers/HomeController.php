<?php

use Twig\Environment;

require_once 'vendor/autoload.php';

class HomeController
{
    public function index(Environment $view)
    {
        return $view->render('index.twig.html', []);
    }
}