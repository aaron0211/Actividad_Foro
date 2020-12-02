<?php
class DB_Connection{
    private $servidor;
    private $user;
    private $pass;
    private $conexion;

    public function __construct($servidor,$user,$pass){
        $this->servidor=$servidor;
        $this->user=$user;
        $this->pass=$pass;
    }

    public function conectar(){
        try {
            $this->conexion= new PDO($this->servidor,  $this->user ,  $this->pass );
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $exception){
            echo "Error con la base de datos. ";
        }
    }

    public function desconectar(){
        $this->conexion=null;
    }

    public function ejecutar($comando){
        try {
            $ejecutar = $this->conexion->prepare($comando);
            $ejecutar->execute();
        }catch (PDOException $exception){
            throw $exception;
        }
    }

    public function consultar($consulta){
        try {
            $ejecutar=$this->conexion->prepare($consulta);
            $ejecutar->execute();
            $filas = $ejecutar->fetchAll();
            return $filas;
        }catch (PDOException $exception){
            throw $exception;
        }
    }
}