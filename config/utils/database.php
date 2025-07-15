<?php

class Database
{
    private $host = "127.0.0.1"; // O localhost
    private $db_name = "fortune_cookie_db";
    private $username = "root"; // Tu usuario de MySQL
    private $password = "";     // Tu contraseña de MySQL
    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
