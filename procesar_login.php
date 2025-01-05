<?php
session_start();
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $stmt = $conexion->prepare("SELECT id, usuario, password, rol_id FROM usuarios WHERE usuario = ?");
    $stmt->execute([$usuario]);
    $usuario_db = $stmt->fetch();

    if ($usuario_db && password_verify($password, $usuario_db['password'])) {
        $_SESSION['usuario_id'] = $usuario_db['id'];
        $_SESSION['usuario'] = $usuario_db['usuario'];
        $_SESSION['rol_id'] = $usuario_db['rol_id'];

        // Redireccionar según el rol
        switch ($usuario_db['rol_id']) {
            case 1:
                header("Location: admin/index.php");
                break;
            default: 
                header("Location: usuario/index.php");
                break;
        }
        exit();
    } else {
        header("Location: index.php?error=1");
        exit();
    }
}
?>