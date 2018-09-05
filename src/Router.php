<?php

class Router extends \Rapd\Router {
	static function redirectBack(){
		header("Location: {$_SERVER["HTTP_REFERER"]}");
		exit;
	}
}
