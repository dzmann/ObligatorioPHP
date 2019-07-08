<?php
require_once("Usuario.php");
class Encargado extends Usuario{

    private $email;
    private $contrasenia;

    public function __construct($email, $nombre, $contrasenia){
        parent::__construct($nombre, 1);
        $this->email = $email;
        $this->contrasenia = $contrasenia;
    }

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo,  $valor){
        $this->$atributo = $valor;
    }

}



?>