<?php

require_once("../controllers/SessionManager.php");

$session = new SessionManager();
$session->destroySession();
header( 'Location: ../ui/loginEncargado.php' );

?>