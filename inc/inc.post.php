<?php
require_once('functions/classes/post.php');
require_once('functions/classes/comment.php');
require_once('functions/classes/user.php');
require_once('functions/classes/sesion.php');

$post = new Post();
if(!isset($_GET['id']) || $post->setId($_GET['id']) ==false){
  header('Location: index.php');
  return false;
}
//Publicar comentario
$cmstatus = -1; //Esta variable indica el estado de la publicacion del comentario
// 1: Publicado, 0:Error, 2:Eliminado, -1: nada
//Cuando se elimina un comentario tambien se coloca un mensaje.
if(isset($_GET['status'])){
  if($_GET['status'] == "deleted"){
    $cmstatus = 2;
  }
  if($_GET['status'] == "no"){
    $cmstatus = 0;
  }
  // Comentario publicado
}
if(isset($_POST['comment']) && Sesion::isLogged()){
  $comment = new Comment();
  $comment->setUserId(Sesion::getId());
  $comment->setPostId($_GET['id']);
  $comment->setCreatedAt(date("Y-m-d H:i:s"));
  $comment->setComment($_POST['comment']);
  if($comment->dbInsert()){
    $cmstatus = 1;// Comentario publicado
  }
  else{
    $cmstatus = 0;//Error
  }
}
?>
<section>
  <header class="main">
    <h1><?php echo $post->getTitle(); ?></h1>
  </header>
  <p><?php echo $post->getDescription(); ?></p>
</section>
<?php
if(Sesion::isLogged()){
  switch ($cmstatus) {
    case 0:
    ?>
    <p style="color:red">Ocurrió un error, vuelva a intentarlo mas tarde.</p>
    <?php
    break;
    case 1:
    ?>
    <p style="color:green">Comentario publicado.</p>
    <?php
    break;
    case 2:
    ?>
    <p style="color:green">Comentario eliminado.</p>
    <?php
    break;
    default:
    break;
  }
  ?>
  <h4>Escribir un comentario:</h4>
  <form action="" method="post">
    <div class="row uniform">
      <div class="12u$">
        <textarea required name="comment" placeholder="Comentario" rows="6"></textarea>
      </div>
      <div class="12u$">
        <ul class="actions">
          <li><input type="submit" value="Enviar comentario" class="special" /></li>
          <li><input type="reset" value="Borrar comentario" /></li>
        </ul>
      </div>
    </div>
  </form>
  <?php
}
else{
  ?>
  <p><i><b>Debes <a href="login.php">iniciar sesión</a> para comentar en los posts.</b></i></p>
  <?php
}
?>
<h2>Comentarios:</h2>

<?php
$comment_ids = Comment::getAllId($_GET['id']);
if(sizeof($comment_ids) >= 1){//Si hay comentarios en el post
  foreach ($comment_ids as $comment_id) {
    $comment = new Comment();
    $userc = new User();
    $comment->setId($comment_id);
    $userc->setId($comment->getUserId());
    ?>
    <hr/>
    <h3><?php echo $userc->getName()." ".$userc->getLastName(); ?>:</h3>
    <p><?php echo $comment->getComment(); ?></p>
    <?php
    if(Sesion::isLogged() && Sesion::getId() == $comment->getUserId()){
      ?>
      <p><small>ENVIADO EL: <b><?php echo $comment->getCreatedAt();?></b></small> - <a href="delete_com.php?id=<?php echo $comment_id; ?>" class="icon fa-times"> Eliminar</a></p>
      <?php
    }
    else{
      ?>
      <p><small>ENVIADO EL: <b><?php echo $comment->getCreatedAt();?></b></small></p>
      <?php
    }
  }
}else{//si no hay comentarios
  ?>
  <p><i>Aún no hay comentarios, ¡se el primero!</i></p>
  <?php
}
?>
<hr/>
