<?php

class Database
{
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $database = "apirest";
    public $conn;

    function __construct()
    {
        try {

            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {

            die($ex->getMessage());
        }
    }
}
