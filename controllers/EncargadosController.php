<?php

require_once("../database/DataBaseOperations.php");


class EncargadosController
{
    public function getEncargados()
    {
        $dbOperation = new DataBaseOperations();
        $encargados = $dbOperation->select("encargados", "STATUS=1");
        return $encargados;
    }

    public function getEncargado($id){
        $dbOperation = new DataBaseOperations();
        $encargado = $dbOperation->select("encargados", "email='$id'");

        $encargadoObj = new Encargado($encargado[0]["email"], $encargado[0]["nombre"], $encargado[0]["contrasenia"], $encargado[0]["status"]);
        return $encargadoObj;
    }

    public function createEncargado($encargado){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->insert($encargado);
    }

    public function updateEncargado($encargado){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->update($encargado);
    }

    public function deactivateEncargado($id){
        $dbOperation = new DataBaseOperations();
        return $dbOperation->deactivate("encargados", "email='$id'");
    }
}