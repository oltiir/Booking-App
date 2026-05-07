<?php
class Flight {
    private $conn;
    private $table = "flights";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($name, $airline, $image, $ticket_type, $created_at) {
        $query = "INSERT INTO " . $this->table . " 
                  (name, airline, image, ticket_type, created_at) 
                  VALUES (:name, :airline, :image, :ticket_type, :created_at)";

        $stmt = $this->conn->prepare($query);

        $name = htmlspecialchars(strip_tags($name));
        $airline = htmlspecialchars(strip_tags($airline));

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":airline", $airline);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":ticket_type", $ticket_type);
        $stmt->bindParam(":created_at", $created_at);

        if($stmt->execute()) {
            return true;
        }
        return false;
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

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}