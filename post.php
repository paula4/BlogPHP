<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<?php include('inc/inc.head.php') ?>
<body>
  <div id="wrapper">
    <div id="main">
      <div class="inner">
        <!-- Header -->
        <?php include('inc/inc.header.php'); ?>
        <!-- Post Individual -->
        <?php include('inc/inc.post.php'); ?>
      </div>
    </div>
    <!-- Sidebar -->
    <?php include('inc/inc.sidebar.php'); ?>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>
  </body>
  </html>
