<?php

use \Rapd\Router;
use \Rapd\Router\Route;
use \Rapd\View;

Router::add(new Route(
	"login",
	"/login",
	[\UserController::class, "login"]
));

Router::add(new Route(
	"hello_world",
	"/world",
	[\HelloController::class,"world"]
));
