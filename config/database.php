<?php

class Database {
    // Vars
    private $dsn = null;
    private $user = null;
    private $password = null;

    public $conn;

    public function __construct() {
        $this->dsn = getenv('MYSQL_DSN');
        $this->user = getenv('MYSQL_USER');
        $this->password = getenv('MYSQL_PASS');
    }

    // Get DB conn
    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO($this->dsn, $this->user, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }


}
?>