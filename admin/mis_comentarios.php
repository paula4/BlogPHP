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
          Mis comentarios
          <small>se muestra una lista con los ultimos comentarios realizados por el usuario</small>
        </h1>
      </section>
      <section class="content">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Listado de comentarios</h3>
            </div>
            <div class="box-body">
              <?php
              if(isset($_GET['status'])){
                if($_GET['status'] == "deleted"){
                  ?>
                  <div class="callout callout-success">
                    <p>El comentario se eliminó con exito.</p>
                  </div>
                  <?php
                }elseif ($_GET['status'] == "no") {
                  ?>
                  <div class="callout callout-danger">
                    <p>Ocurrio un error y el comentario no se pudo eliminar.</p>
                  </div>
                  <?php
                }
              }
              ?>
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 150px">Acciones</th>
                  <th>Comentario</th>
                  <th>Post</th>
                  <th style="width: 110px">Creado el</th>
                </tr>
                <?php
                require_once('../functions/classes/comment.php');
                require_once('../functions/classes/post.php');
                foreach (Comment::getAllId(null,$user->getId()) as $comment_id) {
                  $comment = new Comment();
                  $comment->setId($comment_id);
                  $post = new Post();
                  $post->setId($comment->getPostId());
                  ?>
                  <tr>
                    <td><?php echo $comment_id; ?></td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-danger btn-xs" onclick="Eliminar(<?php echo $comment_id; ?>)">Eliminar</button>
                      </div>
                    </td>
                    <td><?php echo $comment->getComment(); ?></td>
                    <td><a href="../post.php?id=<?php echo $post->getId(); ?>"><?php echo $post->getTitle(); ?></a></td>
                    <td><?php echo $comment->getCreatedAt(); ?></td>
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
    function Eliminar(id){
      if (confirm("¿Esta seguro que desea elimiar el comentario?")) {
        window.location.href = 'comment/delete.php?id='+id;
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
  <script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
  </script>
</body>
</html>
