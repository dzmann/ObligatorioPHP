<?php

class Curso{

    private $idMateria;
    private $idProfesor;

    public function __construct($idMateria, $idProfesor){
        $this->idMateria = $idMateria;
        $this->idProfesor = $idProfesor;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo,  $valor){
        $this->$atributo = $valor;
    }

}

?>