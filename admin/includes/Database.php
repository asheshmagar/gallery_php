<?php
require_once "config.php";

class Database
{
    public $connection;

    function __construct()
    {
        $this->openDatabaseConnection();
    }

    public function openDatabaseConnection()
    {
//        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->connection->connect_errno) {
            die("Database connection failed " . $this->connection->connect_error);
        }
    }

    public function query($sql)
    {
        $result = $this->connection->query($sql);
        $this->confirmQuery($result);
        return $result;


    }

    private function confirmQuery($result)
    {

        if (!$result) {
            die("Query Failed" . $this->connection->error);
        }
    }

    public function escapeString($string)
    {
        $escapedString = $this->connection->real_escape_string($string);
        return $escapedString;
    }

    public function idInsert()
    {
        return mysqli_insert_id($this->connection);
    }

    public function insertID()
    {
        return $this->connection->insert_id;
    }

}

$database = new Database();
