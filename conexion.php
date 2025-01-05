<?php
$host = "localhost";
$db = "roles-usuarios"; // Nombre de tu base de datos
$user = "root"; // Tu usuario de MySQL
$pass = ""; // Tu contraseña de MySQL

try {
    $conexion = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>