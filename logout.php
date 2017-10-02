<?php
require_once('functions/classes/sesion.php');
Sesion::Logout();
header('Location: index.php');
?>
