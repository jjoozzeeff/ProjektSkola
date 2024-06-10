<?php
class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'obchod';
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            error_log("Database connection error: " . $this->conn->connect_error);
            die("There was an issue connecting to the database. Please try again later.");
        }
    }

    public function query($sql)
    {
        return $this->conn->query($sql);
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function close()
    {
        $this->conn->close();
    }
}
