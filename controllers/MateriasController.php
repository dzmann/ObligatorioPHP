<?php

require_once("../database/DataBaseOperations.php");


class MateriasController
{
    public function getMaterias()
    {
        $dbOperation = new DataBaseOperations();
        $cursos = $dbOperation->select("materias", "STATUS=1");
        return $cursos;
    }

    public function getMateria($id){
        $dbOperation = new DataBaseOperations();
        $materia = $dbOperation->select("materias", "nombre='$id'");

        if($materia != null){
            $materiaObj = new Materia($materia[0]["nombre"], $materia[0]["contenidos"], $materia[0]["nivel"], $materia[0]["carga_horaria"]);
        }else{
            $materiaObj = null;
        }
        
        return $materiaObj;
    }

    public function createMateria($materia){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->insert($materia);
    }

    public function updateMateria($materia){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->update($materia);
    }

    public function deactivateMateria($id){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->deactivate("MATERIAS", "nombre='$id'");
    }

    
}