
<body>
<table class="encargados">
    <tr>
        <td>
            <a href="seccionEncargado.php?mode=create&section=addEditEncargado"><button>Agregar nuevo</button></a>
        </td>
    </tr>
    <tr>
        <th>Email</th>
        <th>Nombre</th>
    </tr>
    
        <?php
       
        $encargadosController = new EncargadosController();
        $encargados = $encargadosController->getEncargados();

        foreach ($encargados as $row) {
            echo "<tr><td>" . $row['email'] . "</td><td>" . $row['nombre'] . "</td><td>".
             "<td><a href='seccionEncargado.php?mode=edit&section=addEditEncargado&idEncargado=" . $row['email'] . "'><img height='30' width='30' src='./../img/editicon.jpg'></a></td><td><a href=# onclick=borrar('./../controllers/DeleteObj.php?section=encargados&id=".$row['email']."')><img height='30' width='30' src='./../img/deleteicon.jpg'></a></td></tr>";
        }

        ?>
    
</table>

</body>

</html>