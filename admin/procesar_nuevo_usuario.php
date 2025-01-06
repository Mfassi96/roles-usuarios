<?php
/*
Archivo donde se procesa el formulario de ingresar un nuevo usuario en la pagina de admin
*/
require '../conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_nuevo_usuario = trim($_POST["name_new_user"]);
    $password_nuevo_usuario = $_POST["pass_new_user"];
    $rol_id_nuevo_usuario = $_POST["rol_id"];

    // Validaciones (¡MUY IMPORTANTES!)
    if (empty($nombre_nuevo_usuario) || empty($password_nuevo_usuario) || empty($rol_id_nuevo_usuario)) {
        die("Todos los campos son obligatorios.");
    }

    // Verificar si el usuario ya existe (IMPORTANTE)
    $stmt_check = $conexion->prepare("SELECT COUNT(*) FROM usuarios WHERE usuario = ?");
    $stmt_check->execute([$nombre_nuevo_usuario]);
    $usuario_existe = $stmt_check->fetchColumn();

    if ($usuario_existe > 0) {
        die("El nombre de usuario ya existe.");
    }

    $password_hash = password_hash($password_nuevo_usuario, PASSWORD_DEFAULT); // Hashear la contraseña

    try {
        // Consulta corregida: se eliminó el marcador de posición y la columna email
        $consulta_ingresar = $conexion->prepare("INSERT INTO usuarios (usuario, password, rol_id) VALUES (?, ?, ?)");
        $consulta_ingresar->execute([$nombre_nuevo_usuario, $password_hash, $rol_id_nuevo_usuario]);

        echo "Usuario creado correctamente.";
        header("Location: index.php"); // Redirigir al panel de admin
        exit();

    } catch (PDOException $x) {
        // Manejo de errores más específico (para desarrollo)
        echo "Error al insertar el usuario: " . $x->getMessage();
    }
}
?>