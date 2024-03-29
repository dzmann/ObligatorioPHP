
<?php
    require_once "./../utils/Constants.php";
    require_once PROJECT_ROOT."/controllers/SessionManager.php";
    $session = new SessionManager();
    
    $havePermission = false;

    if($session->getSession()!=null){
        if($session->checkSession($_SESSION["userId"])){
            $havePermission = true;
        }
    }

    include_once PROJECT_ROOT."/ui/menuEncargado.php";
    require_once PROJECT_ROOT."/controllers/AlumnosController.php";
    require_once PROJECT_ROOT."/controllers/CursosController.php";
    require_once PROJECT_ROOT."/controllers/MateriasController.php";
    require_once PROJECT_ROOT."/controllers/ProfesoresController.php";
    require_once PROJECT_ROOT."/controllers/EncargadosController.php";
    require_once PROJECT_ROOT."/controllers/CursosController.php";
    require_once PROJECT_ROOT."/controllers/FileUploader.php";
    require_once PROJECT_ROOT."/utils/EntitiesClassLoader.php";


    if($havePermission){
        if(isset($_GET["section"])){
            $section = $_GET["section"];

            if($section == "cursos"){
                include_once PROJECT_ROOT."/ui/listados/listado-cursos.php";
            }else if($section == "materias"){
                include_once PROJECT_ROOT."/ui/listados/listado-materias.php";
            }else if($section == "profesores"){
                include_once PROJECT_ROOT."/ui/listados/listado-profesores.php";
            }else if($section == "alumnos"){
                include_once PROJECT_ROOT."/ui/listados/listado-alumnos.php";
            }else if($section == "addEditProfesor"){
                include_once PROJECT_ROOT."/ui/addEditProfesor.php";
            }else if($section == "addEditAlumno"){
                include_once PROJECT_ROOT."/ui/addEditAlumno.php";
            }else if($section == "encargados"){
                include_once PROJECT_ROOT."/ui/listados/listado-encargados.php";
            }else if($section == "addEditEncargado"){
                include_once PROJECT_ROOT."/ui/addEditEncargado.php";
            }else if($section == "cursos"){
                include_once PROJECT_ROOT."/ui/listados/listado-cursos.php";
            }else if($section == "addEditCurso"){
                include_once PROJECT_ROOT."/ui/addEditCurso.php";
            }
            else if($section == "addEditMateria"){
                include_once PROJECT_ROOT."/ui/addEditMateria.php";
            }
        }else{
            include_once PROJECT_ROOT."/ui/listados/listado-alumnos.php";
        }
    }else{
        header('Location: loginEncargado.php?login=expired');
    }

?>

