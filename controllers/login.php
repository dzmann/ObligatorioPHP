<?php

require_once("../database/DatabaseOperations.php");
require_once("../controllers/SessionManager.php");

if(isset($_POST["entrar"])){

    $email = $_POST["email"];
    $contrasenia = $_POST["contrasenia"];
    $rol = $_POST["rol"];
    $contrasenia_md5 = md5($contrasenia);
    $dbOperation = new DatabaseOperations();

    if($rol=="encargado"){
        $result = $dbOperation->select("ENCARGADOS", "EMAIL='$email'", array("EMAIL", "NOMBRE", "CONTRASENIA"));
        if(isset($result[0])){
            
            
            if($result[0]["EMAIL"]==$email && $result[0]["CONTRASENIA"]==$contrasenia_md5){
                $sessionObj = new SessionManager();
                $sessionObj->createSession($result[0]["NOMBRE"]);
                echo "Login correcto";
            }else{
                header("Location: ../ui/login.php?result=error");
            }
        }else{
            header("Location: ../ui/login.php?result=error");
        }
    }
}






?>