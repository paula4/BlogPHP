<form action="" method="post">
  <input type="email" name="email" placeholder="Correo electrónico"></br>
  <input type="password" name="password" placeholder="Contraseña"></br>
  <input type="submit" name="submit" value="Ingresar">
</form>
<?php
require_once(dirname(__FILE__).'/../classes/sesion.php');


error_reporting(E_ALL);
ini_set('display_errors', 'on');
if(isset($_POST['submit'])){
  if(Sesion::Login($_POST['email'],$_POST['password'])){
    echo "OK".PHP_EOL;
  }
  else{
    echo "NO".PHP_EOL;
  }
}
echo Sesion::isLogged() ? Sesion::getId(): "no logueado";
//Sesion::Logout();
echo Sesion::isLogged() ? Sesion::getId(): "no logueado";

?>