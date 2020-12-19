<?php
require_once ("model/DB_Connection.php");
    class Sesion{
        function Sesion(){
            session_start();
        }

        public function set($nombre,$valor){
            $_SESSION[$nombre] = $valor;
        }

        public  function get($user){
            if (isset($_SESSION[$user])){
                return $_SESSION[$user];
            }else{
                return false;
            }
        }

        public function borrarSesion(){
            $_SESSION = array();
            session_destroy();
            header("Location:index.php");
        }
    }
?>