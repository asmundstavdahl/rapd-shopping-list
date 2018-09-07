<?php

use \Rapd\View;
use \Rapd\Environment;

class Respond {
	static function badRequest(string $reason) : string {
		Environment::set("TITLE", "404 Bad Request");
		header("HTTP/1.1 400 Bad Request");
		return View::render("400", [
			"reason" => $reason
		]);
	}

	static function forbidden(string $reason) : string {
		Environment::set("TITLE", $reason);
		header("HTTP/1.1 403 Forbidden");
		return View::render("403", [
			"reason" => $reason,
		]);
	}

	static function notFound() : string {
		Environment::set("TITLE", "404 Not Found");
		header("HTTP/1.1 404 Not Found");
		return View::render("404");
	}
}
