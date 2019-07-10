<?php

$operation = $_GET["operation"];
$type = $_GET["type"];

if($operation=="create"){
    echo "<span><h3>$type creado correctamente.</h3></span>";
}else{
    echo "<span><h3>$type actualizado correctamente.</h3></span>";
}

switch($type){
    case "Alumno":
        echo "<a href='../ui/seccionEncargado.php?section=alumnos'><button>Volver</button></a>";
        break;
    case "Encargado":
        echo "<a href='../ui/seccionEncargado.php?section=encargados'><button>Volver</button></a>";
        break; 
    case "Profesor":
        echo "<a href='../ui/seccionEncargado.php?section=profesor'><button> Volver</button></a>";
        break;  
    case "Materia":
        echo "<a href='../ui/seccionEncargado.php?section=materias'><button>Volver </button></a>";
        break;
    case "Curso":
        echo "<a href='../ui/seccionEncargado.php?section=curso'><button> Volver</button></a>";
    break;          
}


?>