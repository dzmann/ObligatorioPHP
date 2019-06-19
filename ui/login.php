<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="../controllers/login.php" method="post">
        <fieldset>
            Email<input type="text" name="email" id="email"><br>
            Contraseña<input type="password" name="contrasenia" id="contrasenia"><br>
            <input type="hidden" name="rol" value="encargado">
            <input type="submit" value="Entrar" name="entrar">
        </fieldset>
     </form>
    <?php
        if(isset($_GET["result"])){
            if($_GET["result"]=="error"){
                echo "<span>Email o contraseña incorrectos.</span>";
            }
        }
    ?>
    
</body>
</html>