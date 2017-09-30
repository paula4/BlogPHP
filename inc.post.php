<?php
require_once('classes/post.php');
$post = new Post();
if(!isset($_GET['id']) || $post->setId($_GET['id']) ==false){
  header('Location: index.php');
  return false;
}
?>
<section>
  <header class="main">
    <h1><?php echo $post->getTitle(); ?></h1>
  </header>
  <p><?php echo $post->getDescription(); ?></p>
</section>
