<?php
class Deal {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Get all deals to show on the website
    public function getAllDeals() {
        $query = "SELECT * FROM deals ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>