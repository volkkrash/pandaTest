<?php

class LoginController extends Controller {

	function index() {
		if(isset($_POST['login']) && isset($_POST['password'])) {
      $model = new LoginModel();
      $user = $model->getUser();
      if($user) {
        $data["login_status"] = "Y";
        header('Location:/');
      } else {
        $data["login_status"] = "N";
      }
      $_SESSION['login_status'] = $data["login_status"];
		}
		
		$this->view->generate('login_view.php', 'layout.php');
	}

	function logout() {
		session_start();
		session_destroy();
		header('Location:/');
	}
	
}