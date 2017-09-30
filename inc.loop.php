<section>
  <header class="major">
    <h2>Últimos Posts</h2>
  </header>
  <div class="posts">
    <?php
    require_once('classes/post.php');
    foreach (Post::getAllId() as $post_id) {
      $post = new Post();
      $post->setId($post_id);
      ?>
      <article>
        <h3><?php echo $post->getTitle(); ?></h3>
        <p><?php echo $post->getDescription(); ?></p>
        <ul class="actions">
          <li><a href="post.php?id=<?php echo $post_id; ?>" class="button">Leer Mas</a></li>
        </ul>
      </article>
      <?php
    }
    ?>
  </div>
</section>
