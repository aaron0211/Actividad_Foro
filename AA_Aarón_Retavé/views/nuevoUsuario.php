<?php
ob_start();
require_once ("header.php");
?>
        <header>
            <h2>Registrar Usuario</h2>
        </header>
        <form action="" method="post">
            <div id="formUsuario">
                    <p class="campo">Nombre de usuario: *</p>
                    <input type="text" name="nombre"/><br/>
                    <p class="campo">Contraseña: *</p>
                    <input type="password" name="pass"/><br/>
                    <p class="campo">Email: *</p>
                    <input type="email" name="email"/><br/>
                    <p>*Requerido</p>
                    <input id="submit" type="submit" name="submit" value="Registrarse"/><?php
                    require_once('../controllers/Usuario.php');
                    if (isset($_POST['submit'])){
                        $usuario = new Usuario($_POST['nombre'],$_POST['email']);
                        $pw = $usuario->encriptar($_POST['pass']);
                        if ($usuario->comprobaciones()!==false){
                            $usuario->nuevo();
                            header("Location:../index.php");
                        }
                    }?><p><a id="link" href="../index.php">Volver a la pantalla de inicio</a> </p>
            </div>
        </form>
    </div>
</body>
</html>
<?php
ob_end_flush();
?>