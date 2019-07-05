<?php

require_once("../database/DataBaseOperations.php");


class MateriasController
{
    public function getMaterias()
    {
        $dbOperation = new DataBaseOperations();

        $cursos = $dbOperation->select("materias");

        return $cursos;
    }

    public function getMateria($id){
        $dbOperation = new DataBaseOperations();
        $materia = $dbOperation->select("materias", "nombre=$id");
        $materiaObj = new Materia($materia[0]["nombre"], $materia[0]["contenidos"], $materia[0]["nivel"], $materia[0]["carga_horaria"]);
        return $materiaObj;
    }

    public function createAlumno($alumno){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->insert($alumno);
    }

    public function updateAlumno($alumno){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->update($alumno);
    }

    public function deactivateAlumno($id){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->deactivate("ALUMNOS", "CI=$id");
    }

    
}