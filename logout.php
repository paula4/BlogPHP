<?php
require_once('classes/sesion.php');
Sesion::Logout();
header('Location: index.php');
?>
