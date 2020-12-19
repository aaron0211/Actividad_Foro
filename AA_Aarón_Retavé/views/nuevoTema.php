<?php
ob_start();
require_once ("header.php");
require_once('../model/TemaModel.php');
?>
<header>
    <h2>Nuevo Tema</h2>
</header>
<form action="" method="post">
    <div id="formulario">
        <form id="formTema" action="" method="post">
            <p class="campo">Tema:</p>
            <input id="tema" type="text" name="tema"/><br/>
            <p class="campo">Descripción:</p>
            <textarea name="descripcion" id="descripcion"></textarea><br/>
            <input id="coment" type="submit" name="submit" value="Añadir">

            <?php
            if (isset($_POST['submit'])){
                $tema = new TemaModel();
                if ($tema->comprobarTema()!==false){
                    $tema->nuevoTema($_POST['tema'],$_POST['descripcion']);
                    header("Location:temas.php");
                }
            }
        echo "</form><br><br>";
        echo "<p><a id='link' href='temas.php'>Volver a temas</a> </p>";
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