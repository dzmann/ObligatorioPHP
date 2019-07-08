<?php

require_once("../utils/EntitiesClassLoader.php");
require_once("../database/DatabaseConnection.php");

class DatabaseOperations
{

    private $databaseConnection;

    function __construct()
    {
        $this->databaseConnection = new DatabaseConnection();
    }

    public function insert($object)
    {
        $result = false;
        switch (get_class($object)) {
            case "Profesor":
                $query = "INSERT INTO PROFESORES (CI, NOMBRE, APELLIDO, DIRECCION, TELEFONO, STATUS) VALUES ($object->ci, '$object->nombre', '$object->apellido', '$object->direccion', $object->telefono, $object->status)";
                $result = $this->databaseConnection->dbInsert($query);
                break;
            case "Alumno":
                $query = "INSERT INTO ALUMNOS (CI, NOMBRES, APELLIDOS, DIRECCION, TELEFONO, FOTO, PIN, STATUS) VALUES ($object->ci, '$object->nombre', '$object->apellidos', '$object->direccion', $object->telefono, '$object->foto', $object->pin, $object->status)";
                $result = $this->databaseConnection->dbInsert($query);
                break;
            case "Encargado":
                $query = "INSERT INTO ENCARGADOS (EMAIL, NOMBRE, CONTRASENIA) VALUES ('$object->email', '$object->nombre', '$object->contrasenia', $object->status)";
                $result = $this->databaseConnection->dbInsert($query);
                break;
            case "Materia":
                $query = "INSERT INTO MATERIAS (NOMBRE, CONTENIDOS, NIVEL, CARGA_HORARIA, STATUS) VALUES ('$object->nombre', '$object->contenidos', '$object->nivel', $object->cargaHoraria, $object->status)";
                $result = $this->databaseConnection->dbInsert($query);
                break;
            case "Inscripcion":
                $query = "INSERT INTO INSCRIPCIONES (CI_ALUMNO, ID_CURSO) VALUES ('$object->ci', '$object->idCurso')";
                $result = $this->databaseConnection->dbInsert($query);
                break;
            case "Curso":
                $query = "INSERT INTO CURSOS (MATERIA, PROFESOR) VALUES ('$object->materia', '$object->profesor', $object->status)";
                $result = $this->databaseConnection->dbInsert($query);
                break;
            default:
                print "ERROR: Objecto desconocido";
        }
        return $result;
    }


    public function update($object)
    {
        $result = false;
        switch (get_class($object)) {
            case "Profesor":
                $query = "UPDATE PROFESORES SET CI=$object->ci, NOMBRE='$object->nombre', APELLIDO='$object->apellido', DIRECCION='$object->direccion', TELEFONO=$object->telefono WHERE CI=$object->ci";
                $result = $this->databaseConnection->dbUpdate($query);
                break;
            case "Alumno":
                $query = "UPDATE ALUMNOS SET CI=$object->ci, NOMBRES='$object->nombre', APELLIDOS='$object->apellidos', DIRECCION='$object->direccion', TELEFONO=$object->telefono, FOTO='$object->foto', PIN=$object->pin WHERE CI=$object->ci";
                $result = $this->databaseConnection->dbUpdate($query);
                break;
            case "Encargado":
                $query = "UPDATE ENCARGADOS SET EMAIL='$object->email', NOMBRE='$object->nombre', CONTRASENIA='$object->contrasenia' WHERE EMAIL='$object->email'";
                $result = $this->databaseConnection->dbUpdate($query);
                break;
            case "Materia":
                $query = "UPDATE MATERIAS SET CONTENIDOS='$object->contenidos', NIVEL='$object->nivel', CARGA_HORARIA= $object->cargaHoraria WHERE NOMBRE='$object->nombre'";
                $result = $this->databaseConnection->dbUpdate($query);
                break;
            case "Curso":
                $query = "UPDATE CURSOS SET MATERIA='$object->materia', PROFESOR='$object->profesor' WHERE ID=$object->id";
                $result = $this->databaseConnection->dbUpdate($query);
                break;
            default:
                print "ERROR: Objecto desconocido";
        }
        return $result;
    }

    public function select($table, $conditions = null, $columns = null)
    {
        $query = "SELECT ";
        $counter = 0;
        $result = null;

        if ($columns != null) {
            $arraySize = sizeof($columns);
            foreach ($columns as $col) {
                $query .= $col . " ";
                if ($counter + 1 < $arraySize) {
                    $query .= ", ";
                }
                $counter++;
            }
        } else {
            $query .= "*";
        }

        $query .= " FROM $table";

        if ($conditions != null) {
            $query .= " WHERE $conditions";
        }

        $result = $this->databaseConnection->dbSelect($query);

        return $result;
    }

    public function delete($table, $conditions)
    {
        $query = "DELETE FROM $table WHERE $conditions";
        $result = $this->databaseConnection->dbDelete($query);
        return $result;
    }

    public function deactivate($table, $conditions){
        $query = "UPDATE $table SET STATUS=0 WHERE $conditions";
        $result = $this->databaseConnection->dbDeactivate($query);
        return $result;
    }
}

$operation = new DatabaseOperations();
