<?php
require_once ("../sesion.php");
require_once ("../model/usuarioModel.php");

$sesion = new Sesion();
$nombre = $sesion->get('nombre');
$usuario = new usuarioModel();
$resultado = $usuario->getUsuario($nombre);
foreach ($resultado as $user){
    $sesion->set('usuario_id',$user['usuario_id']);
    $sesion->set('tipo',$user['tipo']);
}
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="StyleSheet" href="../css/style.css" type="text/css">
    <title>Actividad de Aprendizaje</title>
</head>
<body>
<h1>FORODAM</h1>
    <div id="barra">
        <a id="menu" href="inicio.php">Inicio</a>
        <a id="menu2" href="temas.php">Temas</a>
        <a id='nombre'>Hola <?php echo $nombre?>. No eres tú? Cierra sesión desde la página de <a id="enlace" href='inicio.php'> inicio.</a></a>
    </div>