<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="./../js/script.js"></script>
        <title>Document</title>
</head>
<header>

      <ul>
        <li><a href="seccionEncargado.php?section=cursos">ABM Cursos</a></li>
        <li><a href="seccionEncargado.php?section=alumnos">ABM Alumnos</a></li>
        <li><a href="seccionEncargado.php?section=profesores">ABM Profesores</a></li>
        <li><a href="seccionEncargado.php?section=encargados">ABM Encargados</a></li>
        <li><a href="seccionEncargado.php?section=materias">ABM Materias</a></li>
      </ul>

<?php
        echo "Usuario logueado: <span style='position:relative; right:0'>".$_SESSION["userId"]."</span>";
        echo "<a onclick='cerrarSesion()' href=#>Salir</a>";
?>
</div>

</header>