<?php
header("Content-Type: text/plain");
error_reporting(E_ALL);
ini_set('display_errors', 'on');
require_once('classes/post.php');

$post = new Post();
/*
//Agregar un post
$post->setTitle('titulito');
$post->setDescription('descripcion');
$post->setCreatedAt(date("Y-m-d H:i:s"));
$post->setUpdatedAt(date("Y-m-d H:i:s"));
$post->setAuthorId('2');
echo $post->dbInsert() ? "Post insertado".PHP_EOL:"Post no insertado".PHP_EOL;

//Obtener un post de id 1
$post->setId("1");
echo "Titulo: ".$post->getTitle().PHP_EOL;
echo "Descripcion: ".$post->getDescription().PHP_EOL;
echo "Creado en: ".$post->getCreatedAt().PHP_EOL;
echo "Actualizado en: ".$post->getUpdatedAt().PHP_EOL;
echo "Autor: ".$post->getAuthorId().PHP_EOL;

//Actualizar post
$post->setId("30");
$post->setTitle('titulito2');
$post->setDescription('descripcion2');
$post->setUpdatedAt(date("Y-m-d H:i:s"));
$post->setAuthorId('2');
echo $post->dbUpdate() ? "Post actualizado".PHP_EOL:"Post no actualizado".PHP_EOL;

//Eliminar post
echo $post->dbDelete() ? "Post eliminado".PHP_EOL:"Post no eliminado".PHP_EOL;
*/
?>
