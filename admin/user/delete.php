<?php
session_start();
require_once(dirname(__FILE__).'/../../functions/classes/user.php');
require_once(dirname(__FILE__).'/../../functions/classes/sesion.php');
$redirect = substr(dirname(__FILE__),strlen($_SERVER["DOCUMENT_ROOT"]));
if(Sesion::isLogged() && isset($_POST['ok'])){
  $user_id = Sesion::getId();
  $user = new User();
  $user->setId($user_id);
  if($user->dbDelete()){
    $redirect .= "/../../index.php";
  }
  else{
    $redirect .= "/../mi_cuenta.php?status=no";
  }
}
else{
  $redirect .= "/../index.php";
}
Sesion::Logout();
header("Location: $redirect");
return false;
?>
