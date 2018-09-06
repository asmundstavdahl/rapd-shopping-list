<?php

require_once "src/autoload.php";
require_once "vendor/autoload.php";

require_once "config.php";

if($argc < 3){
	echo "Usage: {$argv[0]} username full_name [password]\n";
	exit;
}

$user = new User([
	"username" => $argv[1],
	"name" => $argv[2],
]);
echo "Adding username/name {$user->username}/{$user->name}...\n";

if($argc == 4){
	echo "\twith given password...";
	$password = $argv[3];
} else {
	$password = `bash -c 'read -s -p "Enter password: " pw && echo -n "\$pw"'`;
}

$user->setPassword($password);
$user->insert();

echo "\n\t";
if($user->id){
	echo "OK\n";
} else {
	echo "Failed\n";
}
