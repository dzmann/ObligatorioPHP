<?php

require_once("../database/DataBaseOperations.php");


class CursosController
{


    public function getCursos()
    {
        $dbOperation = new DataBaseOperations();

        $cursos = $dbOperation . select("cursos");
    }
}
