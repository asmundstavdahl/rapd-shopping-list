<?php

use \Rapd\View;
use \Rapd\Environment;

class Respond {
	static function badRequest(string $reason) : string {
		return self::httpStatus("400 Bad Request", $reason);
	}

	static function forbidden(string $reason) : string {
		return self::httpStatus("403 Forbidden", $reason);
	}

	static function notFound() : string {
		Environment::set("TITLE", "404 Not Found");
		header("HTTP/1.1 404 Not Found");
		return View::render("404");
	}

	private static function httpStatus(string $status, string $reason) : string {
		Environment::set("TITLE", $reason);
		header("HTTP/1.1 {$status}");
		return View::render("http-status", [
			"status" => $status,
			"reason" => $reason,
		]);
	}
}
