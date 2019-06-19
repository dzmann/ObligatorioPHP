<?php

class SessionManager{

    function createSession($userId){
        session_start();
    
        $_SESSION["userId"] = $userId;
    
        echo "Sesión iniciada para: ".$_SESSION["userId"];
    }

}






?>