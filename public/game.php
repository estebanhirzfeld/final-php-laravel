<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?error=Debes iniciar sesión.");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Galleta de la Fortuna - Juego</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
</head>
<body ng-app="fortuneApp" ng-controller="FortuneController">
<h1>¡Bienvenido, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
<nav>
    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
        <a href="admin.php">Panel de Administración</a> |
    <?php endif; ?>
    <a href="/AuthController.php?action=logout">Cerrar Sesión</a>
</nav>
<main>
    <h2>Tu frase de la fortuna:</h2>
    <blockquote style="font-size:1.2em;">{{ phrase }}</blockquote>
    <button ng-click="getPhrase()">Obtener otra frase</button>
</main>
<script>
angular.module('fortuneApp', [])
.controller('FortuneController', function($scope, $http) {
    $scope.phrase = '';
    $scope.getPhrase = function() {
        $http.get('get_phrase.php').then(function(response) {
            $scope.phrase = response.data.phrase;
        }, function() {
            $scope.phrase = 'Error al obtener la frase.';
        });
    };
    // Obtener una frase al cargar la página
    $scope.getPhrase();
});
</script>
</body>
</html>
