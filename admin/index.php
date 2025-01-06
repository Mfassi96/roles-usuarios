<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../index.php");
    exit();
}

if (basename(__FILE__) == 'index.php' && $_SESSION['rol_id'] != 1) {
    die("Acceso denegado. No tienes permisos para acceder a esta página.");
}

require '../conexion.php';

try {
    $stmt = $conexion->query("SELECT id, nombre FROM roles");
    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener los roles: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Panel de Administrador</title>
</head>
<body>
    <nav class="nav justify-content-center">
        <a href="endsession.php" class="btn btn-danger">Cerrar sesión ❌</a>
    </nav>

    <h1 class="display-1">Bienvenido administrador</h1>
    <h2 class="display-2">Ingresar usuarios</h2>

    <form action="procesar_nuevo_usuario.php" method="post">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name_new_user" class="form-control" placeholder="Ingrese un nombre de usuario" required>
            <label class="form-label">Contraseña</label>
            <input type="password" name="pass_new_user" class="form-control" required>
            <label class="form-label">Seleccionar rol para el nuevo usuario</label>
            <select name="rol_id" class="form-control" required>
                <option value="">Seleccionar rol</option> <?php // Opción por defecto ?>
                <?php foreach ($roles as $rol): ?>
                    <option value="<?php echo $rol['id']; ?>">
                        <?php echo htmlspecialchars($rol['nombre']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Crear usuario" class="btn btn-success mt-3">
        </div>
    </form>
</body>
</html>