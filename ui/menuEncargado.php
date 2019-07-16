<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="./../js/script.js"></script>
        <title>Menu de encargado</title>
        <link rel="stylesheet" href="./../style.css">
</head>

<body>
        <header>
                <ul>
                        <li><a href="seccionEncargado.php?section=cursos">ABM Cursos</a></li>
                        <li><a href="seccionEncargado.php?section=alumnos">ABM Alumnos</a></li>
                        <li><a href="seccionEncargado.php?section=profesores">ABM Profesores</a></li>
                        <li><a href="seccionEncargado.php?section=encargados">ABM Encargados</a></li>
                        <li><a href="seccionEncargado.php?section=materias">ABM Materias</a></li>
                </ul>
                <?php
                $isAdmin = true;
                echo "<span class='header-label'>Usuario logueado:</span> <span class='header-name'>" . $_SESSION["nombre"] . "</span>";
                echo "<a class='header-exit' onclick='cerrarSesion()' href=#>Salir</a>";
                ?>

        </header>
</body>
</html>