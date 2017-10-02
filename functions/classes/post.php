<?php
/**
 * Clase Post
 */
class Post
{
  const TABLE = 'post';
  private $datos,$con; //Variables para manejar la db y datos
  private $id,$title,$description,$created_at,$updated_at,$author_id; // campos de db
  function __construct()
  {

    require_once(dirname(__FILE__).'/../../functions/mysqlfunctions.php');
    $this->con = getConnection();
  }
  function __destruct() {
    $this->con->close();
   }
  /* Metodos para establecer datos */
  public function setId($id){
    $id = $this->con->real_escape_string($id);
    $table = $this->con->real_escape_string(self::TABLE);
    $sql = "SELECT * FROM $table WHERE id = '$id'"; // consulta sql
    $result = $this->con->query($sql); // se ejecuta la consulta
    if($row = $result->fetch_assoc()){ // Si se encuentra un registro...
      $this->datos = $row;          // se almacena como un arreglo asociativo ($data)
      $this->id = $this->datos['id'];
      $this->title = $this->datos['title'];
      $this->description = $this->datos['description'];
      $this->created_at = $this->datos['created_at'];
      $this->updated_at = $this->datos['updated_at'];
      $this->author_id = $this->datos['author_id'];
      return true;
		}
    else{
      return false;
    }
  }
  public function setTitle($value){
    $this->title = $value;
  }
  public function setDescription($value){
    $this->description = $value;
  }
  public function setCreatedAt($value){
    $this->created_at = $value;
  }
  public function setUpdatedAt($value){
    $this->updated_at = $value;
  }
  public function setAuthorId($value){
    $this->author_id = $value;
  }

  /* Metodos para obtener datos */
  public static function getAllId($author_id = null){
    require_once(dirname(__FILE__).'/../../functions/mysqlfunctions.php');
    $con = getConnection();
    $table = $con->real_escape_string(self::TABLE);
    $sql = isset($author_id) ? "SELECT id FROM $table WHERE author_id = '$author_id' ORDER BY id DESC":"SELECT id FROM $table ORDER BY id DESC";
    $toreturn = array();
    if($result = $con->query($sql)){
      while($row = $result->fetch_assoc()){
        array_push($toreturn,$row['id']);
      }
    }
    return $toreturn;
  }
  public function getId(){
    return $this->id;
  }
  public function getTitle(){
    return $this->title;
  }
  public function getDescription(){
    return $this->description;
  }
  public function getCreatedAt(){
    return $this->created_at;
  }
  public function getUpdatedAt(){
    return $this->updated_at;
  }
  public function getAuthorId(){
    return $this->author_id;
  }
  /* Metodos para manejar la base de datos */
  public function dbInsert(){ // devuelve true o false
    $table = $this->con->real_escape_string(self::TABLE);
    $id = $this->con->real_escape_string($this->id);
    $title = $this->con->real_escape_string($this->title);
    $description = $this->con->real_escape_string($this->description);
    $created_at = $this->con->real_escape_string($this->created_at);
    $updated_at = $this->con->real_escape_string($this->updated_at);
    $author_id = $this->con->real_escape_string($this->author_id);
    $sql = "INSERT INTO $table
    (title,description,created_at,updated_at,author_id)
    VALUES ('$title','$description','$created_at','$updated_at','$author_id')";

    return $this->con->query($sql);
  }
  public function dbUpdate(){
    $table = $this->con->real_escape_string(self::TABLE);
    $id = $this->con->real_escape_string($this->id);
    $title = $this->con->real_escape_string($this->title);
    $description = $this->con->real_escape_string($this->description);
    $created_at = $this->con->real_escape_string($this->created_at);
    $updated_at = $this->con->real_escape_string($this->updated_at);
    $author_id = $this->con->real_escape_string($this->author_id);
    $sql = "UPDATE $table SET title       = '$title',
                              description = '$description',
                              created_at  = '$created_at',
                              updated_at  = '$updated_at',
                              author_id   = '$author_id'
                              WHERE id = '$id'";
    return $this->con->query($sql);
  }
  public function dbDelete(){
    require_once(dirname(__FILE__).'/comment.php');//Se incluye la clase Comment para acceder al nombre de la tabla
    $table = $this->con->real_escape_string(Comment::TABLE);
    $post_id = $this->con->real_escape_string($this->id);
    //Antes de eliminar el post se deben eliminar sus comentarios
    $sql = "DELETE FROM $table WHERE post_id = '$post_id'";
    $result = $this->con->query($sql); // se ejecuta la consulta
    if($result){ // Si se eliminaron correctamente los comentarios...
      $table = $this->con->real_escape_string(self::TABLE);
      $sql = "DELETE FROM $table WHERE id = '$post_id'";
      return $this->con->query($sql);
		}
    //En caso de no poder eliminar los comentarios no elimina el post y devuelve falso
    return false;
  }
}
?>
