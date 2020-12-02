<?php
class Usuario{
    public $usuario;
    public $pass;
    public $email;
    public $conexion;

    public function __construct($usuario,$email){
        $this->usuario=$usuario;
        $this->email=$email;
        $this->conexion=new DB_Connection('mysql:host=localhost;dbname=foro','root','');
    }

    public function comprobaciones(){
        $this->conexion->conectar();

        if ($this->usuario == '' || $this->pass == '' || $this->email == ''){
            echo "<div id='msg'>Por favor, introduce todos los campos requeridos</div>";
            return false;
        }elseif (!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            echo "<div id='msg'>La dirección de correo electrónico es inválida.</div>";
            return false;
        }else{
            $rw = $this->conexion->consultar("SELECT * FROM USUARIOS");
            if (count($rw)){
                for ($i=0;$i<count($rw);$i++){
                    if ($rw[$i]['nombre'] == $this->usuario){
                        echo "<div id='msg'>Nombre de usuario existente. Elija otro.</div>";
                        return false;
                    }
                }
            }
        }
    }

    public function nuevo(){
        try {
            $this->conexion->conectar();
            $this->conexion->ejecutar("insert usuarios set nombre='$this->usuario',pass='$this->pass',email='$this->email',tipo=3");
            $this->conexion->desconectar();
        }catch (PDOException $exception){
            throw $exception;
        }
    }

    public function encriptar($enc){
        $this->conexion->conectar();
        $password = password_hash($enc,PASSWORD_DEFAULT);
        $this->pass=$password;
        return $this->pass;
        $this->conexion->desconectar();
    }

    public function verificar($user,$password){
        try {
            $this->conexion->conectar();
            $rw = $this->conexion->consultar("select nombre, pass from usuarios");
            if (count($rw)){
                for ($i=0;$i<count($rw);$i++){
                    if ($rw[$i]['nombre'] == $user && password_verify($password,$rw[$i]['pass'])) {
                        echo "Contraseña correcta";
                        return true;
                    }
                }
            }
            $this->conexion->desconectar();
        }catch (PDOException $exception){
            throw $exception;
        }

    }
}

?>