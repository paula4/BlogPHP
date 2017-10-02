<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <?php include('inc.head.php'); ?>
</head>
<body class="hold-transition skin-red-light sidebar-mini">
  <div class="wrapper">
    <?php include('inc.header.php'); ?>
    <?php include('inc.sidebar.php') ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Agregar Post
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-6">
            <form action="../post/new.php" method="post">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Nuevo Post</h3>
                </div>
                <div class="box-body">
                  <?php
                  if(isset($_GET['status'])){
                    if($_GET['status'] == "created"){
                      ?>
                      <div class="callout callout-success">
                        <p>El post se creó con exito, puede buscarlo en la sección "Mis Posts".</p>
                      </div>
                      <?php
                    }elseif ($_GET['status'] == "no") {
                      ?>
                      <div class="callout callout-danger">
                        <p>El post no se creó, revise los datos e intente nuevamente.</p>
                      </div>
                      <?php
                    }
                  }
                  ?>
                  <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="title" class="form-control" placeholder="Título">
                  </div>
                  <div class="form-group">
                    <label>Descripción</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Descripción"></textarea>
                  </div>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-xs-6">
                      <button type="reset" class="btn">Limpiar formulario</button>
                    </div>
                    <div align="right" class="col-xs-6">
                      <button type="submit" class="btn btn-primary">Agregar Post</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
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
