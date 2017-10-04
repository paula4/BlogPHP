<?php
session_start();
require_once('functions/classes/user.php');
require_once('functions/classes/comment.php');
require_once('functions/classes/sesion.php');
$comment_id = 0;
if(isset($_GET['id'])){
  $comment_id = $_GET['id'];
  $comment = new Comment();
  $comment->setId($comment_id);
}
else{
  $redirect = "index.php";
}
if(Sesion::isLogged() && $comment_id != 0){
  $user_id = Sesion::getId();
  if($comment->getUserId() == $user_id){
    if($comment->dbDelete()){
      $redirect .= "post.php?id=".$comment->getPostId()."&status=deleted";
    }
    else{
      $redirect .= "post.php?id=".$comment->getPostId()."&status=no";
    }
  }
  else{
    $redirect .= "post.php?id=".$comment->getPostId()."&status=no";
  }
}
else{
  $redirect .= "post.php?id=".$comment->getPostId();
}
header("Location: $redirect");
return false;
?>
