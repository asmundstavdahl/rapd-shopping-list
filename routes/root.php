<?php

use \Rapd\Router;
use \Rapd\Router\Route;
use \Rapd\View;

Router::add(new Route(
	"home",
	"/",
	function(){
		if(!User::isLoggedIn()){
			Router::redirectTo("login");
		}

		$user = User::current();

		$lists = $user->getShopLists();

		return View::render("home", [
			"user" => $user,
			"lists" => $lists,
		]);
	}
));
