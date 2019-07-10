<?php

require_once("../database/DataBaseOperations.php");


class AlumnosController
{
    public function getAlumnos()
    {
        $dbOperation = new DataBaseOperations();
        $alumnos = $dbOperation->select("alumnos", "STATUS=1");
        return $alumnos;
    }

    public function getAlumno($id){
        $dbOperation = new DataBaseOperations();
        $alumno = $dbOperation->select("alumnos", "ci=$id");
        if($alumno!=null){
            $alumnoObj = new Alumno($alumno[0]["ci"], $alumno[0]["nombres"], $alumno[0]["apellidos"], $alumno[0]["direccion"], $alumno[0]["telefono"], $alumno[0]["foto"], $alumno[0]["pin"]);
        }else{
            $alumnoObj = null;
        }
        
        return $alumnoObj;
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