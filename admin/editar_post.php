<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <?php include('inc/inc.head.php');
  $post_id = 0;
  if(isset($_GET['id'])){
    $post_id = $_GET['id'];
  }
  include('../functions/classes/post.php');
  $post = new Post();
  $post->setId($post_id);
  if(Sesion::getId() != $post->getAuthorId()){
    header('Location: lista_post.php');
    return false;
  }
  ?>
</head>
<body class="hold-transition skin-red-light sidebar-mini">
  <div class="wrapper">
    <?php include('inc/inc.header.php'); ?>
    <?php include('inc/inc.sidebar.php') ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Agregar Post
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-6">
            <form action="post/edit.php?id=<?php echo $post->getId();?>" method="post">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Editar Post</h3>
                </div>
                <div class="box-body">
                  <?php

                  if(isset($_GET['status'])){
                    if($_GET['status'] == "edited"){
                      ?>
                      <div class="callout callout-success">
                        <p>El post se modificó con exito, puede buscarlo en la sección "Mis Posts".</p>
                      </div>
                      <?php
                    }elseif ($_GET['status'] == "no") {
                      ?>
                      <div class="callout callout-danger">
                        <p>El post no se modificó, revise los datos e intente nuevamente.</p>
                      </div>
                      <?php
                    }
                  }

                  ?>
                  <div class="form-group">
                    <label>Título</label>
                    <input required type="text" name="title" value="<?php echo $post->getTitle();?>" class="form-control" placeholder="Título">
                  </div>
                  <div class="form-group">
                    <label>Descripción</label>
                    <textarea required class="form-control" name="description" rows="3" placeholder="Descripción"><?php echo $post->getDescription();?></textarea>
                  </div>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-xs-6">
                      <button type="reset" class="btn">Reiniciar formulario</button>
                    </div>
                    <div align="right" class="col-xs-6">
                      <button type="submit" class="btn btn-primary">Guardar Post</button>
                    </div>
                  </div>
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
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
  </script>
</body>
</html>
