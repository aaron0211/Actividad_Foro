<?php
ob_start();
require_once ("header.php");
require_once('../model/comentarioModel.php');
?>
<header>
    <h1><?php$_GET['tema']?></h1>
</header>
<form action="" method="post">
    <div id="formulario">
        <form id="formComentario" action="" method="post">
            <p class="campo">Comentario:</p>
            <textarea name="comentario" id="comentario"></textarea><br/>
            <input id="coment" type="submit" name="submit" value="Añadir">

            <?php
            if (isset($_POST['submit'])){
                $comentario = new comentarioModel();
                $comentario->nuevoComentario($_POST['comentario'],$_GET['tema']);
                header("Location:comentarios.php?tema=".$_GET['tema']);
            }
        echo "</form><br><br>";
        echo '<p><a id="link" href="comentarios.php?tema='.$_GET['tema'].'">Volver a comentarios</a> </p>';
            ?>
    </div>
</form>
</div>
</body>
</html>
<?php
require_once ("footer.php");
ob_end_flush();
?>