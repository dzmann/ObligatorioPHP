<?php

class Curso{

    private $id;
    private $idMateria;
    private $idProfesor;
    private $status;

    public function __construct($idMateria, $idProfesor){
        $this->idMateria = $idMateria;
        $this->idProfesor = $idProfesor;
        $this->status = 1;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo,  $valor){
        $this->$atributo = $valor;
    }

}

?>