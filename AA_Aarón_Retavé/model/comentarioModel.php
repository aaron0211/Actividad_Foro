<?php
require_once("DB_Connection.php");
require_once ("../sesion.php");
require_once ("TemaModel.php");

class comentarioModel{
    public $com_id;
    public $usuario_id;
    public $tema_id;
    public $comentario;
    public $fecha;
    public $conexion;
    public $sesion;

    /**
     * TemaModel constructor.
     */
    public function __construct(){
        $this->conexion=new DB_Connection('mysql:host=localhost;dbname=foro','root','');
        //$this->sesion = new Sesion();
    }

    public function nuevoComentario($comentario,$tema){
        if (isset($_SESSION['nombre'])){
//            $this->usuario_id = $this->sesion->get('usuario_id');
            $this->usuario_id = $_SESSION['usuario_id'];
        }
        $this->tema = new TemaModel();
        $resultado = $this->tema->getTema($tema);
        foreach ($resultado as $tema){
            $this->tema_id = $tema['tema_id'];
        }
        $this->fecha = date("D M j G:i:s T Y");
        //$this->fecha = '2020-12-02';
        try {
            $this->conexion->conectar();
            $this->conexion->ejecutar("insert into comentarios (comentario,tema_id,usuario_id,fecha) values ('$comentario','$this->tema_id','$this->usuario_id','$this->fecha'");
//            $this->conexion->ejecutar("insert comentarios set comentario='$comentario',tema_id='$this->tema_id',usuario_id='$this->usuario_id',fecha='$this->fecha");
            $this->conexion->desconectar();
        }catch (PDOException $exception){
            throw $exception;
        }
    }

    public function borrarComentario($id){
        $this->com_id = $id;
        try {
            $this->conexion->conectar();
            $this->conexion->ejecutar("delete from comentarios where com_id=$this->com_id");
            $this->conexion->desconectar();
        } catch (PDOException $exception) {
            throw $exception;
        }
    }
}