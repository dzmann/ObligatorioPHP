
<body>
<span><h3>Listado de alumnos.</h3></span>
<table class="alumnos">
    <tr>
        <td>
            <a href="seccionEncargado.php?mode=create&section=addEditAlumno"><button>Agregar nuevo</button></a>
        </td>
    </tr>
    <tr>
        <th>Cédula de Identidad</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Foto</th>
        <th>Acciones</th>
    </tr>
    
        <?php
       
        $alumnosController = new AlumnosController();
        $alumnos = $alumnosController->getAlumnos();
        
        foreach ($alumnos as $row) {
            echo "<tr><td>" . $row['ci'] . "</td><td>" . $row['nombres'] . "</td><td>" . $row['apellidos'] . "</td><td>" . $row['direccion'] .
             "</td><td>" . $row['telefono'] . "</td><td><img src=../img/".$row['foto']." height='100' width='100'></td>
             <td><a href='seccionEncargado.php?mode=edit&section=addEditAlumno&idAlumno=" . $row['ci'] . "'><img height='30' width='30' src='./../img/editicon.jpg'></a></td><td><a href=# onclick=borrar('./../controllers/DeleteObj.php?section=alumnos&id=".$row['ci']."')><img height='30' width='30' src='./../img/deleteicon.jpg'></a></td></tr>";
        }

        ?>
    
</table>

</body>

</html>