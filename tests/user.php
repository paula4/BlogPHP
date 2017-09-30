<?php
header("Content-Type: text/plain");
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once(dirname(__FILE__).'/../classes/user.php');

$user = new User();

//Agregar un user
$user->setName('Pablito');
$user->setLastName('Perez');
$user->setEmail('asdasd2@asdasd.com');
$user->setPass('chau');
$user->setPhone('32165497');
$user->setIsActive('1');
echo $user->dbInsert() ? "Usuario insertado".PHP_EOL:"Usuario no insertado".PHP_EOL;
/*
//Obtener un user de id 1
$user->setId("1");
echo "Nombre: ".$user->getName().PHP_EOL;
echo "Apellido: ".$user->getLastName().PHP_EOL;
echo "Email: ".$user->getEmail().PHP_EOL;
echo "Contraseña: ".$user->getPass().PHP_EOL;
echo "Telefono: ".$user->getPhone().PHP_EOL;
echo $user->getIsActive() == 1 ? "Usuario activo".PHP_EOL:"Usuario no activo".PHP_EOL;

//Actualizar user
$user->setId("1");
$user->setName('Pablo');
$user->setLastName('Androetto');
$user->setEmail('asdasdasdasd@asdasd.com');
$user->setPass('chau');
$user->setPhone('654987321');
$user->setIsActive('0');
echo $user->dbUpdate() ? "Usuario actualizado".PHP_EOL:"Usuario no actualizado".PHP_EOL;

//Eliminar user
$user->setId("1");
echo $user->dbDelete() ? "Usuario eliminado".PHP_EOL:"Usuario no eliminado".PHP_EOL;
*/
?>
