<?php
require_once ("../model/TemaModel.php");
require_once ("header.php");
$por_pagina = 4;
$pagina = 1;
$inicio = 0;
$model = new TemaModel();

if (isset($_GET["pagina"])){
    $pagina=$_GET["pagina"];
    $inicio=($pagina-1)*$por_pagina;
}

try {
    $total = $model->totalTemas();
}catch (PDOException $exception){
    echo "Error: ".$exception->getMessage();
}

$paginas = ceil($total[0][0]/$por_pagina);

try {
    $resultado = $model->getTemasPagina($inicio,$por_pagina);
}catch (PDOException $e){
    "Error: ".$e->getMessage();
}

try {
    echo "<h2>Estos son los temas de nuestro foro</h2>";

    echo "<table cellpadding='10'>";
    echo "<tr><th>Tema</th><th>Descripción</th><th>Autor</th>";

    foreach ($resultado as $tema){
        $id = $tema['tema_id'];
        echo "<tr>";
        echo "<td><a href='comentarios.php?tema=".$tema['tema']."'>".$tema['tema']."</a></td>";
        echo '<td>'.$tema['descripcion'].'</td>';
        echo '<td>'.$tema['nombre'].'</td>';
        if (isset($_SESSION['usuario_id'])) {
            if ($_SESSION['usuario_id'] == $tema['usuario_id'] || $_SESSION['tipo'] == 1) {
                echo '<td><a href="eliminaTema.php?id='.$id.'" onclick="return confirm();">Eliminar</a></td>';
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}catch (PDOException $exception){
    echo "ERROR: ".$exception->getMessage();
}
echo '<br>';

echo "<p><a href='temas.php'>Ver todas</a> | <b>Ver página:</b>";
if (round($paginas)>1){
    for ($i = 1;$i<=round($paginas);$i++){
        if ($pagina==$i){
            echo $pagina." ";
        }else{
            echo "<a href='temaspaginados.php?pagina=".$i."'>".$i."</a>";
        }
    }
}
echo "</p>";
echo '<br>';
if (isset($_SESSION['usuario_id'])) {
    echo '<a class="item" href="nuevoTema.php">Nuevo tema</a>';
}
require_once ("footer.php");
?>