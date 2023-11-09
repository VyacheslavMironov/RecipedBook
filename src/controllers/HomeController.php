<?php

use Twig\Environment;

require_once 'vendor/autoload.php';
require_once 'src/repository/recipedsRepository.php';

class HomeController
{
    private Environment $_view;
    private RecipedsRepository $_repository;

    public function __construct(Environment $view, RecipedsRepository $repository)
    {
        $this->_view = $view;
        $this->_repository = $repository;
    }
    public function index()
    {
        return $this->_view->render('index.twig.html', [
            "recipeds" => $this->_repository->all()
        ]);
    }

    public function show()
    {
        return $this->_view->render('show.twig.html', [
            'reciped' => $this->_repository->get($_GET['id'])
        ]);
    }

    public function create()
    {
        return $this->_view->render('create.twig.html', []);
    }
}