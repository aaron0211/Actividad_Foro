<?php
require_once ("DB_Connection.php");

class usuarioModel{
    public $usuario_id;
    public $nombre;
    public $pass;
    public $email;
    public $conexion;

    /**
     * usuarioModel constructor.
     */
    public function __construct(){
        $this->conexion=new DB_Connection('mysql:host=localhost;dbname=foro','root','');
    }

    public function getUsuario($nombre){
        $this->conexion->conectar();
        $resultado = $this->conexion->consultar('select * from usuarios where nombre="'.$nombre.'"');
        $this->conexion->desconectar();
        return $resultado;
    }
}