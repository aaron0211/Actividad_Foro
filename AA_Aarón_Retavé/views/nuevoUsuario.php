<?php
require_once ("header.php");
?>
        <header>
            <h1>Registrar Usuario</h1>
        </header>
        <form action="" method="post">
            <div id="formulario">
                <form action="" method="post">
                    <p class="campo">Nombre de usuario: *</p>
                    <input type="text" name="nombre"/><br/>
                    <p class="campo">Contraseña: *</p>
                    <input type="password" name="pass"/><br/>
                    <p class="campo">Email: *</p>
                    <input type="email" name="email"/><br/>
                    <p>*Requerido</p>
                    <input type="submit" name="submit" value="Registrarse">

<?php
require_once('../controllers/Usuario.php');
if (isset($_POST['submit'])){
    $usuario = new Usuario($_POST['nombre'],$_POST['email']);
    $pw = $usuario->encriptar($_POST['pass']);
    if ($usuario->comprobaciones()!==false){
        $usuario->nuevo();
        header("Location:../index.php");
    }
}
?>
                </form>
                <p id="link"><a href="../index.php">Volver a la pantalla de inicio</a> </p>
            </div>
        </form>
    </div>
</body>
</html>