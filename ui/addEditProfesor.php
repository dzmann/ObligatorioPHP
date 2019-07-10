<body>

<?php
    $submitValue="Enviar";
    $mode = "create";
    $profesoresController = new ProfesoresController();

    $fieldCi="";
    $fieldNombre = "";
    $fieldApellido = "";
    $fieldDireccion = "";
    $fieldTelefono = "";
    $mensaje = "";

    if(isset($_POST["enviar"])){

        if($_POST["mode"]=="create"){
            
            $profesor = new Profesor($_POST["cedula"], $_POST["nombre"], $_POST["apellido"], $_POST["direccion"], $_POST["telefono"]);

            if($profesoresController->createProfesor($profesor)){
                header('Location: ../controllers/SuccessRegistration.php?type=profesores&operation=create');
            }else{
                $mensaje = "<span style='color:red'>Ocurrió un error al crear el Profesor</span>";
            }
        }else{
            $profesor = new Profesor($_POST["cedula"], $_POST["nombre"], $_POST["apellido"], $_POST["direccion"], $_POST["telefono"]);
            
            if($profesoresController->updateProfesor($profesor)){
                header('Location: ../controllers/SuccessRegistration.php?type=profesores&operation=update');
            }else{
                $mensaje = "<span style='color:red'>Ocurrió un error actualizando los datos</span>";
            }
        }

    }else{
        $mode = $_GET["mode"];
    }
    
    if($mode=="edit"){

        $submitValue="Actualizar";
        $profesor = $profesoresController->getProfesor($_GET["idProfesor"]);
        $fieldCi = $profesor->ci;
        $fieldNombre = $profesor->nombre;
        $fieldApellido = $profesor->apellido;
        $fieldDireccion = $profesor->direccion;
        $fieldTelefono =  $profesor->telefono;

    }

?>

    <table width="50%">
        <tr>
            <td>
                <form action="seccionEncargado.php?section=addEditProfesor" method="post">
                    <fieldset>
                        Cédula: <input type="number" required name="cedula" value=<?php echo $fieldCi; ?>>
                    </fieldset>
                    <fieldset>
                        Nombre: <input type="text" required name="nombre" value='<?php echo $fieldNombre; ?>'>
                    </fieldset>
                    <fieldset>
                        Apellido: <input type="text" required name="apellido" value='<?php echo $fieldApellido; ?>'>
                    </fieldset>   
                    <fieldset>
                        Dirección: <input type="text" required name="direccion" value='<?php echo $fieldDireccion; ?>'>
                    </fieldset>   
                    <fieldset>
                        Teléfono: <input type="number" required name="telefono" value=<?php echo $fieldTelefono; ?>>
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