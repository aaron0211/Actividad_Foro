<?php
class Comentario{
    public $comentario;
    public $fecha;
    public $com_id;
    public $tema_id;
    public $usuario_id;

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param mixed $comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getComId()
    {
        return $this->com_id;
    }

    /**
     * @param mixed $com_id
     */
    public function setComId($com_id)
    {
        $this->com_id = $com_id;
    }

    /**
     * @return mixed
     */
    public function getTemaId()
    {
        return $this->tema_id;
    }

    /**
     * @param mixed $tema_id
     */
    public function setTemaId($tema_id)
    {
        $this->tema_id = $tema_id;
    }

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * @param mixed $usuario_id
     */
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }


}