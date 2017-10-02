<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../assets/img/avatar.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $user->getName()." ".$user->getLastName(); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> En linea</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      <li><a href="../index.php"><i class="fa fa-circle-o text-aqua"></i> <span>Ir la pagina principal</span></a></li>
      <li><a href="../logout.php"><i class="fa fa-times text-red"></i> <span>Cerrar sesión</span></a></li>
      <li><a href="index.php"><i class="fa fa-circle-o text-yellow"></i> <span>Panel de usuario</span></a></li>
      <li class="header">POSTS</li>
      <li><a href="lista_post.php"><i class="fa fa-file"></i> <span>Mis Posts</span></a></li>
      <li><a href="agregar_post.php"><i class="fa fa-plus-circle"></i> <span>Agregar Post</span></a></li>
      <li class="header">COMENTARIOS</li>
      <li><a href="#"><i class="fa fa-comments"></i> <span>Ultimos comentarios</span></a></li>
      <li><a href="#"><i class="fa fa-comment"></i> <span>Mis comentarios</span></a></li>
    </ul>
  </section>
</aside>
