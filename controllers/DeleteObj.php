<?php
    require_once "./../utils/Constants.php";
    require_once PROJECT_ROOT."/controllers/AlumnosController.php";
    require_once PROJECT_ROOT."/controllers/MateriasController.php";
    
    $type = $_GET["section"];

    switch($type){
        case "alumnos":
            $alumnosController = new AlumnosController();
            $alumnosController->deactivateAlumno($_GET["id"]);
            header('Location: ../ui/seccionEncargado.php?section=alumnos');
            break;
        case "materias":
            $materiasController = new MateriasController();
            $materiasController->deactivateMateria($_GET["id"]);
            header('Location: ../ui/seccionEncargado.php?section=materias');
            break;
        default:
            die("Ocurrió un error eliminando el elemento, tipo desconocido");
            break;        

    }

?>