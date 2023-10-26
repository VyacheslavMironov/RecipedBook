<?php

use Twig\Environment;

require_once 'vendor/autoload.php';

class HomeController
{
    private Environment $_view;
    private PDO $_db_connection;

    public function __construct(Environment $view, PDO $db_connection)
    {
        $this->_view = $view;
        $this->_db_connection = $db_connection;
    }
    public function index()
    {
        $recipeds = $this->_db_connection->query('SELECT * FROM recipeds;');
        var_dump($recipeds);
        return $this->_view->render('index.twig.html', []);
    }

    public function show()
    {
        return $this->_view->render('show.twig.html', []);
    }

    public function create()
    {
        return $this->_view->render('create.twig.html', []);
    }
}