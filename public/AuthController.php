<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once '../config/utils/database.php';
require_once '../app/Models/User.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'DEBUG: Entró al controlador. Acción: ' . (isset($_POST['action']) ? $_POST['action'] : 'NO ACTION') . '<br>';
    $action = $_POST['action'];

    if ($action === 'register') {
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];

        try {
            if ($user->emailExists()) {
                echo 'DEBUG: Email ya existe<br>';
                header("Location: /index.php?error=" . urlencode("Email is already registered."));
                exit;
            }
            if ($user->register()) {
                echo 'DEBUG: Registro exitoso<br>';
                header("Location: /index.php?message=" . urlencode("Registration successful. Please log in."));
                exit;
            } else {
                echo 'DEBUG: Error durante el registro<br>';
                header("Location: /index.php?error=" . urlencode("Error during registration."));
                exit;
            }
        } catch (Exception $e) {
            echo 'DEBUG: Excepción capturada<br>';
            header("Location: /index.php?error=" . urlencode($e->getMessage()));
            exit;
        }

    } elseif ($action === 'login') {
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];

        if ($user->login()) {
            echo 'DEBUG: Login exitoso<br>';
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_role'] = $user->role;
            header("Location: /game.php");
            exit;
        } else {
            echo 'DEBUG: Login fallido<br>';
            header("Location: /index.php?error=" . urlencode("Incorrect email or password."));
            exit;
        }
    } else {
        echo 'DEBUG: Acción desconocida<br>';
        exit;
    }
}

// Handle logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_start();
    session_unset();
    session_destroy();
    header("Location: /index.php");
    exit;
}
?>
