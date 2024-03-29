<body>

<?php
    $submitValue="Enviar";
    $mode = "create";
    $materiasController = new MateriasController();

    $fieldNombre = "";
    $fieldContenidos = "";
    $fieldNivel = "";
    $fieldCargaHoraria = "";
    $mensaje = "";

    if(isset($_POST["enviar"])){

        if($_POST["mode"]=="create"){
            //Se crea una instancia de la materia con los datos del formulario para luego persistirlo usando el controlador.
            $materia = new Materia($_POST["nombre"], $_POST["contenidos"], $_POST["nivel"], $_POST["carga_horaria"]);

            if($materiasController->createMateria($materia)){
                header('Location: ../controllers/SuccessRegistration.php?type=materias&operation=create');
            }else{
                $mensaje = "<span style='color:red'>Ocurrió un error al crear el alumno</span>";
            }
        }else{
            //Se crea una instancia de la materia con los datos del formulario para luego persistirlo usando el controlador.

            $materia = new Materia($_POST["nombre"], $_POST["contenidos"], $_POST["nivel"], $_POST["carga_horaria"]);
            
            if($materiasController->updateMateria($materia)){
                header('Location: ../controllers/SuccessRegistration.php?type=materias&operation=update');
            }else{
                $mensaje = "<span style='color:red'>Ocurrió un error actualizando los datos</span>";
            }
        }

    }else{
        $mode = $_GET["mode"];
    }

    if($mode=="edit"){

        $submitValue="Actualizar";
        $materia = $materiasController->getMateria($_GET["idMateria"]);
        $fieldNombre = $materia->nombre;
        $fieldContenidos = $materia->contenidos;
        $fieldNivel = $materia->nivel;
        $fieldCargaHoraria =  $materia->cargaHoraria;

    }

?>

    <table width="50%">
        <tr>
            <td>
            <form action="seccionEncargado.php?section=addEditMateria" method="post">
             <fieldset>
                Nombre: <input type="text" required name="nombre" value='<?php echo $fieldNombre; ?>'>
            </fieldset>
            <fieldset>
                Contenidos:
                <textarea name="contenidos" id="contenidos" cols="30" rows="10"><?php echo $fieldContenidos; ?></textarea>
            </fieldset>   
            <fieldset>
            Nivel:<select name="nivel" id="nivel">
                    <?php
                        $arrayNiveles = unserialize(NIVELES);
                        foreach($arrayNiveles as $nivel){
                            if($nivel == $fieldNivel){
                                echo "<option value='$nivel' selected>$nivel</option>";
                            }else{
                                echo "<option value='$nivel'>$nivel</option>";
                            }
                        }
                    ?>
                </select>
            </fieldset>   
            <fieldset>
                Carga horaria: <input type="number" required name="carga_horaria" value=<?php echo $fieldCargaHoraria; ?>>
            </fieldset>
            <fieldset>
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