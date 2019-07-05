<?php
if (isset($_POST["entrar"])) {
    require_once("../controllers/login.php");
    require_once("../controllers/CursosController.php");

    $ciAlumno = $_POST["email"];
    $pin = $_POST["contrasenia"];
    $idCurso = $_POST['idCurso'];

    $loginResult = false;
    $loginResult = Login::Authenticate("alumno", $ciAlumno, $pin);

    $result = "";

    if ($loginResult) {
        $inscripcion = new Inscripcion($ciAlumno, $idCurso);
        $insc = CursosController::doInscripcion($inscripcion);
        $insc ? $result="Te inscribiste correctamente" : $result="hubo un error al inscribirte";
    } else {
         $result = "usuario incorrecto";
    }
}

?>

<div>
    <?php 
    
        echo $result;
    ?>

</div>
