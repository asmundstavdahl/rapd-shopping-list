<?php

use \Rapd\Environment;

function tr(string $name, ...$args) : string {
	global $translations;

	if($translations === false){
		$translations = include __DIR__."/src/translations.php";
	}

	$lang = Environment::get("lang");

	if(isset($translations[$name][$lang])){
		array_unshift($args, $translations[$name][$lang]);
		return e(call_user_func_array("sprintf", $args));
	}
	return e($name);
}

$translations = [
	"Your lists" => [
		"nb" => "Dine %d liste(r)",
	],
	"Welcome" => [
		"nb" => "Velkommen, %s",
	],
	"List has n items" => [
		"nb" => "%d linjer",
	],

	"Enter new item" => [
		"nb" => "Legg til en linje"
	],
	"Submit" => [
		"nb" => "Send inn"
	],
	"Confirm deletion" => [
		"nb" => "Bekreft sletting"
	],
];
