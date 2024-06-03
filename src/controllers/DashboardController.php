<?php
namespace AhfIdlibOffice\BasharHabsh\Controllers;

use AhfIdlibOffice\BasharHabsh\Models\User;

class DashboardController {
    private $db;
    private $user;

    public function __construct($db) {
        $this->db = $db;
        $this->user = new User($db);
    }

    public function index() {
        return $this->user->getAllUsers();
    }
}
