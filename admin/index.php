<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <?php

  include('inc.head.php');

  ?>
</head>
<body class="hold-transition skin-red-light sidebar-mini">
  <div class="wrapper">
    <?php include('inc.header.php'); ?>
    <?php include('inc.sidebar.php') ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Pagina de inicio
          <small>seleccione una pagina del menú para continuar</small>
        </h1>
      </section>
      <section class="content">

      </section>
    </div>
    <?php include('inc.footer.php') ?>
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
  </script>
</body>
</html>
