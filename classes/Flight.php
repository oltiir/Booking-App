<?php

class Flight {
    private $conn;
    private $table = "flights";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllActive() {
        $query = "SELECT id, name, airline, image, ticket_type 
                  FROM {$this->table} 
                  ORDER BY created_at DESC 
                  LIMIT 12";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}