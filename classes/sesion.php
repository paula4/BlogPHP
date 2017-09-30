<?php
/*
* Clase para controlar sesiones de usuarios
*/
class Sesion {
	public static function Login($email,$pass){
    if (session_status() == PHP_SESSION_NONE) {
    		session_start();
		}
		require_once(dirname(__FILE__).'/user.php');
    require_once(dirname(__FILE__).'/../functions/mysqlfunctions.php');
    $con = getConnection();
    $usr = new User();

    $table = $con->real_escape_string(User::TABLE);
    $email = $con->real_escape_string($email);

    $sql = "SELECT id,password FROM $table WHERE email = '$email'"; // consulta sql
		if($result = $con->query($sql)){
      if($row = $result->fetch_assoc()){
        if($row['password'] == $pass){
          $_SESSION['conected'] = true;
      		$_SESSION['id'] = $row['id'];
  				return true;
  			}
      }
			return false;
		}
		else{
			return false;
		}
	}
	public static function Logout(){
		if (session_status() == PHP_SESSION_NONE) {
				session_start();
		}
		if(isset($_SESSION['conected'])){
				session_destroy();

      return true;
		}
    return false;
	}
	public static function isLogged(){
		if(isset($_SESSION['conected']) && $_SESSION['conected']){
			return true;
		}
		else{
			return false;
		}
	}
  public static function getId(){
    if(isset($_SESSION['id'])){
      return $_SESSION['id'];
    }
    else{
      return false;
    }
  }
}
?>
