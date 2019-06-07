<?php
require_once("Usuario.php");
class Profesor extends Usuario{

    private $ci;
    private $apellido;
    private $direccion;
    private $telefono;

    public function __construct($ci, $nombre, $apellido, $direccion, $telefono){
        parent::__construct($nombre);
        $this->ci = $ci;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->telefono = $telefono;

    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo,  $valor){
        $this->$atributo = $valor;
    }



}

?>