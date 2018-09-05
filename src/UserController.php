<?php

use \Rapd\View;
use \Rapd\Environment;
use \Rapd\Router;

class UserController extends Controller {
	public function login(){
		$gotInvalidCredentials = false;

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$username = $_REQUEST["username"];
			$password = $_REQUEST["password"];
			if(User::isValidCredentials($username, $password)){
				User::setSessionUser($username);
				return Router::redirectTo("home");
			} else {
				$gotInvalidCredentials = true;
			}
		}

		return View::render("login", [
			"gotInvalidCredentials" => $gotInvalidCredentials
		]);
	}
}
