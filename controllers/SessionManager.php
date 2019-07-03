<?php

class SessionManager{

    private $session_timeout = 3600; 

    function createSession($userId, $nombre){
        session_start();
    
        $_SESSION["userId"] = $userId;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["last_activity"] = time();

    }

    function getSession(){
     session_start();
        $sessionArray["userid"] = $_SESSION["userId"];
        $sessionArray["nombre"] = $_SESSION["nombre"];
     return $sessionArray;
    }

    function checkSession($userId){
        session_start();
        $segundos_inactivos = time() - $_SESSION['last_activity'];

        if($segundos_inactivos > $this->session_timeout){
            session_unset();
            session_destroy();
        }

    }

}






?>