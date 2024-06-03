<?php
require '../vendor/autoload.php';
session_start();
require '../config/database.php';

use AhfIdlibOffice\BasharHabsh\Controllers\FormHandler;
use AhfIdlibOffice\BasharHabsh\Controllers\DashboardController;

// Initialize Database Connection
$db = (new Database())->getConnection();


$formHandler = new FormHandler($db);


$dashboardController = new DashboardController($db);

$action = $_GET['action'] ?? 'register';

switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $formHandler->handleRequest('login', $_POST);
            if ($user) {
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header("Location: index.php?action=dashboard");
                exit();
            } else {
                echo "Invalid login credentials";
            }
        } else {
            include '../src/Views/auth/login.php';
        }
        break;
    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($formHandler->handleRequest('register', $_POST)) {
                header("Location: index.php?action=login");
                exit();
            } else {
                echo "Registration failed";
            }
        } else {
            include '../src/Views/auth/register.php';
        }
        break;
    case 'dashboard':
        $users = $dashboardController->index();
        include '../src/Views/dashboard/index.php';
        break;
    default:
        include '../src/Views/auth/register.php';
        break;
}
