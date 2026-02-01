<?php
class User
{
    private $conn;
    private $table_name = 'user';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function register($name, $surname, $email, $password)
    {
        $role = 'user';
        $query = "INSERT INTO {$this->table_name} (name, surname, email, password, role) VALUES (:name, :surname, :email, :password, :role)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);

        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashed);

        $stmt->bindParam(':role', $role);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login($email, $password)
    {
        $query = "SELECT id, name, surname, email, password, role FROM {$this->table_name} WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role']    = $row['role'];
                return true;
            }
        }
        return false;
    }

    public function validate($name, $surname, $email, $password)
    {
        $errors = [];

        if (empty($name) || empty($surname) || empty($email) || empty($password)) {
            $errors[] = "Të gjitha fushat duhet të plotësohen.";
        }
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email formati nuk është i rregullt.";
        }
        if (!empty($password) && strlen($password) < 6) {
            $errors[] = "Fjalëkalimi duhet të jetë të paktën 6 karaktere.";
        }

        return $errors;
    }
}
