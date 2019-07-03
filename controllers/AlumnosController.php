<?php

require_once("../database/DataBaseOperations.php");


class AlumnosController
{
    public function getAlumnos()
    {
        $dbOperation = new DataBaseOperations();

        $alumnos = $dbOperation->select("alumnos");

        return $alumnos;
    }
}
