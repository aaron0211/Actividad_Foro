    <?php
    require_once ("header.php");
    require_once("../sesion.php");
    //$sesion = new Sesion();
    if (isset($_SESSION['nombre'])) {
        echo "<h2 id='bienvenida'>Bienvenid@ \n";
        echo "<i>".$sesion->get('nombre')."</i>";
        echo ", si estás viendo esto has iniciado sesión correctamente</h2><br/>";
        echo "(El identificador de la session es: " .session_id().")<br/>";
        if (isset($_POST['cerrar'])) {
            $sesion->borrarSesion();
        }
        ?>

        <br/>
        <form method="post">
            <input type="submit" value="Cerrar sesión" name="cerrar">
        </form>

        <?php
    }
    else {
        echo "Debes iniciar sesión para poder continuar<br/>";
        echo "<p id='link'><a href='../index.php'>Volver a pantalla de inicio de sesión</a></p>";
    }
    require_once ("footer.php");
    ?>