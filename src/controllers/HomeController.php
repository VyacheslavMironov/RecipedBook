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
    public function index()
    {
        return $this->_view->render('index.twig.html', []);
    }

    public function show()
    {
        return $this->_view->render('show.twig.html', []);
    }
}