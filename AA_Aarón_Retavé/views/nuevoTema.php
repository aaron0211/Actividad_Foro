<?php
require_once ("header.php");
require_once('../model/TemaModel.php');
?>
<header>
    <h1>Nuevo Tema</h1>
</header>
<form action="" method="post">
    <div id="formulario">
        <form action="" method="post">
            <p class="campo">Tema:</p>
            <input type="text" name="tema"/><br/>
            <p class="campo">Descripción:</p>
            <textarea name="descripcion" id="descripcion"></textarea><br/>
            <input type="submit" name="submit" value="Añadir">

            <?php
            if (isset($_POST['submit'])){
                $tema = new TemaModel();
                if ($tema->comprobarTema()!==false){
                    $tema->nuevoTema($_POST['tema'],$_POST['descripcion']);
                    header("Location:temas.php");
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