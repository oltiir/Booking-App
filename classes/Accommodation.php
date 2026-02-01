<?php

class Accommodation {
    private $conn;
    private $table = "accommodations";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllActive() {
        $query = "SELECT id, name, location, price, image 
                  FROM {$this->table} 
                  ORDER BY price ASC 
                  LIMIT 12";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}