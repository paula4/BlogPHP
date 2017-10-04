# BlogPHP
## Importante:
Cambiar datos de conexion en la db en [functions/dbinfo.php](https://github.com/paula4/BlogPHP/blob/master/functions/dbinfo.php).

## Directorios y significado:
    .BlogPHP
    │
    ├── admin (Panel de usuario)
    │   ├── post
    │   │   └── (Acciones new, edit, delete)
    │   ├── agregar_post.php (Formulario para agregar posts)
    │   ├── editar_post.php (Formulario para modificar posts)
    │   ├── lista_post.php (Lista de posts)
    │   ├── comment
    │   │   └── (Accion delete)
    │   ├── mis_comentarios.php (Lista de comentarios del usuario)
    │   ├── assets
    │   │   └── (Archivos de la plantilla)
    │   ├── inc
    │   │   └── (Archivos para importar)
    │   └── index.php (Pagina principal)
    │
    ├── assets
    │   └── (Archivos de la plantilla)
    │
    ├── functions (Funciones PHP)
    │   ├── classes
    │   │   └── (Clases para los diferentes componentes del sistema)
    │   ├── dbinfo.php (Datos de la BD)
    │   └── mysqlfunctions.php (Funciones para la BD)
    │
    ├── inc
    │   └── (Archivos para importar)
    │
    ├── index.php (Pagina principal del Blog)
    ├── login.php (Pagina de inicio de sesion)
    ├── logout.php (Pagina de cierre de sesion)
    ├── post.php (Pagina de post individual)
    ├── delete_com.php (Eliminar comentario desde la pagina del post)
    └── register.php (Pagina de registro)
