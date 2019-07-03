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
     $sessionArray=null;

        if(isset($_SESSION["userId"])){
            $sessionArray["userid"] = $_SESSION["userId"];
            $sessionArray["nombre"] = $_SESSION["nombre"];
        }
        
     return $sessionArray;
    }

    function checkSession($userId){
        
        $result = false;
        $segundos_inactivos = time() - $_SESSION['last_activity'];

        if($segundos_inactivos > $this->session_timeout){
            $this->destroySession();
        }else{
            $result = true;
        }
        return $result;
    }   

    function destroySession(){
        session_start();
        session_unset();
        session_destroy();
    }

}
