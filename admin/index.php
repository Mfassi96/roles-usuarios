<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}

// Control de acceso para la vista de administrador (admin/index.php)
if (basename(__FILE__) == 'index.php' && $_SESSION['rol_id'] != 1) { // 1 es el ID del rol "administrador"
    die("Acceso denegado. No tienes permisos para acceder a esta página.");
}

// No se necesita control de acceso explícito para la vista de usuario, 
// ya que cualquier usuario autenticado puede acceder a ella.
// Si necesitas un control más granular dentro de la vista de usuario, lo puedes agregar aquí.

// ... resto del contenido de la página ...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido administrador</h1>
</body>
</html>