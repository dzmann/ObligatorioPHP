<?php

class Inscripcion
{
    private $ci;
    private $idCurso;

    public function __construct($ci, $idCurso)
    {
        $this->ci = $ci;
        $this->idCurso = $idCurso;
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo,  $valor)
    {
        $this->$atributo = $valor;
    }
}
