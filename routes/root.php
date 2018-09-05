<?php

use \Rapd\Router\Route;
use \Rapd\View;

Router::add(new Route(
	"home",
	"/",
	function(){
		$user = User::current();

		$lists = $user->getShopLists();

		return View::render("home", [
			"user" => $user,
			"lists" => $lists,
		]);
	}
));
