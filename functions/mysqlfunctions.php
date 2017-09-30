<?php
/**
* @return mysqli|void
*/

function getConnection(){
  $dbinfo = include('dbinfo.php');
  $link = new mysqli($dbinfo['host'], $dbinfo['user'], $dbinfo['pass'], $dbinfo['db']);
  $link->set_charset("utf8");
  return (!$link) ? die('Error de conexión: ' . mysqli_connect_error()) : $link;
}
?>
