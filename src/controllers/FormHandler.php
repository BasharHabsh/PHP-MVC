<?php
namespace AhfIdlibOffice\BasharHabsh\Controllers;

use AhfIdlibOffice\BasharHabsh\Models\User;

class FormHandler {
    private $db;
    private $user;

    public function __construct($db) {
        $this->db = $db;
        $this->user = new User($db);
    }

    public function handleRequest($action, $data) {
        switch ($action) {
            case 'login':
                return $this->login($data);
            case 'register':
                return $this->register($data);
            default:
                return false;
        }
    }

    private function login($data) {
        if (!empty($data['username']) && !empty($data['password'])) {
            $this->user->username = $data['username'];
            $this->user->password = $data['password'];
            $user = $this->user->login();
            if ($user) {
                return $user;
            } else {
                echo "Login failed: Invalid username or password.";
                return false;
            }
        } else {
            echo "Login failed: Username or password not set.";
            return false;
        }
    }

    private function register($data) {
        if (!empty($data['username']) && !empty($data['email']) && !empty($data['dob']) && !empty($data['country']) && !empty($data['password']) && !empty($data['role'])) {
            $this->user->username = $data['username'];
            $this->user->email = $data['email'];
            $this->user->dob = $data['dob'];
            $this->user->country = $data['country'];
            $this->user->password = $data['password'];
            $this->user->role = $data['role'];
            if ($this->user->register()) {
                return true;
            } else {
                echo "User registration failed.";
                return false;
            }
        } else {
            echo "Registration failed: All fields are required.";
            return false;
        }
    }
}
