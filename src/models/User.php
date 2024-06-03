<?php
namespace AhfIdlibOffice\BasharHabsh\Models;

use PDO;

class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $email;
    public $dob;
    public $country;
    public $password;
    public $role;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register() {
        $query = "INSERT INTO " . $this->table_name . " (username, email, dob, country, password, role) VALUES (:username, :email, :dob, :country, :password, :role)";
        $stmt = $this->conn->prepare($query);
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->dob = htmlspecialchars(strip_tags($this->dob));
        $this->country = htmlspecialchars(strip_tags($this->country));
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":dob", $this->dob);
        $stmt->bindParam(":country", $this->country);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":role", $this->role);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($this->password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getAllUsers() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
