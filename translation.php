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
		"nb" => "%d linje(r)",
	],
	"List has n users" => [
		"nb" => "%d bruker(e)",
	],
	"Wrong password" => [
		"nb" => "Feil passord? Prøv igjen.",
		"en" => "Wrong password? Try again.",
	],
	"Log in" => [
		"nb" => "Logg på",
	],
	"Log out" => [
		"nb" => "Logg av",
	],
	"Username" => [
		"nb" => "Brukernavn",
	],
	"Password" => [
		"nb" => "Passord",
	],

	"Enter new item" => [
		"nb" => "Legg til en linje"
	],
	"Enter new list" => [
		"nb" => "Legg til en liste"
	],
	"Submit" => [
		"nb" => "Send inn"
	],
	"Confirm deletion" => [
		"nb" => "Bekreft sletting"
	],

	"Grant access to another user" => [
		"nb" => "Gi adgang til en annen bruker",
	],
	"Allow user" => [
		"nb" => "Gi adgang til bruker",
	],
	"Users with access" => [
		"nb" => "Brukere med adgang",
	],
	"Name" => [
		"nb" => "Navn",
	],
	"Revoke access" => [
		"nb" => "Fjern tillatelse",
	],
];
