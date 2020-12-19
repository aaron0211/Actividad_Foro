<?php
require_once ("../model/comentarioModel.php");
if (isset($_GET['id'])){
    $id = $_GET['id'];
    try {
        $model = new comentarioModel();
        $model->borrarComentario($id);
    }catch (PDOException $e){
        echo "ERROR: ".$e->getMessage();
    }
    header("Location: comentarios.php?tema=".$_GET['tema']);
}else{
    header("Location: comentarios.php?tema=".$_GET['tema']);
}
?>