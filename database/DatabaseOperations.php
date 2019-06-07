<?php

require_once("../utils/EntitiesClassLoader.php");
require_once("../database/DatabaseConnection.php");

class DatabaseOperations{

    private $databaseConnection;

    function __construct(){
        $this->databaseConnection = new DatabaseConnection();
    }

    public function insert($object){
        $result = false;
        switch(get_class($object)){
            case "Profesor":
                $query = "INSERT INTO PROFESORES (CI, NOMBRE, APELLIDO, DIRECCION, TELEFONO) VALUES ($object->ci, '$object->nombre', '$object->apellido', '$object->direccion', $object->telefono)";
                $result = $this->databaseConnection->dbInsert($query);
                break;
            case "Alumno":
                $image = addslashes($object->foto);
                $query = "INSERT INTO ALUMNOS (CI, NOMBRES, APELLIDOS, DIRECCION, TELEFONO, FOTO, PIN) VALUES ($object->ci, '$object->nombre', '$object->apellidos', '$object->direccion', $object->telefono, '{$image}', $object->pin)";   
                $result = $this->databaseConnection->dbInsert($query);
                break;
            case "Encargado":
                $query = "INSERT INTO ENCARGADOS (EMAIL, NOMBRE, CONTRASENIA) VALUES ('$object->email', '$object->nombre', '$object->contrasenia')";
                $result = $this->databaseConnection->dbInsert($query);
                break;
            case "Materia":
                $query = "INSERT INTO MATERIAS (NOMBRE, CONTENIDOS, NIVEL, CARGA_HORARIA) VALUES ('$object->nombre', '$object->contenidos', '$object->nivel', $object->cargaHoraria)";
                $result = $this->databaseConnection->dbInsert($query);
                break;
            case "Inscripcion":
                $query = "INSERT INTO INSCRIPCIONES (CI_ALUMNO, CI_CURSO) VALUES ('$object->ciAlumno', '$object->ciCurso')";
                $result = $this->databaseConnection->dbInsert($query);
                break;
            case "Curso":
                $query = "INSERT INTO CURSOS (MATERIA, PROFESOR) VALUES ('$object->materia', '$object->profesor')";
                $result = $this->databaseConnection->dbInsert($query);
                break;
            default:
                print "ERROR: Objecto desconocido";   
        }
        return $result;
    }

    public function select($table, $conditions, $columns=null){
        $query = "SELECT ";
        $arraySize = sizeof($columns);
        $counter = 0;
        $result = null;

        if($columns!=null){
            foreach ($columns as $col){
                $query .= $col." ";
                if($counter + 1 < $arraySize){
                    $query .= ", ";
                }
                $counter++;
            }    
        }else{
            $query .= " * ";
        }

        $query .= " FROM $table";
        $query .= "  WHERE $conditions";
        echo $query."<br>";
        $result = $this->databaseConnection->dbSelect($query);

        return $result;
    }

    public function delete($table, $conditions){
        $query = "DELETE FROM $table WHERE $conditions";
        $result = $this->databaseConnection->dbDelete($query);
        return $result;
    }
 
}

$operation = new DatabaseOperations();

$profe = new Profesor(1234567, "Danillo", "Zimermann", "Montevideo", 1255478);

$encargado = new Encargado("eemail@email.com", "Pepe", "Una contraseña loca");


$contenidoFoto = file_get_contents("avatar.png");
$alumno = new Alumno(5555, "Alumnillo", "Zimermann", "Montevideo", 25412541, $contenidoFoto, 12456);

if($operation->insert($alumno)){
    echo "Insert correcto";
}else{
    echo "Ocurrió un error al insertar";
}

//$operation->insert($encargado);
//$operation->delete("ENCARGADOS", "nombre='Pepe'");
$r = $operation->select("ALUMNOS", "NOMBRES='Alumnillo'");




?>