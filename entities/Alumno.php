<?php

require_once("Usuario.php");

class Alumno extends Usuario{

    private $ci;
    private $apellidos;
    private $direccion;
    private $telefono;
    private $foto;
    private $pin;
    private $status;

    public function __construct($ci, $nombre, $apellidos, $direccion, $telefono, $foto, $pin){
        parent::__construct($nombre, 1);
        $this->ci = $ci;
        $this->apellidos = $apellidos;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->foto = $foto;
        $this->pin = $pin;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo,  $valor){
        $this->$atributo = $valor;
    }

}



?>