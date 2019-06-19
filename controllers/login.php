<?php

require_once("../database/DatabaseOperations.php");

if(isset($_POST["entrar"])){

    $email = $_POST["email"];
    $contrasenia = $_POST["contrasenia"];
    $rol = $_POST["rol"];
    $contrasenia_md5 = md5($contrasenia);
    $dbOperation = new DatabaseOperations();

    if($rol=="encargado"){
        $result = $dbOperation->select("ENCARGADOS", "EMAIL='$email'", array("EMAIL", "NOMBRE", "CONTRASENIA"));
        if(isset($result[0])){
            echo "contrasenia: $contrasenia_md5";
            
            if($result[0]["EMAIL"]==$email && $result[0]["CONTRASENIA"==$contrasenia_md5]){
                echo "login correcto";
            }else{
                echo "login incorrecto";
            }

        }else{
            echo "Usuario inválido";
        }
    }
    

    



}




?>