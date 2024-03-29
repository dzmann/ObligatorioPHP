<body>

<?php
    $submitValue="Enviar";
    $mode = "create";
    $encargadosController = new EncargadosController();

    $fieldCi="";
    $fieldNombre = "";
    $fieldApellido = "";
    $fieldDireccion = "";
    $fieldTelefono = "";
    $fieldEmail="";
    $mensaje = "";

    if(isset($_POST["enviar"])){

        if($_POST["mode"]=="create"){
            $encargado = new Encargado($_POST["email"], $_POST["nombre"], base64_encode($_POST["contrasenia"]));

            if($encargadosController->createEncargado($encargado)){
                header('Location: ../controllers/SuccessRegistration.php?type=encargados&operation=create');
            }else{
                $mensaje = "<span style='color:red'>Ocurrió un error al crear el Encargado</span>";
            }
        }else{
            $encargado = new Encargado($_POST["email"], $_POST["nombre"], base64_encode($_POST["contrasenia"]));

            if($encargadosController->updateEncargado($encargado)){
                header('Location: ../controllers/SuccessRegistration.php?type=encargados&operation=update');
            }else{
                $mensaje = "<span style='color:red'>Ocurrió un error actualizando los datos</span>";
            }
        }

    }else{
        $mode = $_GET["mode"];
    }
    
    if($mode=="edit"){

        $submitValue="Actualizar";
        $encargado = $encargadosController->getEncargado($_GET["idEncargado"]);
        $fieldEmail = $encargado->email;
        $fieldNombre = $encargado->nombre;
        $fieldContrasenia = base64_decode($encargado->contrasenia);
    }
?>

    <table width="50%">
        <tr>
            <td>
                <form action="seccionEncargado.php?section=addEditEncargado" method="post">
                    <fieldset>
                        Email: <input type="mail" required name="email" value=<?php echo $fieldEmail; ?>>
                    </fieldset>
                    <fieldset>
                        Nombre: <input type="text" required name="nombre" value='<?php echo $fieldNombre; ?>'>
                    </fieldset>
                    <fieldset>
                        Contraseña: <input type="password" required name="contrasenia" value='<?php echo $fieldContrasenia; ?>'>
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