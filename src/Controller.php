<?php

use \Rapd\View;
use \Rapd\Environment;

class Controller {
	public static function __callStatic($method, $args){
		$argString = htmlspecialchars(self::describeArray($args));
		return View::render("header")
			. "<h1>{$method}</h1>"
			. "<h2>{$argString}</h2>"
			. View::render("footer");
	}
}
