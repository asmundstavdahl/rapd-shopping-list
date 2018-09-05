<?php

use \Rapd\Router;
use \Rapd\View;
use \Rapd\Environment;

function route(string $name, array $data = []){
	return Router::makeUrlTo($name, $data);
}

function render(string $name, array $data = []){
	return View::render($name, $data);
}

function e(string $str) : string {
	return htmlentities($str);
}
