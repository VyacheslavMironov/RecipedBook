<?php

require_once 'bootstrap.php';

function create_table_recipeds()
{
    global $db_connection;
    try
    {
        return $db_connection->query('
            CREATE TABLE recipeds(
                id INT AUTO INCREMENT PRIMARY KEY,
                title VARCHAR NOT NULL UNIQUE, 
                description TEXT NOT NULL,
                image VARCHAR NOT NULL
            );
        ');
    }
    catch(PDOException $e)
    {
        
    }
}