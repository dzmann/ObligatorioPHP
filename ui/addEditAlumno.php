<body>

<?php


    $mode = "create";
    $alumnoController = new AlumnosController();

    $alumno = "";
    $fieldCedula = "";
    $fieldNombres = "";
    $fieldApellidos = "";
    $fieldDireccion = "";
    $fieldTelefono = "";
    $fieldPIN = "";
    $fieldFoto = "";
    $mensaje = "";

    if(isset($_POST["enviar"])){
        //to remove
        //$alumno = new Alumno($_POST["ci"], $_POST["nombres"], $_POST["apellidos"], $_POST["direccion"], $_POST["telefono"], $_POST["pin"], $_POST["foto"]);
       /* $alumno = new Alumno($_POST["ci"], $_POST["nombres"], $_POST["apellidos"], $_POST["direccion"], $_POST["telefono"], $_POST["pin"], "imagenhardcodeada.jpg");
        if($alumnoController->createAlumno($alumno)){
            $mensaje = "Alumno ingresado correctamente";
        }else{
            $mensaje = "Ocurrió un error al crear el alumno";
        }*/
    }else{
        $mode = $_GET["mode"];
    }

    if($mode=="edit"){

        $alumno = $alumnoController->getAlumno($_GET["idAlumno"]);
        $fieldCedula = $alumno->__get("ci");
        $fieldNombres = $alumno->__get("nombre");
        $fieldApellidos = $alumno->__get("apellidos");
        $fieldDireccion = $alumno->__get("direccion");
        $fieldTelefono = $alumno->__get("telefono");
        $fieldPIN = $alumno->__get("pin");
        $fieldFoto = $alumno->__get("foto");

    }

?>

    <table width="50%">
        <tr>
            <td>
            <form action="seccionEncargado.php?section=addEditAlumno" method="post" enctype="multipart/form-data">
             <fieldset>
                Cédula: <input type="number" name="ci" value=<?php echo $fieldCedula; ?>>
            </fieldset>
            <fieldset>
                Nombres: <input type="text" name="nombres" value=<?php echo $fieldNombres; ?>>
            </fieldset>   
            <fieldset>
                Apellidos: <input type="text" name="apellidos" value=<?php echo $fieldApellidos; ?>>
            </fieldset>   
            <fieldset>
                Dirección: <input type="text" name="direccion" value=<?php echo $fieldDireccion; ?>>
            </fieldset>   
            <fieldset>
                Teléfono: <input type="text" name="telefono" value=<?php echo $fieldTelefono; ?>>
            </fieldset>   
            <fieldset>
                PIN: <input type="password" name="pin" value=<?php echo $fieldPIN; ?>>
            </fieldset>   
            <fieldset>
                <?php

                    if($mode=="edit"){
                        echo "<img src=../img/".$fieldFoto." height='150' width='150'><br>";
                        echo "Subir nueva imagen: <input type='file' name='foto'>";
                    }else{
                        echo "Foto: <input type='file' name='foto'>";
                    }
                ?>
            </fieldset>   
            <fieldset>
                <input type="hidden" name="mode" value=<?php echo $mode; ?>>
                <input type="submit" name="enviar" value="Agregar">
            </fieldset>
            </form>

            </td>
        </tr>
    
    </table>
    <span><?php echo $mensaje; ?></span>

    

</body>

</html>