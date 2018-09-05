<?php

use \Rapd\Router;
use \Rapd\Router\Route;
use \Rapd\View;

Router::add(new Route(
	"show_list",
	"/list/(\d+)",
	function(int $id){
		$user = User::current();

		$list = ShopList::findById($id);

		if($list->userHasAccess($user)){
			return View::render("show_list", [
				"user" => $user,
				"list" => $list,
			]);
		} else {
			return Respond::forbidden("No access to this list");
		}
	}
));

Router::add(new Route(
	"new_list",
	"/new_list",
	function(){
		$user = User::current();

		$list = new ShopList();

		$list->patch($_REQUEST);
		$list->insert();

		$userList = new UserShopList([
			"shop_list_id" => $list->id,
			"user_id" => $user->id,
			"access" => "admin"
		]);
		$userList->insert();

		return Router::redirectTo("home");
	}
));
