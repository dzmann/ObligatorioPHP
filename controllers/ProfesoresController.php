<?php

require_once("../database/DataBaseOperations.php");


class ProfesoresController
{
    public function getProfesores()
    {
        $dbOperation = new DataBaseOperations();
        $profesores = $dbOperation->select("profesores", "STATUS=1");
        return $profesores;
    }

    public function getProfesor($id){
        $dbOperation = new DataBaseOperations();
        $profesor = $dbOperation->select("profesores", "ci=$id");

        if($profesor != null){
            $profesorObj = new Profesor($profesor[0]["ci"], $profesor[0]["nombre"], $profesor[0]["apellido"], $profesor[0]["direccion"], $profesor[0]["telefono"]);
        }else{
            $profesorObj = null;
        }
        
        return $profesorObj;
    }

    public function createProfesor($profesor){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->insert($profesor);
    }

    public function updateProfesor($profesor){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->update($profesor);
    }

    public function deactivateProfesor($id){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->deactivate("profesores", "CI=$id");
    }
}