<?php

require_once("../database/DataBaseOperations.php");


class CursosController
{
    public function getCursos()
    {
        $dbOperation = new DataBaseOperations();
        $cursos = $dbOperation->select("cursos", "status=1");
        return $cursos;
    }

    public function getCurso($id){
        $dbOperation = new DataBaseOperations();
        $curso = $dbOperation->select("cursos", "id=$id");

        $cursoObj = new Curso($curso[0]["id"], $curso[0]["materia"], $curso[0]["profesor"]);
        return $cursoObj;
    }

    public function createCurso($curso){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->insert($curso);
    }

    public function updateCurso($curso){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->update($curso);
    }

    public function deactivateCurso($id){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->deactivate("CURSOS", "ID=$id");
    }

    public function getCursosConProfesores()
    {
        $dbOperation = new DataBaseOperations();
        $columns = array("CU.ID AS ID", "CU.MATERIA AS MATERIA", "PRO.NOMBRE AS NOMBRE_PROFESOR", "PRO.APELLIDO AS APELLIDO");
        $cursos = $dbOperation->select("CURSOS CU, PROFESORES PRO", "CU.PROFESOR = PRO.CI AND CU.STATUS=1", $columns);
        return $cursos;
    }

    public static function doInscripcion($inscripcion)
    {
        $dbOperation = new DataBaseOperations();

        $inscipto = $dbOperation->select("inscripciones", "ci_alumno = $inscripcion->ci");
        if (count($inscipto) == 0) {
            $dbOperation->insert($inscripcion);
        } else {
            echo "no se pudo inscribir";
        }
    }
}
