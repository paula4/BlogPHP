<?php
/**
 * Clase Comment
 */
class Comment
{
  const TABLE = 'comments';
  private $datos,$con;
  private $id,$user_id,$post_id,$comment,$created_at;
  function __construct()
  {
    require_once(dirname(__FILE__).'/../functions/mysqlfunctions.php');
    $this->con = getConnection();
  }
  function __destruct() {
    $this->con->close();
   }
  /* Metodos para establecer datos */
  public function setId($id){
    $id = $this->con->real_escape_string($id);
    $table = $this->con->real_escape_string(self::TABLE);
    $sql = "SELECT * FROM $table WHERE id = '$id'";
    $result = $this->con->query($sql);
    if($row = $result->fetch_assoc()){
      $this->datos = $row;
      $this->id = $this->datos['id'];
      $this->user_id = $this->datos['user_id'];
      $this->post_id = $this->datos['post_id'];
      $this->comment = $this->datos['comment'];
      $this->created_at = $this->datos['created_at'];
		}
  }
  public function setUserId($value){
    $this->user_id = $value;
  }
  public function setPostId($value){
    $this->post_id = $value;
  }
  public function setComment($value){
    $this->comment = $value;
  }
  public function setCreatedAt($value){
    $this->created_at = $value;
  }

  /* Metodos para obtener datos */
  public function getId(){
    return $this->id;
  }
  public function getUserId(){
    return $this->user_id;
  }
  public function getPostId(){
    return $this->post_id;
  }
  public function getComment(){
    return $this->comment;
  }
  public function getCreatedAt(){
    return $this->created_at;
  }
  /* Metodos para manejar la base de datos */
  public function dbInsert(){
    $table = $this->con->real_escape_string(self::TABLE);
    $id = $this->con->real_escape_string($this->id);
    $user_id = $this->con->real_escape_string($this->user_id);
    $post_id = $this->con->real_escape_string($this->post_id);
    $comment = $this->con->real_escape_string($this->comment);
    $created_at = $this->con->real_escape_string($this->created_at);

    $sql =  "INSERT INTO $table
            (  user_id,   post_id,   comment,   created_at)
    VALUES  ('$user_id','$post_id','$comment','$created_at')";
    return $this->con->query($sql);
  }
  public function dbUpdate(){
    $table = $this->con->real_escape_string(self::TABLE);
    $id = $this->con->real_escape_string($this->id);
    $user_id = $this->con->real_escape_string($this->user_id);
    $post_id = $this->con->real_escape_string($this->post_id);
    $comment = $this->con->real_escape_string($this->comment);
    $created_at = $this->con->real_escape_string($this->created_at);

    $sql = "UPDATE $table SET user_id       = '$user_id',
                              post_id       = '$post_id',
                              comment       = '$comment',
                              created_at    = '$created_at'
                              WHERE id = '$id'";
    return $this->con->query($sql);
  }
  public function dbDelete(){
    $table = $this->con->real_escape_string(self::TABLE);
    $id = $this->con->real_escape_string($this->id);
    $sql = "DELETE FROM $table WHERE id = '$id'";
    return $this->con->query($sql);
  }
}
?>
