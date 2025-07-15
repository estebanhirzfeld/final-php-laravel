<?php
session_start();
header('Content-Type: application/json');
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['phrase' => 'Debes iniciar sesión.']);
    exit();
}
require_once __DIR__ . '/../app/Models/Phrase.php';
require_once __DIR__ . '/../config/utils/database.php';
$database = new Database();
$db = $database->getConnection();
$phrase = new Phrase($db);
try {
    $randomPhrase = $phrase->getRandom();
    echo json_encode(['phrase' => $randomPhrase]);
} catch (Exception $e) {
    echo json_encode(['phrase' => 'Error al obtener la frase.']);
} 