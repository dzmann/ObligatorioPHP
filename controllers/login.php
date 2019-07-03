<?php

require_once("../database/DatabaseOperations.php");
require_once("../controllers/SessionManager.php");
require_once("../utils/EntitiesClassLoader.php");

class Login
{

    public static function Authenticate($rol, $user, $password)
    {
        $isLogged = false;
        $password_md5 = md5($password);
        $dbOperation = new DatabaseOperations();
        if ($rol == "encargado") {

            $result = $dbOperation->select("ENCARGADOS", "EMAIL='$user'", array("NOMBRE", "EMAIL", "CONTRASENIA"));

            if (isset($result[0])) {

                if ($result[0]["EMAIL"] == $user && $result[0]["CONTRASENIA"] == $password_md5) {
                    $isLogged = true;
                    $encargado = new Encargado($result[0]["EMAIL"], $result[0]["NOMBRE"], $result[0]["CONTRASENIA"]);
                    $sessionManager = new SessionManager();
                    $sessionManager->createSession($encargado->get("email"), $encargado->get("nombre"));
                }
            }
        } else if ($rol == "alumno") {
            //El pin del alumno no se modifica con MD5
            $result = $dbOperation->select("ALUMNOS", "CI='$user'", array("CI", "PIN"));

            if (isset($result[0])) {

                if ($result[0]["CI"] == $user && $result[0]["PIN" == $password]) {
                    $isLogged = true;
                }
            }
        }

        return $isLogged;
    }
}
