<?php
require_once ("../model/TemaModel.php");
if (isset($_GET['id'])){
    $id = $_GET['id'];
    try {
        $model = new TemaModel();
        $model->borrarTema($id);
    }catch (PDOException $e){
        echo "ERROR: ".$e->getMessage();
    }
    header("Location: temas.php");
}else{
    header("Location: temas.php");
}
?>