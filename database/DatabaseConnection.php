<?php

require_once("../utils/EntitiesClassLoader.php");

class DatabaseConnection{

    const HOST          = "localhost";
    const DBNAME        = "obligatoriophp";
    const USER          = "root";
    const PASSWORD      = "";


    function getConnection(){
        $conexion=null;
        try{
            $conexion = mysqli_connect(self::HOST, self::USER, self::PASSWORD, self::DBNAME);
        }catch(Exception $ex){
            die("Ocurrió un error al conectarse a la base".$ex);
        }
        
        return $conexion;
    }
    
    function dbSelect($query){
        $result = null;
        try{
            $conexion = $this->getConnection();
            $r = mysqli_query($conexion, $query);
            $result = $this->parseData($r);
            mysqli_close($conexion);
        }catch(Exception $ex){
            echo "Ocurrió un error ejecutando el select".$ex->getMessage();
        }
        return $result;
    }

    function dbInsert($query){
        $result=null;
        try{
            $conexion = $this->getConnection();
            $result = mysqli_query($conexion, $query);
            if(!$result){
                echo mysqli_error($conexion);
            }
            
            mysqli_close($conexion);
        }catch(Exception $ex){
            echo "Ocurrió un error ejecutando el insert".$ex->getMessage();
        }
        return $result;
    }

    function dbDelete($query){
        $result = null;

        try{
            $conexion = $this->getConnection();
            $result = mysqli_query($conexion, $query);
            mysqli_close($conexion);
        }catch(Exception $ex){
            echo "Ocurrió un error al eliminar el registro".$ex->getMessage();
        }
        return $result;
    }

    function dbUpdate($query){
        $result = null;
        try{
            $conexion = $this->getConnection();
            $result = mysqli_query($conexion, $query);
            mysqli_close($conexion);
        }catch(Exception $ex){
            echo "Ocurrió un error actualizando el registro".$ex->getMessage();
        }
        return $result;
    }

    function parseData($resource){
        $result = array();

        if($resource!=null){

            while($row = mysqli_fetch_array($resource)){
                $result[] = $row;
            }    
        }
        return $result;
    }


    function dbDeactivate($query){
        $result = null;

        try{
            $conexion = $this->getConnection();
            $result = mysqli_query($conexion, $query);
            mysqli_close($conexion);
        }catch(Exception $ex){
            echo "Ocurrió un error al desactivar el item".$ex->getMessage();
        }
        return $result;
    }
 
}



?>