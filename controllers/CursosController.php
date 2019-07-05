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

    public static function doInscripcion($inscripcion)
    {
        $dbOperation = new DataBaseOperations();

        $inscipto = $dbOperation->select("inscripciones", "ci_alumno = $inscripcion->ci");
        if (count($inscipto) == 0) {
            $dbOperation->insert($inscripcion);
            return true;
        } else {
            return false;
        }
    }
}
