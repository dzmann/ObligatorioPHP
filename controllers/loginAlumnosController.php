<?php


if (isset($_POST["entrar"])) {
    require_once("../controllers/login.php");
    require_once("../controllers/CursosController.php");

    $ciAlumno = $_POST["email"];
    $pin = $_POST["contrasenia"];
    $idCurso = $_POST['idCurso'];

    $loginResult = false;
    $loginResult = Login::Authenticate("alumno", $ciAlumno, $pin);

    if ($loginResult) {
        $inscripcion = new Inscripcion($ciAlumno, $idCurso);
        CursosController::doInscripcion($inscripcion);
    } else {
        echo "login fail";
    }
}
