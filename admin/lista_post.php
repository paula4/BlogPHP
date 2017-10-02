<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <?php include('inc/inc.head.php'); ?>
</head>
<body class="hold-transition skin-red-light sidebar-mini">
  <div class="wrapper">
    <?php include('inc/inc.header.php'); ?>
    <?php include('inc/inc.sidebar.php') ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Mis Post
          <small>se muestra la lista de posts del usuario</small>
        </h1>
      </section>
      <section class="content">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Listado de posts</h3>
            </div>
            <div class="box-body">
              <?php
              if(isset($_GET['status'])){
                if($_GET['status'] == "deleted"){
                  ?>
                  <div class="callout callout-success">
                    <p>El post se eliminó con exito, puede buscarlo en la sección "Mis Posts".</p>
                  </div>
                  <?php
                }elseif ($_GET['status'] == "no") {
                  ?>
                  <div class="callout callout-danger">
                    <p>Ocurrio un error y el post no se pudo eliminar.</p>
                  </div>
                  <?php
                }
              }
              ?>
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 150px">Acciones</th>
                  <th>Título</th>
                  <th>Descripción</th>
                  <th style="width: 110px">Creado el</th>
                  <th style="width: 110px">Actualizado el</th>
                </tr>
                <?php
                require_once('../functions/classes/post.php');
                foreach (Post::getAllId($user->getId()) as $post_id) {
                  $post = new Post();
                  $post->setId($post_id);
                  ?>
                  <tr>
                    <td><?php echo $post_id; ?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary btn-xs" href="editar_post.php?id=<?php echo $post_id; ?>">Editar</a>
                        <a class="btn btn-success btn-xs" href="../post.php?id=<?php echo $post_id; ?>">Ver</a>
                        <button class="btn btn-danger btn-xs" onclick="EliminarPost(<?php echo $post_id; ?>)">Eliminar</button>
                      </div>
                    </td>
                    <td><?php echo $post->getTitle(); ?></td>
                    <td><?php echo $post->getDescription(); ?></td>
                    <td><?php echo $post->getCreatedAt(); ?></td>
                    <td><?php echo $post->getUpdatedAt(); ?></td>
                  </tr>
                  <?php
                }
                ?>

              </table>
            </div>
          </div>
      </section>
    </div>
    <?php include('inc/inc.footer.php') ?>
    <div class="control-sidebar-bg"></div>
  </div>
  <script type="text/javascript">
    function EliminarPost(id){
      if (confirm("¿Esta seguro que desea elimiar el post?")) {
        window.location.href = 'post/delete.php?id='+id;
      }
    }
  </script>
  <!-- jQuery 3 -->
  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="assets/dist/js/demo.js"></script>
  <script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
  </script>
</body>
</html>
