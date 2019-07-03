<?php
require_once("../controllers/SessionManager.php");

$session = new SessionManager();
$session->checkSession("email@email.com");





?>