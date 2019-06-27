<?php

if(isset($_POST["entrar"])){
    require_once("../controllers/login.php");
    $loginResult=false;
    $loginResult = Login::Authenticate("encargado", $_POST["email"], $_POST["contrasenia"]);
    
    if($loginResult){
        //header( 'Location: ../ui/loginEncargado.php?login=success' );
        
    }else{
        header( 'Location: ../ui/loginEncargado.php?login=error' );
    }

}


?>