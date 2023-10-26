<?php

require_once 'vendor/autoload.php';

class PostController
{
    private PDO $_db_connection;

    public function __construct(PDO $db_connection)
    {

        $this->_db_connection = $db_connection;
    }

    private function set_file(mixed $file)
    {
        $file_path = 'media/' . $file['name'];
        move_uploaded_file($file['tmp_name'], $file_path);
        return $file_path;
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
            'image' => $this->set_file($_FILES['image'])
        ]);
    }
}