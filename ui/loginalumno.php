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
        <form class="container login" action="../controllers/loginAlumnosController.php" method="post">
            <div class="inputs">
                Cédula<input type="text" name="email" id="email" required>
            </div>
            <div class="inputs">
                PIN<input type="password" name="contrasenia" id="contrasenia" required>
            </div>
            <input type="hidden" name="idCurso" value=<?php
                                                        $idCurso = $_GET['idCurso'];
                                                        echo $idCurso;
                                                        ?>>
            <input type="submit" value="Inscribirme" name="entrar">
        </form>
    </div>
</body>
</html>