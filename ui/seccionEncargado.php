<?php
    require_once "./../utils/Constants.php";
    include_once PROJECT_ROOT."/ui/menuEncargado.php";
    require_once PROJECT_ROOT."/controllers/AlumnosController.php";
    require_once PROJECT_ROOT."/controllers/CursosController.php";
    require_once PROJECT_ROOT."/controllers/FileUploader.php";
    require_once PROJECT_ROOT."/controllers/SessionManager.php";
    require_once PROJECT_ROOT."/utils/EntitiesClassLoader.php";

    $session = new SessionManager();
    $havePermission = false;

    if($session->getSession()!=null){
        if($session->checkSession($_SESSION["userId"])){
            $havePermission = true;
        }
    }

    if($havePermission){
        if(isset($_GET["section"])){
            $section = $_GET["section"];
    
            if($section == "cursos"){
                include_once PROJECT_ROOT."/ui/listados/listado-cursos.php";
            }else if($section == "alumnos"){
                include_once PROJECT_ROOT."/ui/listados/listado-alumnos.php";
            }else if($section == "addEditAlumno"){
                include_once PROJECT_ROOT."/ui/addEditAlumno.php";
            }
        }else{
            include_once PROJECT_ROOT."/ui/listados/listado-alumnos.php";
        }
    }else{
        header('Location: loginEncargado.php?login=expired');
    }

    
    


?>