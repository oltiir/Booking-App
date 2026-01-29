<?php
class Message {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function send($name, $email, $msg) {
        $sql = "INSERT INTO contact_messages (name, email, message) VALUES (:name, :email, :msg)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':msg', $msg);
        return $stmt->execute();
    }
}
?>