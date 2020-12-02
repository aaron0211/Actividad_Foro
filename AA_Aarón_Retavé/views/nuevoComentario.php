<?php
require_once ("header.php");
require_once('../model/comentarioModel.php');
?>
<header>
    <h1><?php$_GET['tema']?></h1>
</header>
<form action="" method="post">
    <div id="formulario">
        <form action="" method="post">
            <p class="campo">Comentario:</p>
            <textarea name="comentario" id="comentario"></textarea><br/>
            <input type="submit" name="submit" value="Añadir">

            <?php
            if (isset($_POST['submit'])){
                $comentario = new comentarioModel();
                $comentario->nuevoComentario($_POST['comentario'],$_GET['tema']);
                header("Location:comentarios.php");
            }
            ?>
        </form>
        <p id="link"><a href="../index.php">Volver a la pantalla de inicio</a> </p>
    </div>
</form>
</div>
</body>
</html>