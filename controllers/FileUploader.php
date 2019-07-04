<?php

require_once "./../utils/Constants.php";

class FileUploader{

    public static function uploadImage($fieldName){

        $result = false;
        $originalName = $_FILES[$fieldName]['name'];
        $temporalName = $_FILES[$fieldName]['tmp_name'];
        
        if(is_uploaded_file($temporalName)){
        
            if(move_uploaded_file($temporalName, IMG_ROOT.$originalName)){
                $result = true;
            }else{
                echo "Ocurrió un error subiendo el archivo";
            }
        
        }else{
            echo "No se subió ningún archivo";
        }

        return $result;

    }



}
?>