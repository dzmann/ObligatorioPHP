<?php

require_once("../database/DataBaseOperations.php");


class CursosController
{
    public function getCursos()
    {
        $dbOperation = new DataBaseOperations();

        $cursos = $dbOperation->select("cursos");

        return $cursos;
    }

    public function doInscripcion($cedulaAlumno, $idCurso){
        $dbOperation = new DataBaseOperations();

        $inscipto = $dbOperation->select("inscripciones", "ci_alumno =  $cedulaAlumno");
        echo $inscipto;

    }
}
