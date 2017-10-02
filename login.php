<?php
require_once('functions/classes/sesion.php');
if(isset($_POST['email']) && isset($_POST['password']) && Sesion::Login($_POST['email'],$_POST['password'])){
  header('Location: admin/index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin/assets/plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" >
  <div class="login-box">
    <div class="login-logo">
      <a href="index.php">Blog<b>PHP</b></a>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">Inicia sesión para ingresar al panel</p>

      <form action="" method="post">
        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="Correo Electrónico">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Contraseña">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-6">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox"> Recordarme
              </label>
            </div>
          </div>
          <div class="col-xs-6">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
          </div>
        </div>
      </form>
      <a href="register.php" class="text-center">Registrarse</a>
    </div>
  </div>
  <!-- jQuery 3 -->
  <script src="admin/assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="admin/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="admin/assets/plugins/iCheck/icheck.min.js"></script>
  <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  </script>
</body>
</html>
