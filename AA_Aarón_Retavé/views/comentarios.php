<?php
ob_start();
require_once ("../model/DB_Connection.php");
require_once ("header.php");
require_once ("../model/comentarioModel.php");
try {
    echo '<h2>'.$_GET['tema'].'</h2>';
    $conexion=new DB_Connection('mysql:host=localhost;dbname=foro','root','');
    $conexion->conectar();
    $resultado = $conexion->consultar('select t.tema, c.comentario, u.nombre, c.fecha, c.com_id, u.usuario_id from temas t, usuarios u, comentarios c where c.usuario_id=u.usuario_id and c.tema_id=t.tema_id and t.tema ="'.$_GET['tema'].'"');
    $conexion->desconectar();

    if ($resultado == null){
        echo "<h2>Este tema todavía no tiene ningún comentario, se tú el primero!</h2>";
        $tema = '';
    }else {
        echo "<table cellpadding='10'>";
        echo "<tr><th>Comentario</th><th>Autor</th><th>Fecha</th>";

        foreach ($resultado as $comentario) {
            $tema = $comentario['tema'];
            $id = $comentario['com_id'];
            echo "<tr>";
            echo '<td>' . $comentario['comentario'] . '</td>';
            echo '<td>' . $comentario['nombre'] . '</td>';
            echo '<td>' . $comentario['fecha'] . '</td>';
            if (isset($_SESSION['usuario_id'])) {
                if ($_SESSION['usuario_id'] == $comentario['usuario_id'] || $_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2) {
                    echo '<td><a href="eliminaComentario.php?id='.$id.'&tema='.$tema.'">Eliminar</a></td>';
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}catch (PDOException $exception){
    echo "ERROR: ".$exception->getMessage();
}
echo '<br>';
echo '<br>';
if (isset($_SESSION['usuario_id'])) {
    echo "<a class='item' href='nuevoComentario.php?tema=" . $_GET['tema'] . "'>Nuevo comentario</a>";
}
require_once ("footer.php");
ob_end_flush();
?>