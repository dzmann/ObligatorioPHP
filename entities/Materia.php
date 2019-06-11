<?php

class Materia{

    private $nombre;
    private $contenidos;
    private $nivel;
    private $cargarHoraria;

    public function __construct($nombre, $contenidos, $nivel, $cargarHoraria){
        $this->nombre = $nombre;
        $this->contenidos = $contenidos;
        $this->nivel = $nivel;
        $this->cargaHoraria = $cargarHoraria;
    }
    
    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo,  $valor){
        $this->$atributo = $valor;
    }

}

?>