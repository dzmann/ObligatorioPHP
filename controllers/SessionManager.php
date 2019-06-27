<?php

class SessionManager{

    function createSession($userId, $nombre){
        session_start();
    
        $_SESSION["userId"] = $userId;
        $_SESSION["nombre"] = $nombre;
    
        //echo "Sesión iniciada para: ".$_SESSION["userId"];
    }

    function getSession(){
     session_start();
        $sessionArray["userid"] = $_SESSION["userId"];
        $sessionArray["nombre"] = $_SESSION["nombre"];
     return $sessionArray;
    }

}






?>