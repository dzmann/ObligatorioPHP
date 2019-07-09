<span><h3>Listado de cursos.</h3></span>
<table class="cursos">
    
    <?php if($isAdmin){ ?>
        <tr>
             <td>
                  <a href="seccionEncargado.php?mode=create&section=addEditCurso"><button>Agregar nuevo</button></a>
             </td>
         </tr>
        <tr>
            <th>Id del curso</th>
            <th>Materia</th>
            <th>Profesor</th>
            <th>Acciones</th>
        </tr>
    <?php }else{ ?>    
    <tr>
        <th>Id del curso</th>
        <th>Materia</th>
        <th>Profesor</th>
        <th>Inscribirse</th>
    </tr>
    <?php } ?>
    <tr>
        <?php
        require_once "./../utils/Constants.php";
        require_once PROJECT_ROOT."/controllers/CursosController.php";

        $CursosController = new CursosController();
        
        if($isAdmin){
            $cursos = $CursosController->getCursosConProfesores();
            foreach ($cursos as $row) {
                echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['MATERIA'] . "</td><td>" . $row['NOMBRE_PROFESOR'] ." ". $row['APELLIDO']."
             <td><a href='seccionEncargado.php?mode=edit&section=addEditCurso&idCurso=" . $row['ID'] . "'><img height='30' width='30' src='./../img/editicon.jpg'></a></td><td><a href=# onclick=borrar('./../controllers/DeleteObj.php?section=cursos&id=".$row['ID']."')><img height='30' width='30' src='./../img/deleteicon.jpg'></a></td></tr>";
            }    
        }else{
            $cursos = $CursosController->getCursos();
            foreach ($cursos as $row) {
                echo "<td>" . $row['id'] . "</td><td>" . $row['materia'] . "</td><td>" . $row['profesor'] . "</td><td><a href='loginalumno.php?idCurso=" . $row['id'] . "'>Inscribirme</a></td>";
            }
        }
        

        ?>
    </tr>
</table>