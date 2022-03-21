<?php

class DB {
// Varibles for define connection to pdo 
final public const SERVER = 'localhost';
final public const USERNAME = 'root';
final public const PASSWORD = '';
final public const DATABASE = 'crud';

//Varible to connection
public $conn;
//varible for  table name that will using in query

public $result;

public function __construct()
{
    
    try
    {
        $this->conn = new PDO("mysql:host=".self::SERVER.";dbname=".self::DATABASE."", self::USERNAME, self::PASSWORD);
    }
    // This code will appare error massage if dissconnect to database
    catch(PDOException $e) {
        echo "ERROR: " . $e->getMessage();
    }
}

public function table(string $table_name):DB
{
    $this->table_name = $table_name;
    return $this;
}
}