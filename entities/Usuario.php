<?php

abstract class Usuario{

    protected $nombre;
    protected $status;

    public function __construct($nombre, $status){
        $this->nombre = $nombre;
        $this->status = $status;
    }
    
}




?>