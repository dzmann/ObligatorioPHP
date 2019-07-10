<body>

<?php
    $submitValue="Enviar";
    $mode = "create";
    $cursosController = new CursosController();
    $materiasController = new MateriasController();
    $profesoresController = new ProfesoresController();

    $arrayMaterias = $materiasController->getMaterias();
    $arrayProfesores = $profesoresController->getProfesores();

    $fieldId = "";
    $fieldMateria = "";
    $fieldProfesor = "";
    $mensaje = "";

    if(isset($_POST["enviar"])){

        if($_POST["mode"]=="create"){
            
            $curso = new Curso(null, $_POST["materia"], $_POST["profesor"]);

            if($cursosController->createCurso($curso)){
                $mensaje = "<span style='color:green'>Curso ingresado correctamente</span>";
            }else{
                $mensaje = "<span style='color:red'>Ocurrió un error al crear el curso</span>";
            }
        }else{
            $curso = new Curso($_POST["id"], $_POST["materia"], $_POST["profesor"]);
            
            if($cursosController->updateCurso($curso)){
                header('Location: ../controllers/SuccessRegistration.php?type=Curso&operation=update');
            }else{
                $mensaje = "<span style='color:red'>Ocurrió un error actualizando los datos</span>";
            }
        }

    }else{
        $mode = $_GET["mode"];
    }

    if($mode=="edit"){

        $submitValue="Actualizar";
        $curso = $cursosController->getCurso($_GET["idCurso"]);
        $fieldId = $curso->id;
        $fieldMateria = $curso->idMateria;
        $fieldProfesor = $curso->idProfesor;
    }

?>

    <table width="50%">
        <tr>
            <td>
            <form action="seccionEncargado.php?section=addEditCurso" method="post">
    
            <fieldset>
            Materia:<select name="materia" id="materia">
                    <?php
                        foreach($arrayMaterias as $materia){
                            if($materia["nombre"] == $fieldMateria){
                                echo "<option value='".$materia["nombre"]."' selected>".$materia["nombre"]."</option>";
                            }else{
                                echo "<option value='".$materia["nombre"]."'>".$materia["nombre"]."</option>";
                            }
                        }
                    ?>
                </select>
            </fieldset>   
            <fieldset>
            Profesor:<select name="profesor" id="profesor">
                    <?php
                        foreach($arrayProfesores as $profesor){
                            if($profesor["ci"] == $fieldProfesor){
                                echo "<option value='".$profesor["ci"]."' selected>CI: ".$profesor["ci"]." - ".$profesor["nombre"]." ".$profesor["apellido"]."</option>";
                            }else{
                                echo "<option value='".$profesor["ci"]."'>CI: ".$profesor["ci"]." - ".$profesor["nombre"]." ".$profesor["apellido"]."</option>";
                            }
                        }
                    ?>
                </select>
            </fieldset> 
            <fieldset>
                <input type="hidden" name="id" value=<?php echo $fieldId; ?>>
                <input type="hidden" name="mode" value=<?php echo $mode; ?>>
                <input type="submit" name="enviar" value=<?php echo $submitValue; ?>>
            </fieldset>
            </form>
            </td>
        </tr>
    
    </table>
    
   <?php echo $mensaje; ?>

    

</body>

</html>