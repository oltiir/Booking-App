<?php
class Deal {
    private $conn;
    private $table_name = "deals";

    public function __construct($db) {
        $this->conn = $db;
    }
    public function create($title, $description, $price, $image_url, $created_by) {
        $query = "INSERT INTO " . $this->table_name . " 
                  (title, description, price, image_url, created_by) 
                  VALUES (:title, :description, :price, :image_url, :created_by)";

        $stmt = $this->conn->prepare($query);

        $title = htmlspecialchars(strip_tags($title));
        $description = htmlspecialchars(strip_tags($description));

        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":image_url", $image_url);
        $stmt->bindParam(":created_by", $created_by); // This is the admin's ID

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readAll($sort = 'default') {
    $orderBy = "d.id DESC"; // Default: Newest first

    if ($sort == 'low') {
        $orderBy = "d.price ASC";
    } elseif ($sort == 'high') {
        $orderBy = "d.price DESC";
    }

    $query = "SELECT d.*, u.name as admin_name 
              FROM deals d 
              LEFT JOIN user u ON d.created_by = u.id 
              ORDER BY $orderBy";
              
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}

public function delete($id) {
    $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id);
    return $stmt->execute();
}
}
?>