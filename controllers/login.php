<?php

require_once("../database/DatabaseOperations.php");

if(isset($_POST["enviar"])){

    $email = $_POST["email"];
    $contrasenia = $_POST["contrasenia"];
    $rol = $_POST["rol"];

    $dbOperation = new DatabaseOperations();

    if($rol=="encargado"){
        $result = $dbOperation->select("ENCARGADOS", "EMAIL='$email'", array("EMAIL", "NOMBRE", "CONTRASENIA"));
        if(isset($result[0])){

            if($result[0]["EMAIL"]==$email && $result[0]["CONTRASENIA"==$contrasenia]){

            }

        }else{
            echo "Usuario inválido";
        }
    }
    

    



}




?>