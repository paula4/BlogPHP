<?php
header("Content-Type: text/plain");
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once(dirname(__FILE__).'/../classes/comment.php');
require_once(dirname(__FILE__).'/../classes/user.php');
require_once(dirname(__FILE__).'/../classes/post.php');

$comment = new Comment();
$user = new User();
$post = new Post();

/*
//Agregar un comentario
$comment->setUserId('2');
$comment->setPostId('22');
$comment->setComment('Hola mundo');
$comment->setCreatedAt(date("Y-m-d H:i:s"));
echo $comment->dbInsert() ? "Comentario insertado".PHP_EOL:"Comentario no insertado".PHP_EOL;

//Obtener un comentario de id 1
$comment->setId("7");
$user->setId($comment->getUserId());
$post->setId($comment->getPostId());
echo "Usuario: ".$user->getName()." ".$user->getLastName()." - id(".$comment->getUserId().")".PHP_EOL;
echo "Post: ".$post->getTitle()." - id(".$comment->getPostId().")".PHP_EOL;
echo "Comentario: ".$comment->getComment().PHP_EOL;
echo "Creado el: ".$comment->getCreatedAt().PHP_EOL;

//Actualizar comentario
$comment->setId("7");
$comment->setUserId('2');
$comment->setPostId('22');
$comment->setComment('Hola mundito');
$comment->setCreatedAt(date("Y-m-d H:i:s"));
echo $comment->dbUpdate() ? "Comentario actualizado".PHP_EOL:"Comentario no actualizado".PHP_EOL;

//Eliminar comment
$comment->setId("7");
echo $comment->dbDelete() ? "Comentario eliminado".PHP_EOL:"Comentario no eliminado".PHP_EOL;
*/
?>
