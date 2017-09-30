<?php
session_start();
require_once(dirname(__FILE__).'/../classes/post.php');
require_once(dirname(__FILE__).'/../classes/sesion.php');
$redirect = substr(dirname(__FILE__),strlen($_SERVER["DOCUMENT_ROOT"]));
if(Sesion::isLogged() && isset($_GET['id'])){
  $author_id = Sesion::getId();
  $post_id = $_GET['id'];
  $post = new Post();
  $post->setId($post_id);
  if($post->getAuthorId() == $author_id){
    if($post->dbDelete()){
      $redirect .= "/../admin/lista_post.php?status=deleted";
    }
    else{
      $redirect .= "/../admin/lista_post.php?status=no";
    }
  }
  else{
    $redirect .= "/../admin/lista_post.php?status=no";
  }
}
else{
  $redirect .= "/../admin/index.php";
}
header("Location: $redirect");
return false;
?>
