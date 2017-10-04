<?php
session_start();
require_once(dirname(__FILE__).'/../../functions/classes/user.php');
require_once(dirname(__FILE__).'/../../functions/classes/sesion.php');
$redirect = substr(dirname(__FILE__),strlen($_SERVER["DOCUMENT_ROOT"]));
if(Sesion::isLogged()){
  $user_id = Sesion::getId();
  $user = new User();
  $user->setId($user_id);
  if(isset($_POST['name'])     && !empty($_POST['name']))     $user->setName($_POST['name']);
  if(isset($_POST['lastname']) && !empty($_POST['lastname'])) $user->setLastName($_POST['lastname']);
  if(isset($_POST['email'])    && !empty($_POST['email']))    $user->setEmail($_POST['email']);
  if(isset($_POST['phone'])    && !empty($_POST['phone']))     $user->setPhone($_POST['phone']);
  if(isset($_POST['is_active'])) $user->setIsActive(1); else $user->setIsActive(0);  
  if(isset($_POST['password']) && isset($_POST['password2']) && !empty($_POST['password']) && $_POST['password'] == $_POST['password2']) $user->setPass($_POST['password']);
  if($user->dbUpdate()){
    $redirect .= "/../mi_cuenta.php?status=edited";
  }
  else{
    $redirect .= "/../mi_cuenta.php?status=no";
  }
}
else{
  $redirect .= "/../index.php";
}
header("Location: $redirect");
return false;
?>
