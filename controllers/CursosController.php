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
        
        if($curso!=null){
            $cursoObj = new Curso($curso[0]["id"], $curso[0]["materia"], $curso[0]["profesor"]);
        }else{
            $cursoObj= null;
        }
       
        return $cursoObj;
    }

    public function createCurso($curso){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->insert($curso);
    }

    public function getCursoConMateriaProfesor($materia, $profesor){
        $dbOperation = new DataBaseOperations();
        $curso = $dbOperation->select("cursos", "materia='$materia' AND profesor=$profesor");
        $cursoObj= null;
        
        if($curso!=null){
            $cursoObj = new Curso($curso[0]["id"], $curso[0]["materia"], $curso[0]["profesor"]);
        }
       
        return $cursoObj;

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

        $inscipto = $dbOperation->select("inscripciones", "ci_alumno = $inscripcion->ci AND id_curso = $inscripcion->idCurso");
        if (count($inscipto) == 0) {
            $dbOperation->insert($inscripcion);
            return true;
        } else {
            return false;
        }
    }

    public static function getCursosPorAlumno($ciAlumno)
    {
        $dbOperation = new DataBaseOperations();

        //SELECT C.id , C.materia , I.ci_alumno FROM cursos C, inscripciones I WHERE I.ci_alumno = 5555 AND I.id_curso = C.id
        $columns = array("C.id", "C.materia", "I.ci_alumno");
        $cursos = $dbOperation->select("cursos C, inscripciones I", "I.ci_alumno = $ciAlumno AND I.id_curso = C.id", $columns );

        return $cursos;
    }
}
