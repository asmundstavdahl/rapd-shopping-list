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

function tr(string $name, ...$args) : string {
	static $translations = false;
	if($translations === false){
		$translations = include __DIR__."/translations.php";
	}

	$lang = Environment::get("lang");

	if(isset($translations[$name][$lang])){
		array_unshift($args, $translations[$name][$lang]);
		return e(call_user_func_array("sprintf", $args));
	}
	return e($name);
}
