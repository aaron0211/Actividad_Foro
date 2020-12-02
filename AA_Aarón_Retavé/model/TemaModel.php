<?php
require_once("DB_Connection.php");
require_once ("../sesion.php");
class TemaModel{
    public $tema;
    public $descripcion;
    public $usuario_id;
    public $tema_id;
    public $tipo;
    public $conexion;

    /**
     * TemaModel constructor.
     */
    public function __construct(){
        $this->conexion=new DB_Connection('mysql:host=localhost;dbname=foro','root','');
    }

    public function getTemas(){
        $this->conexion->conectar();
        $resultado = $this->conexion->consultar('select t.tema, t.descripcion, u.nombre, t.tema_id, u.usuario_id from temas t, usuarios u where t.usuario_id=u.usuario_id');
        $this->conexion->desconectar();
        return $resultado;
    }

    public function getTema($tema){
        $this->conexion->conectar();
        $resultado = $this->conexion->consultar('select tema_id from temas where tema="'.$tema.'"');
        $this->conexion->desconectar();
        return $resultado;
    }

    public function nuevoTema($tema,$descripcion){
        $this->tema=$tema;
        $this->descripcion=$descripcion;
        if (isset($_SESSION['nombre'])) {
            $this->usuario_id = $_SESSION['usuario_id'];
            try {
                $this->conexion->conectar();
                $this->conexion->ejecutar("insert into temas (tema,descripcion,usuario_id) values ('$this->tema','$this->descripcion','$this->usuario_id')");
                $this->conexion->desconectar();
            } catch (PDOException $exception) {
                throw $exception;
            }
        }
    }

    public function borrarTema($id){
        $this->tema_id = $id;
        try {
            $this->conexion->conectar();
            $this->conexion->ejecutar("delete from tema where tema_id='$this->tema_id'");
            $this->conexion->desconectar();
        } catch (PDOException $exception) {
            throw $exception;
        }

    }

    public function comprobarTema(){
        $this->conexion->conectar();
        $rw = $this->conexion->consultar("SELECT * FROM temas");
        if (count($rw)){
            for ($i=0;$i<count($rw);$i++){
                if ($rw[$i]['tema'] == $this->tema){
                    echo "<div id='msg'>Tema ya existente. Elija otro.</div>";
                    return false;
                }
            }
        }
    }
}