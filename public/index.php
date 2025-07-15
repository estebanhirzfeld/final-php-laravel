<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Galleta de la Fortuna - Inicio</title>
</head>
<body>
<h1>Bienvenido</h1>

<!-- Formulario de Registro -->
<h2>Registro</h2>
<form action="/AuthController.php" method="POST">
    <input type="hidden" name="action" value="register">
    <label for="name">Nombre:</label>
    <input type="text" name="name" required><br>
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" required><br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Registrarse</button>
</form>

<!-- Formulario de Login -->
<h2>Iniciar Sesión</h2>
<form action="/AuthController.php" method="POST">
    <input type="hidden" name="action" value="login">
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" required><br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Entrar</button>
</form>

<?php
// Mostrar mensajes de error o éxito
if (isset($_GET['error'])) echo "<p style='color:red;'>" . htmlspecialchars($_GET['error']) . "</p>";
if (isset($_GET['message'])) echo "<p style='color:green;'>" . htmlspecialchars($_GET['message']) . "</p>";
?>
</body>
</html>
