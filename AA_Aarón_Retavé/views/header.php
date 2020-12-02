<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actividad de Aprendizaje</title>
</head>
<body>
<h1>FORODAM</h1>
    <div id="wrapper">
        <div id="menu">
            <a class="item" href="inicio.php">Inicio</a>
            <a class="item" href="temas.php">Temas</a>

            <div id="barra">
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
                $id = $sesion->get('usuario_id');
                echo "<div id='barra'>Hola $nombre$id. No eres tú? Cerrar sesión.</div>";
                ?>
        </div>
            <div id="contenedor">