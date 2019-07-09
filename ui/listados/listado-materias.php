
<body>
<span><h3>Listado de materias.</h3></span>
<table class="materias">
    <tr>
        <td>
            <a href="seccionEncargado.php?mode=create&section=addEditMateria"><button>Agregar nuevo</button></a>
        </td>
    </tr>
    <tr>
        <th>Nombre</th>
        <th>Contenidos</th>
        <th>Nivel</th>
        <th>Carga horaria</th>
        <th>Acciones</th>
    </tr>
    
        <?php
       
        $materiasController = new MateriasController();
        $materias = $materiasController->getMaterias();

        foreach ($materias as $row) {
            echo "<tr><td>" . $row['nombre'] . "</td><td>" . $row['contenidos'] . "</td><td>" . $row['nivel'] . "</td><td>" . $row['carga_horaria'] ."
             <td><a href='seccionEncargado.php?mode=edit&section=addEditMateria&idMateria=" . $row['nombre'] . "'><img height='30' width='30' src='./../img/editicon.jpg'></a></td><td><a href=# onclick=borrar('./../controllers/DeleteObj.php?section=materias&id=".$row['nombre']."')><img height='30' width='30' src='./../img/deleteicon.jpg'></a></td></tr>";
        }

        ?>
    
</table>

</body>

</html>