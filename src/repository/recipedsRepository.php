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

    public function get(int $id)
    {
        return $this->_db_connection->query("SELECT * FROM recipeds WHERE id={$id};");
    }

    public function edit(array $request, array $attachments)
    {
        $SQL = "UPDATE recipeds SET ";
        $SQL .= "title=\"{$request['title']}\"";
        $SQL .= ", description=\"" . trim($request['description']) . "\"";
        if (strlen($attachments['image']) != 0)
        {
            $SQL .= ", image=\"{$attachments['image']}\" ";
        }
        $SQL .= " WHERE id={$request['id']};";
        return $this->_db_connection->exec($SQL);
    }

    public function delete(int $id)
    {
        return $this->_db_connection->exec("DELETE FROM recipeds WHERE id={$id}");
    }
}