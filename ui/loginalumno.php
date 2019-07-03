<form action="../controllers/loginAlumnosController.php" method="post">
    <fieldset>
        PIN<input type="text" name="email" id="email"><br>
        Contraseña<input type="password" name="contrasenia" id="contrasenia"><br>
        <input type="hidden" name="idCurso" value=<?php
                                                    $idCurso = $_GET['idCurso'];
                                                    echo $idCurso;
                                                    ?>>
        <input type="submit" value="Inscribirme" name="entrar">
    </fieldset>
</form>