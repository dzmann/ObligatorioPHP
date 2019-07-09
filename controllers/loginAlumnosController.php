<?php
if (isset($_POST["entrar"])) {
    require_once("../controllers/login.php");
    require_once("../controllers/CursosController.php");

    $ciAlumno = $_POST["email"];
    $pin = $_POST["contrasenia"];
    $idCurso = $_POST['idCurso'];

    $loginResult = false;
    $insc = false;
    $loginResult = Login::Authenticate("alumno", $ciAlumno, $pin);

    if ($loginResult) {
        $inscripcion = new Inscripcion($ciAlumno, $idCurso);
        $insc = CursosController::doInscripcion($inscripcion);

        $cursos = CursosController::getCursosByAlumno($ciAlumno);
    }
}

?>

<div class="inscription-container">
    <?php if ($insc && $loginResult) { ?>

        <h2>Te inscribiste correctamente</h2>
        <table class="cursos">
            <tr>
                <th>Id del curso</th>
                <th>Materia</th>
                <th>Profesor</th>
                <th>Inscribirse</th>
            </tr>
            <tr>
                <?php
                foreach ($cursos as $row) {
                    echo "<td>" . $row['id'] . "</td><td>" . $row['materia'] . "</td><td>" . $row['profesor'] . "</td>";
                }
                ?>
            </tr>
        </table>

    <?php } else if (!$insc && $loginResult) { ?>

        <h2>Ya estabas inscripto...</h2>
        <table class="cursos">
            <tr>
                <th>Id del curso</th>
                <th>Materia</th>
                <th>Profesor</th>
            </tr>
            <tr>
                <?php
                foreach ($cursos as $row) {
                    echo "<td>" . $row['id'] . "</td><td>" . $row['materia'] . "</td><td>" . $row['profesor'] . "</td>";
                }
                ?>
            </tr>
        </table>

    <?php } ?>

    <?php if (!$loginResult) { ?>

        <h2>Usuario o contraseña incorrectos</h2>
        <a href="/obligatoriophp/ui/loginalumno.php".$idCurso >Volver</a>
    <?php } ?>
</div>