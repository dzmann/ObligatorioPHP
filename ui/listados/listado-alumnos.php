<table class="cursos">
    <tr>
        <th>Cédula de Identidad</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Foto</th>
    </tr>
    <tr>
        <?php
        require_once "./../controllers/AlumnosController.php";

        $alumnosController = new AlumnosController();
        $alumnos = $alumnosController->getAlumnos();

        foreach ($alumnos as $row) {
            echo "<td>" . $row['ci'] . "</td><td>" . $row['nombres'] . "</td><td>" . $row['apellidos'] . "</td><td><a href='/loginalumno.php?idCurso=" . $row['ci'] . "'>Editar</a></td>";
        }

        ?>
    </tr>
</table>