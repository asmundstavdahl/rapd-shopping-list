<?php

use \Rapd\View;
use \Rapd\Router;

session_start();

class User extends Entity {
	static $fields = [
		"id" => integer::class,
		"username" => string::class,
		"password" => string::class,
		"name" => string::class,
	];

	function setPassword(string $password){
		$this->password = password_hash($password, PASSWORD_DEFAULT);
	}

	static function isLoggedIn() : bool {
		return isset($_SESSION["user"]);
	}

	static function current() : User {
		if(isset($_SESSION["user"])){
			return self::findByUsername($_SESSION["user"]);
		} else {
			Router::redirectTo("login");
		}
	}

	static function setSessionUser(string $username) {
		$_SESSION["user"] = $username;
	}

	static function findByUsername(string $username) : ?User {
		return self::findFirstWhere("username = :username", [
			":username" => $username
		]);
	}

	static function isValidCredentials(string $username, string $password) : bool {
		$user = self::findByUsername($username);

		return $user && password_verify($password, $user->password);
	}
}
