
<body>
<span><h3>Listado de profesores.</h3></span>
<table class="profesores">
    <tr>
        <td>
            <a href="seccionEncargado.php?mode=create&section=addEditProfesor"><button>Agregar nuevo</button></a>
        </td>
    </tr>
    <tr>
        <th>Cédula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Acciones</th>
    </tr>
    
        <?php
       
        $profesoresController = new ProfesoresController();
        $profesores = $profesoresController->getProfesores();

        foreach ($profesores as $row) {
            echo "<tr><td>" . $row['ci'] . "</td><td>" . $row['nombre'] . "</td><td>" . $row['apellido'] . "</td><td>" . $row['direccion'] . "</td><td>" . $row['telefono'] ."
             <td><a href='seccionEncargado.php?mode=edit&section=addEditProfesor&idProfesor=" . $row['ci'] . "'><img height='30' width='30' src='./../img/editicon.jpg'></a></td><td><a href=# onclick=borrar('./../controllers/DeleteObj.php?section=profesores&id=".$row['ci']."')><img height='30' width='30' src='./../img/deleteicon.jpg'></a></td></tr>";
        }

        ?>
    
</table>

</body>

</html>