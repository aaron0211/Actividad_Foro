<?php
function listar(){
    require 'model/TemaModel.php';
    $temas = getTemas();

    include '../views/temas.php';
}

function ver(){
    if (!isset($_GET['id']))
        die("No has especificado un identificador de tema");
    $id = $_GET['id'];
    require 'model/TemaModel.php';

    $tema = getTema($id);
    if ($tema===null)
        die("Identificador de tema incorrecto");
    include ('views/temas.php');
}