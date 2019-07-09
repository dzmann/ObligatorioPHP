<?php
    require_once "./../utils/Constants.php";
    require_once PROJECT_ROOT."/controllers/AlumnosController.php";
    require_once PROJECT_ROOT."/controllers/MateriasController.php";
    require_once PROJECT_ROOT."/controllers/ProfesoresController.php";
    require_once PROJECT_ROOT."/controllers/EncargadosController.php";
    require_once PROJECT_ROOT."/controllers/CursosController.php";
    
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
        case "profesores":
            $profesoresController = new ProfesoresController();
            $profesoresController->deactivateProfesor($_GET["id"]);
            header('Location: ../ui/seccionEncargado.php?section=profesores');
            break; 
        case "encargados":
            $encargadosController = new EncargadosController();
            $encargadosController->deactivateEncargado($_GET["id"]);
            header('Location: ../ui/seccionEncargado.php?section=encargados');
            break;  
        case "cursos":
            $cursosController = new CursosController();
            $cursosController->deactivateCurso($_GET["id"]);
            header('Location: ../ui/seccionEncargado.php?section=cursos');
            break;      
        default:
            die("Ocurrió un error eliminando el elemento, tipo desconocido");
            break;        

    }

?>