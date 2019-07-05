<table class="cursos">
    <tr>
        <th>Id del curso</th>
        <th>Materia</th>
        <th>Profesor</th>
        <th>Inscribirse</th>
    </tr>
    <tr>
        <?php
        require_once "./../utils/Constants.php";
        require_once PROJECT_ROOT."/controllers/CursosController.php";

        $CursosController = new CursosController();
        $cursos = $CursosController->getCursos();

        foreach ($cursos as $row) {
            echo "<td>" . $row['id'] . "</td><td>" . $row['materia'] . "</td><td>" . $row['profesor'] . "</td><td><a href='loginalumno.php?idCurso=" . $row['id'] . "'>Inscribirme</a></td>";
        }

        ?>
    </tr>
</table>