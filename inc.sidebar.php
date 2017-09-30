<div id="sidebar">
  <div class="inner">
    <!-- Menu -->
    <nav id="menu" align="center">
      <header class="major">
        <h2>Menu</h2>

      </header>
      <?php
        require_once('classes/sesion.php');

        if(Sesion::isLogged()){

          require_once('classes/user.php');
          $user = new User();
          $user->setId(Sesion::getId());
          ?>

          <img src="assets/img/avatar.png" width="40px" height="40px" alt="<?php echo $user->getName()." ".$user->getLastName(); ?>">
          <h3>¡Hola <?php echo $user->getName();?>!</h3>
          <?php
        }
      ?>
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="generic.html">Mi Perfil</a></li>
        <li><a href="elements.html">Iniciar Sesion</a></li>
      </ul>
    </nav>
  </div>
</div>
