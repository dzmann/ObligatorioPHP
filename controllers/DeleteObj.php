<?php
    require_once "./../utils/Constants.php";
    require_once PROJECT_ROOT."/controllers/AlumnosController.php";
    

    $alumnosController = new AlumnosController();
    $alumnosController->deactivateAlumno($_GET["id"]);

    header('Location: ../ui/seccionEncargado.php?section=alumnos');
    
?>