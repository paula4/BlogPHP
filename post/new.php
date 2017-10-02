<?php
session_start();
require_once(dirname(__FILE__).'/../functions/classes/post.php');
require_once(dirname(__FILE__).'/../functions/classes/sesion.php');
$redirect = substr(dirname(__FILE__),strlen($_SERVER["DOCUMENT_ROOT"]));
if(Sesion::isLogged() && isset($_POST['title']) && isset($_POST['description'])){
  $author_id = Sesion::getId();
  $post = new Post();
  $post->setTitle($_POST['title']);
  $post->setDescription($_POST['description']);
  $post->setCreatedAt(date("Y-m-d H:i:s"));
  $post->setUpdatedAt(date("Y-m-d H:i:s"));
  $post->setAuthorId($author_id);
  if($post->dbInsert()){
    $redirect .= "/../admin/agregar_post.php?status=created";
  }
  else{
    $redirect .= "/../admin/agregar_post.php?status=no";
  }
}
else{
  $redirect .= "/../admin/index.php";
}
header("Location: $redirect");
return false;
?>
