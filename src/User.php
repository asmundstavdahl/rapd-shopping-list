<?php

use \Rapd\View;
use \Rapd\Environment;

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
		return self::current() ?true :false;
	}

	static function current() : ?User {
		return self::findByUsername($_SESSION["user"]);
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
