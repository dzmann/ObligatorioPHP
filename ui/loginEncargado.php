<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login de alumno</title>
    <link rel="stylesheet" href="./../style.css">
</head>

<body>
    <div class="main">

        <form class="container login admin" action="../controllers/loginEncargadoController.php" method="post">
            <div class="inputs"> Email<input type="text" name="email" id="email"></div>
            <div class="inputs"> Contraseña<input type="password" name="contrasenia" id="contrasenia"></div>
            <input type="submit" value="Entrar" name="entrar">
            <?php

            if (isset($_GET["login"])) {
                $error = $_GET["login"];

                if ($error == "error") {
                    echo "<span>Usuario o contraseña inválidos</span>";
                } else if ($error == "success") {
                    echo "<span>Login correcto.</span>";
                } else if ($error == "expired") {
                    echo "<span>Su sesión ha expirado, ingrese nuevamente.</span>";;
                }
            }

            ?>
        </form>
    </div>
</body>

</html>