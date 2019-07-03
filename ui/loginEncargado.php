<form action="../controllers/loginEncargadoController.php" method="post">
    <fieldset>
        Email<input type="text" name="email" id="email"><br>
        Contraseña<input type="password" name="contrasenia" id="contrasenia"><br>
        <input type="submit" value="Entrar" name="entrar">
    </fieldset>

    <?php
    

    if(isset($_GET["login"])){
        $error = $_GET["login"];

        if($error == "error"){
            echo "<span>Usuario o contraseña inválidos</span>";
        }else if($error == "success"){
            echo "<span>Login correcto.</span>";
        }else if($error == "expired"){
            echo "<span>Su sesión ha expirado, ingrese nuevamente.</span>";;
        }
    }

    ?>
</form>