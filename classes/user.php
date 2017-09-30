<?php
/**
* Clase User
*/
class User
{
  const TABLE = 'user';
  private $datos,$con;
  private $id,$name,$lastname,$email,$password,$phone,$is_active;
  function __construct()
  {
    require_once('functions/mysqlfunctions.php');
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
      $this->name = $this->datos['name'];
      $this->lastname = $this->datos['lastname'];
      $this->email = $this->datos['email'];
      $this->password = $this->datos['password'];
      $this->phone = $this->datos['phone'];
      $this->is_active = $this->datos['is_active'];

    }
  }
  public function setName($value){
    $this->name = $value;
  }
  public function setLastName($value){
    $this->lastname = $value;
  }
  public function setEmail($value){
    $this->email = $value;
  }
  public function setPass($value){
    $this->password = $value;
  }
  public function setPhone($value){
    $this->phone = $value;
  }
  public function setIsActive($value){
    $this->is_active = $value;
  }
  /* Metodos para obtener datos */
  public function getId(){
    return $this->id;
  }
  public function getName(){
    return $this->name;
  }
  public function getLastName(){
    return $this->lastname;
  }
  public function getEmail(){
    return $this->email;
  }
  public function getPass(){
    return $this->password;
  }
  public function getPhone(){
    return $this->phone;
  }
  public function getIsActive(){
    return $this->is_active;
  }
  /* Metodos para manejar la base de datos */
  public function dbInsert(){
    $table = $this->con->real_escape_string(self::TABLE);
    $id = $this->con->real_escape_string($this->id);
    $name = $this->con->real_escape_string($this->name);
    $lastname = $this->con->real_escape_string($this->lastname);
    $email = $this->con->real_escape_string($this->email);
    $password = $this->con->real_escape_string($this->password);
    $phone = $this->con->real_escape_string($this->phone);
    $is_active = $this->con->real_escape_string($this->is_active);

    $sql =  "INSERT INTO $table
            (  name,   lastname,   email,   password,   phone,   is_active)
    VALUES  ('$name','$lastname','$email','$password','$phone','$is_active')";
    return $this->con->query($sql);
  }
  public function dbUpdate(){
    $table = $this->con->real_escape_string(self::TABLE);
    $id = $this->con->real_escape_string($this->id);
    $name = $this->con->real_escape_string($this->name);
    $lastname = $this->con->real_escape_string($this->lastname);
    $email = $this->con->real_escape_string($this->email);
    $password = $this->con->real_escape_string($this->password);
    $phone = $this->con->real_escape_string($this->phone);
    $is_active = $this->con->real_escape_string($this->is_active);

    $sql = "UPDATE $table SET name      = '$name',
                              lastname  = '$lastname',
                              email     = '$email',
                              password  = '$password',
                              phone     = '$phone',
                              is_active = '$is_active'
                              WHERE id = '$id'";
    return $this->con->query($sql);
  }
  public function dbDelete(){
    require_once('post.php');
    require_once('comment.php');

    $self_table          = $this->con->real_escape_string(Self::TABLE);
    $post_table     = $this->con->real_escape_string(Post::TABLE);
    $comment_table = $this->con->real_escape_string(Comment::TABLE);
    $user_id = $this->con->real_escape_string($this->id);

    //Antes de eliminar el usuario se deben eliminar sus post y comentarios
    //y antes de eliminar los post del usuario se deben eliminar los respectivos comentarios

    //Elimnar comentarios del usuario
    $sql = "DELETE FROM $comment_table WHERE user_id = '$user_id'";
    $this->con->query($sql);

    //Eliminar posts del usuario
    $sql = "SELECT id FROM $post_table WHERE author_id = '$user_id'";
    if($result = $this->con->query($sql)){
      while($row = $result->fetch_assoc()){

        $post_id = $row['id'];
        $post = new Post();
        $post->setId($post_id);
        $post->dbDelete();//Elimina los comentarios del post y luego borra el post
      }
    }
    
    $sql = "DELETE FROM $self_table WHERE id = '$user_id'";
    return $this->con->query($sql);
  }
}
?>
