<?php

use Twig\Environment;

require_once 'vendor/autoload.php';

class HomeController
{
    public Environment $_view;

    public function __construct(Environment $view)
    {
        $this->_view = $view;
    }
    public function index(Environment $view)
    {
        return $view->render('index.twig.html', []);
    }

    public function show(Environment $view)
    {
        return $view->render('show.twig.html', []);
    }
}