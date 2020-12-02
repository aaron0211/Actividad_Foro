<?php
require_once ("../model/TemaModel.php");
require_once ("header.php");
try {
    $model = new TemaModel();
    $resultado = $model->getTemas();
    echo "<h2>Estos son los temas de nuestro foro</h2>";

    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Tema</th><th>Descripción</th><th>Autor</th>";

    foreach ($resultado as $tema){
        echo "<tr>";
        echo "<td><a href='comentarios.php?tema=".$tema['tema']."'>".$tema['tema']."</a></td>";
        echo '<td>'.$tema['descripcion'].'</td>';
        echo '<td>'.$tema['nombre'].'</td>';
        if ($_SESSION['usuario_id']==$tema['usuario_id'] || $_SESSION['tipo']==1) {
            echo '<td><a href="#" onclick="' . $model->borrarComentario($tema['com_id']) . '" >Eliminar</a></td>';
        }
        echo "</tr>";
    }
    echo "</table>";
}catch (PDOException $exception){
    echo "ERROR: ".$exception->getMessage();
}
echo '<br>';
echo '<br>';
echo '<a class="item" href="nuevoTema.php">Nuevo tema</a>';
require_once ("footer.php");
?>