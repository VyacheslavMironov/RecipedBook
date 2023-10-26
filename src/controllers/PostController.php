<?php

require_once 'vendor/autoload.php';

class PostController
{
    private PDO $_db_connection;

    public function __construct(PDO $db_connection)
    {

        $this->_db_connection = $db_connection;
    }
    
    public function create()
    {
        $query = $this->_db_connection->prepare('
            INSERT INTO recipeds(title, description, image)
            VALUES(:title, :description, :image);
        ');
        return $query->execute([
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'image' => ...
        ]);
    }
}