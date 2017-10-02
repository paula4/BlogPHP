<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="es">
<head>
  <?php include('inc/inc.head.php');?>
</head>

<body>
  <div id="wrapper">
    <div id="main">
      <div class="inner">
        <!-- Header -->
        <?php include('inc/inc.header.php'); ?>
        <!-- Banner -->
        <?php include('inc/inc.banner.php') ?>
        <!-- Ultimos Posts -->
        <?php include('inc/inc.loop.php'); ?>
      </div>
    </div>
    <!-- Sidebar -->
    <?php include('inc/inc.sidebar.php'); ?>
  </div>
  <!-- Scripts -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/skel.min.js"></script>
  <script src="assets/js/util.js"></script>
  <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
  <script src="assets/js/main.js"></script>
</body>
</html>
