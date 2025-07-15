<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once '../config/utils/database.php';
require_once '../app/Models/Phrase.php';

// Solo permitir acceso a administradores
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    die("Acceso denegado.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_phrase'])) {
    $database = new Database();
    $db = $database->getConnection();
    $phrase = new Phrase($db);
    $phrase->text = $_POST['text'];

    try {
        if ($phrase->add()) {
            echo 'DEBUG: Frase agregada exitosamente<br>';
            header("Location: /admin.php?message=" . urlencode("Frase agregada exitosamente."));
            exit;
        }
    } catch (Exception $e) {
        echo 'DEBUG: Error al agregar frase: ' . $e->getMessage() . '<br>';
        header("Location: /admin.php?error=" . urlencode($e->getMessage()));
        exit;
    }
}
