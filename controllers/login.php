<?php

require_once("../database/DatabaseOperations.php");
require_once("../controllers/SessionManager.php");

class Login{

    public static function login($rol, $user, $password){
        $isLogged = false;
        $password_md5 = md5($password);
        $dbOperation = new DatabaseOperations();

        if($rol=="encargado"){
            
            $result = $dbOperation->select("ENCARGADOS", "EMAIL='$user'", array("EMAIL", "CONTRASENIA"));
    
            if(isset($result[0])){
                
                if($result[0]["EMAIL"]==$user && $result[0]["CONTRASENIA"==$password_md5]){
                    $isLogged=true;
                }else{
                    $isLogged=false;
                }
    
            }else{
                $isLogged=false;
            }

        }else if($rol=="alumno"){
            
            $result = $dbOperation->select("ALUMNOS", "CI='$user'", array("CI", "PIN"));
    
            if(isset($result[0])){
                
                if($result[0]["CI"]==$user && $result[0]["PIN"==$password_md5]){
                    $isLogged=true;
                }else{
                    $isLogged=false;
                }
    
            }else{
                $isLogged=false;
            }
    
        }

        return $isLogged;

    }

}
?>