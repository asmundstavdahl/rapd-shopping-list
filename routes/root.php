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
		return View::render("home", [
			"user" => User::current()
		]);
	}
));
