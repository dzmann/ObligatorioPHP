<?php

$operation = $_GET["operation"];
$type = $_GET["type"];

if($operation=="create"){
    echo "<span><h3>Registro completado satisfactoriamente.</h3></span>";
}else{
    echo "<span><h3>Se actualizaron los datos correctamente.</h3></span>";
}

echo "<a href='../ui/seccionEncargado.php?section=$type'><button>Volver</button></a>";

?>