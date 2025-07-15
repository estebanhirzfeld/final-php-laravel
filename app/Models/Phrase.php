<?php
class Phrase {
    private $conn;
    private $table_name = "phrases";

    public $id;
    public $text;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Get a random phrase
    public function getRandom() {
        $query = "SELECT text FROM " . $this->table_name . " ORDER BY RAND() LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->text = $row['text'];
        return $this->text;
    }

    // Add a new phrase
    public function add() {
        if ($this->phraseExists()) {
            throw new Exception("The phrase already exists in the database.");
        }

        $query = "INSERT INTO " . $this->table_name . " SET text = :text";
        $stmt = $this->conn->prepare($query);

        $this->text = htmlspecialchars(strip_tags($this->text));
        $stmt->bindParam(":text", $this->text);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Check if a phrase already exists
    private function phraseExists() {
        $query = "SELECT id FROM " . $this->table_name . " WHERE text = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->text);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}
