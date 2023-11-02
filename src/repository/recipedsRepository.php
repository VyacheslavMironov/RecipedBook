<?php

require_once 'bootstrap.php';


class RecipedsRepository
{
    private PDO $_db_connection;

    public function __construct(PDO $db_connection)
    {
        $this->_db_connection = $db_connection;
    }

    public function create(array $request, array $attachments) : bool
    {
        $query = $this->_db_connection->prepare('
            INSERT INTO recipeds(title, description, image)
            VALUES(:title, :description, :image);
        ');
        return $query->execute([
            'title' => $request['title'],
            'description' => $request['description'],
            'image' => $attachments["image"]
        ]);
    }

    public function all() : mixed
    {
        return $this->_db_connection->query('SELECT * FROM recipeds;');
    }
}