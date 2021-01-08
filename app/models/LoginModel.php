<?php

class LoginModel extends Model {
  private $login = null;
  private $password = null;
  public function __construct() {
    
    parent::__construct();

    $this->init();
	}

  protected function init() {
    $this->login = $_POST['login'];
    $this->password = md5($_POST['password']);
  }
  
  public function getUser() {
    
    $query = "SELECT * FROM users WHERE id=1";
    $result = $this->query($query) ?? '';
    
    if($row = $result->fetch()) {
      if($row["login"] === $this->login && $row["password"] === $this->password) {
        $_SESSION["USER"]["NAME"] = $row["login"];
        $_SESSION["USER"]["IS_ADMIN"] = ("isAdmin") ? true : false;
        
        return true;
      }
    }
    
    return false;
  }

}
