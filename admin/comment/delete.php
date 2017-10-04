<?php
session_start();
require_once(dirname(__FILE__).'/../../functions/classes/comment.php');
require_once(dirname(__FILE__).'/../../functions/classes/sesion.php');
$redirect = substr(dirname(__FILE__),strlen($_SERVER["DOCUMENT_ROOT"]));
if(Sesion::isLogged() && isset($_GET['id'])){
  $user_id = Sesion::getId();
  $comment_id = $_GET['id'];
  $comment = new Comment();
  $comment->setId($comment_id);
  if($comment->getUserId() == $user_id){
    if($comment->dbDelete()){
      $redirect .= "/../mis_comentarios.php?status=deleted";
    }
    else{
      $redirect .= "/../mis_comentarios.php?status=no";
    }
  }
  else{
    $redirect .= "/../mis_comentarios.php?status=no";
  }
}
else{
  $redirect .= "/../index.php";
}
header("Location: $redirect");
return false;
?>
