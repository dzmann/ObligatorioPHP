<?php

if(isset($_POST["entrar"])){
    require_once("../controllers/Login.php");

    $rol = $_POST["rol"];

    $loginResult = Login::login($rol, $_POST["email"], $_POST["contrasenia"]);
    
    

}




?>