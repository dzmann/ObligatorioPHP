<body>

<?php
    $submitValue="Enviar";
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

        if($_POST["mode"]=="create"){
            //Se accede de manera estática al método y envío el nombre del campo del formulario como parámetro.
            $isImageUploaded = FileUploader::uploadImage("foto");

            //Se crea una instancia del alumno con los datos del formulario para luego persistirlo usando el controlador.
            $alumno = new Alumno($_POST["ci"], $_POST["nombres"], $_POST["apellidos"], $_POST["direccion"], $_POST["telefono"], $_FILES["foto"]["name"], $_POST["pin"]);

            if($alumnoController->createAlumno($alumno) && $isImageUploaded){
                $mensaje = "<span style='color:green'>Alumno ingresado correctamente</span>";
            }else{
                $mensaje = "<span style='color:red'>Ocurrió un error al crear el alumno</span>";
            }
        }else{
            //Se crea una instancia del alumno con los datos del formulario para luego persistirlo usando el controlador.

            if(FileUploader::uploadImage("foto")){
                $alumno = new Alumno($_POST["ci"], $_POST["nombres"], $_POST["apellidos"], $_POST["direccion"], $_POST["telefono"], $_FILES["foto"]["name"], $_POST["pin"]);
            }else{
                $alumno = new Alumno($_POST["ci"], $_POST["nombres"], $_POST["apellidos"], $_POST["direccion"], $_POST["telefono"], $_POST["hiddenFoto"], $_POST["pin"]);
            }
            
            if($alumnoController->updateAlumno($alumno)){
                $mensaje = "<span style='color:green'>Datos actualizados</span>";
            }else{
                $mensaje = "<span style='color:red'>Ocurrió un erro actualizando los datos</span>";
            }
            
            
        }

        
    }else{
        $mode = $_GET["mode"];
    }

    if($mode=="edit"){

        $submitValue="Actualizar";
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
                Cédula: <input type="number" required name="ci" value=<?php echo $fieldCedula; ?>>
            </fieldset>
            <fieldset>
                Nombres: <input type="text" required name="nombres" value=<?php echo $fieldNombres; ?>>
            </fieldset>   
            <fieldset>
                Apellidos: <input type="text" required name="apellidos" value=<?php echo $fieldApellidos; ?>>
            </fieldset>   
            <fieldset>
                Dirección: <input type="text" required name="direccion" value=<?php echo $fieldDireccion; ?>>
            </fieldset>   
            <fieldset>
                Teléfono: <input type="text" required name="telefono" value=<?php echo $fieldTelefono; ?>>
            </fieldset>   
            <fieldset>
                PIN: <input type="password" required name="pin" value=<?php echo $fieldPIN; ?>>
            </fieldset>   
            <fieldset>
                <?php
                    if($mode=="edit"){
                        echo "<img src=../img/".$fieldFoto." height='150' width='150'/><br>";
                        echo "<input type='hidden' name='hiddenFoto' value=$fieldFoto >";
                        echo "Subir nueva imagen: <input  type='file'  name='foto' value=$fieldFoto >";
                    }else{
                        echo "Foto: <input required type='file' name='foto'/>";
                    }
                ?>
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