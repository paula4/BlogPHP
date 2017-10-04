<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <?php include('inc/inc.head.php');
  require_once('../functions/classes/user.php');
  $user = new User();
  $user->setId(Sesion::getId());
  ?>
</head>
<body class="hold-transition skin-red-light sidebar-mini">
  <div class="wrapper">
    <?php include('inc/inc.header.php'); ?>
    <?php include('inc/inc.sidebar.php') ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Mi cuenta
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-6">
            <form action="user/edit.php" method="post">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Actualizar información de usuario</h3>
                </div>
                <div class="box-body">
                  <?php
                  if(isset($_GET['status'])){
                    if($_GET['status'] == "edited"){
                      ?>
                      <div class="callout callout-success">
                        <p>Su información se actualizó con exito.</p>
                      </div>
                      <?php
                    }elseif ($_GET['status'] == "no") {
                      ?>
                      <div class="callout callout-danger">
                        <p>Su información no se actualizó, revise los datos e intente nuevamente.</p>
                      </div>
                      <?php
                    }
                  }
                  ?>
                  <div class="form-group">
                    <label>Título</label>
                    <input required type="text" name="name" value="<?php echo $user->getName();?>" class="form-control" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <label>Apellido</label>
                    <input required type="text" name="lastname" value="<?php echo $user->getLastName();?>" class="form-control" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <label>Correo electrónico</label>
                    <input required type="email" name="email" value="<?php echo $user->getEmail();?>" class="form-control" placeholder="Correo electrónico">
                  </div>
                  <div class="form-group">
                    <label>Telefono</label>
                    <input required type="text" name="phone" value="<?php echo $user->getPhone();?>" class="form-control" placeholder="Teléfono">
                  </div>
                  <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" id="password" name="password" value="" class="form-control" placeholder="Contraseña">
                    <p><small><i>Dejar en blanco si no quiere cambiar.</i></small></p>
                  </div>
                  <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" id="password2" name="password2" value="" class="form-control" placeholder="Repetir contraseña">
                  </div>
                  <div class="checkbox">
                    <label>
                      <?php
                      if($user->getIsActive() == 1){
                        ?>
                        <input checked name="is_active" type="checkbox">
                        <?php
                      }
                      else {
                        ?>
                        <input name="is_active" type="checkbox">
                        <?php
                      }
                      ?>
                      Cuenta activa
                    </label>
                    <p><small><i>Si desactiva su cuenta, tus post y comentarios no seran visibles para nadie.</i></small></p>
                  </div>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-xs-6">
                      <button type="reset" class="btn">Reiniciar formulario</button>
                    </div>
                    <div align="right" class="col-xs-6">
                      <button type="submit" class="btn btn-primary">Actualizar Información</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Eliminar la cuenta</h3>
              </div>
              <form action="user/delete.php" method="post">
                <div class="box-body">
                  <p>Al eliminar la cuenta todos sus datos, incluidos información personal, posts y comentarios, seran eliminados permanentemente.</p>
                  <div class="checkbox">
                    <label>
                      <input required name="ok" type="checkbox"> Estoy seguro que quiero eliminar mi cuenta.
                    </label>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-danger">Eliminar cuenta</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include('inc/inc.footer.php') ?>
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- jQuery 3 -->
  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>
  <script>
  var password = document.getElementById("password")
  , confirm_password = document.getElementById("password2");
  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Las contraseñas no coinciden");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
  </script>
</body>
</html>
