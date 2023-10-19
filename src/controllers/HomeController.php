<?php

use Twig\Environment;

require_once 'vendor/autoload.php';

class HomeController
{
    public function index(Environment $view)
    {
        return $view->render('index.twig.html', []);
    }

    public function show(Environment $view)
    {
        return $view->render('show.twig.html', []);
    }
}