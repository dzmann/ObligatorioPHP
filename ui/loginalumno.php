<form action="../controllers/loginAlumnosController.php" method="post">
    <fieldset>
        Cédula<input type="text" name="email" id="email" required><br>
        PIN<input type="password" name="contrasenia" id="contrasenia" required><br>
        <input type="hidden" name="idCurso" value=<?php
                                                    $idCurso = $_GET['idCurso'];
                                                    echo $idCurso;
                                                    ?>>
        <input type="submit" value="Inscribirme" name="entrar">
    </fieldset>
</form>

