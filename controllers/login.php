<?php

require_once("../database/DatabaseOperations.php");
require_once("../controllers/SessionManager.php");
require_once("../utils/EntitiesClassLoader.php");

class Login
{

    public static function Authenticate($rol, $user, $password)
    {
        $isLogged = false;
        $password_base64 = base64_encode($password);
        $dbOperation = new DatabaseOperations();
        if ($rol == "encargado") {

            $result = $dbOperation->select("ENCARGADOS", "EMAIL='$user'", array("NOMBRE", "EMAIL", "CONTRASENIA"));

            if (isset($result[0])) {

                if ($result[0]["EMAIL"] == $user && $result[0]["CONTRASENIA"] == $password_base64) {
                    $isLogged = true;
                    $encargado = new Encargado($result[0]["EMAIL"], $result[0]["NOMBRE"], $result[0]["CONTRASENIA"]);
                    $sessionManager = new SessionManager();
                    $sessionManager->createSession($encargado->__get("email"), $encargado->__get("nombre"));
                }
            }
        } else if ($rol == "alumno") {
            //El pin del alumno no se modifica con MD5
            $result = $dbOperation->select("ALUMNOS", "CI='$user'", array("CI", "PIN"));

            if (isset($result[0])) {

                if ($result[0]["CI"] == $user && $result[0]["PIN"] == $password) {
                    $isLogged = true;
                }
            }
        }

        return $isLogged;
    }
}
