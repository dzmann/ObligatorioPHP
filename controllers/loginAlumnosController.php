<?php
$idCurso = "";

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

        $cursos = CursosController::getCursosPorAlumno($ciAlumno);
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
            </tr>
            <tr>
                <?php
                foreach ($cursos as $row) {
                    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['materia'] . "</td><td><b>Inscripto</b></td></tr>";
                }
                ?>
            </tr>
        </table>
        <a href="/obligatoriophp/ui/menualumno.php" >Volver</a>

    <?php } else if (!$insc && $loginResult) { ?>

        <h2>Ya estabas inscripto...</h2>
        <table class="cursos">
            <tr>
                <th>Id del curso</th>
                <th>Materia</th>
            </tr>
            <tr>
                <?php
                foreach ($cursos as $row) {
                    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['materia'] . "</td><td><b>Inscripto</b></td></tr>";
                }
                ?>
            </tr>
        </table>
        <a href="/obligatoriophp/ui/menualumno.php" >Volver</a>
    <?php } ?>

    <?php if (!$loginResult) { ?>

        <h2>Usuario o contraseña incorrectos</h2>
        <a href=<?php echo "/obligatoriophp/ui/loginalumno.php?idCurso=$idCurso"; ?> >Volver</a>
    <?php } ?>
</div>