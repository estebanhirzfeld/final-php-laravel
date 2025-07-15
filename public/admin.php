<?php
session_start();
// Solo permitir acceso a administradores
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: index.php?error=Acceso denegado.");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Galleta de la Fortuna - Administración</title>
</head>
<body>
<h1>Panel de Administración</h1>
<nav>
    <a href="game.php">Volver al Juego</a> |
    <a href="/AuthController.php?action=logout">Cerrar Sesión</a>
</nav>
<main>
    <h2>Agregar Nueva Frase de la Fortuna</h2>
    <form action="/PhraseController.php" method="POST">
        <textarea name="text" rows="4" cols="50" required placeholder="Escribe aquí una nueva frase..."></textarea><br>
        <button type="submit" name="add_phrase">Agregar Frase</button>
    </form>
    <?php
    if (isset($_GET['error'])) echo "<p style='color:red;'>" . htmlspecialchars($_GET['error']) . "</p>";
    if (isset($_GET['message'])) echo "<p style='color:green;'>" . htmlspecialchars($_GET['message']) . "</p>";
    ?>
</main>
</body>
</html>
