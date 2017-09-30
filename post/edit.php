<?php
session_start();
require_once(dirname(__FILE__).'/../classes/post.php');
require_once(dirname(__FILE__).'/../classes/sesion.php');
$redirect = substr(dirname(__FILE__),strlen($_SERVER["DOCUMENT_ROOT"]));
if(Sesion::isLogged() && isset($_GET['id']) && isset($_POST['title']) && isset($_POST['description'])){
  $author_id = Sesion::getId();
  $post_id = $_GET['id'];
  $post = new Post();
  $post->setId($post_id);
  if($post->getAuthorId() == $author_id){
    $post->setTitle($_POST['title']);
    $post->setDescription($_POST['description']);
    $post->setUpdatedAt(date("Y-m-d H:i:s"));
    if($post->dbUpdate()){
      $redirect .= "/../admin/editar_post.php?id=$post_id&status=ok";
    }
    else{
      $redirect .= "/../admin/editar_post.php?id=$post_id&status=no";
    }
  }
  else{
    $redirect .= "/../admin/index.php";
  }
}
else{
  $redirect .= "/../admin/index.php";
}
header("Location: $redirect");
return false;
?>
