<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="procesar_login.php" method="post">
        Usuario: <input type="text" name="usuario" required><br>
        Contraseña: <input type="password" name="password" required><br>
        <input type="submit" value="Entrar">
        <?php if (isset($_GET['error'])) { echo "<p style='color:red;'>Credenciales incorrectas.</p>"; } ?>
    </form>
</body>
</html>