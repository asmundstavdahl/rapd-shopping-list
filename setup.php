<?php

require_once "src/autoload.php";
require_once "vendor/autoload.php";

require_once "config.php";

$user = new User([
	"username" => "user1",
	"name" => "User One",
]);
$user->setPassword("123");
$user->insert();

$user = new User([
	"username" => "user2",
	"name" => "User Two",
]);
$user->setPassword("123");
$user->insert();
