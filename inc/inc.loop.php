<section>
  <header class="major">
    <h2>Últimos Posts</h2>
  </header>
  <div class="posts">
    <?php

    require_once('functions/classes/post.php');
    require_once('functions/classes/user.php');
    foreach (Post::getAllId() as $post_id) {
      $post = new Post();
      $user = new User();
      $post->setId($post_id);
      $user->setId($post->getAuthorId());
      ?>
      <article>
        <h2><?php echo $post->getTitle(); ?></h2>
        <p><?php echo $post->getDescription(); ?></p>
        <ul class="actions">
          <li><a href="post.php?id=<?php echo $post_id; ?>" class="button">Leer Mas</a></li>
        </ul>
        <h5>Creado por: </h5>
        <img class="vertical-mid rounded" src="assets/img/avatar.png" width="40px" height="40px" alt="<?php echo $user->getName()." ".$user->getLastName(); ?>"> <a class="vertical-mid" href="#"><?php echo $user->getName()." ".$user->getLastName(); ?> </a>
      </article>
      <?php
    }
    ?>
  </div>
</section>
