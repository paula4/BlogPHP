
<?php
require_once('classes/sesion.php');


error_reporting(E_ALL);
ini_set('display_errors', 'on');
if(isset($_POST['submit'])){
  if(Sesion::Login($_POST['email'],$_POST['password'])){
    header('Location: index.php');
  }
  else{
    echo "Datos incorrectos".PHP_EOL;
  }
}

?>
<form action="" method="post">
  <input type="email" name="email" placeholder="Correo electrónico"></br>
  <input type="password" name="password" placeholder="Contraseña"></br>
  <input type="submit" name="submit" value="Ingresar">
</form>
