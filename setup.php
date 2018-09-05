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


$shopList = new ShopList([
	"title" => "Første liste",
]);
$shopList->insert();

$userShopList = new UserShopList([
	"user_id" => $user->id,
	"shop_list_id" => $shopList->id
]);
$userShopList->insert();

$item = new ShopListItem([
	"shop_list_id" => $shopList->id,
	"title" => "Linje 1",
]);
$item->insert();

$item = new ShopListItem([
	"shop_list_id" => $shopList->id,
	"title" => "Linje 2",
]);
$item->insert();
