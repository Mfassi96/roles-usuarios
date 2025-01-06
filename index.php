<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="procesar_login.php" method="post">
        Usuario: <input type="text" name="usuario" required class="form-control"><br>
        Contraseña: <input type="password" name="password" required class="form-control"><br>
        <input type="submit" value="Entrar" class="btn btn-success">
        <?php if (isset($_GET['error'])) {?>
             <script>
                Swal.fire({
  icon: "error",
  title: "Oops...",
  text: "El usuario o la contraseña son incorrectos",
  footer: '<a href="#">Why do I have this issue?</a>'
});
             </script>
            <?php  } ?>
    </form>
</body>
<script src="/node_modules/bootstrap/dist//js/bootstrap.min.js"></script>
</html>