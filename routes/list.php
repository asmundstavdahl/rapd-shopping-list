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

Router::add(new Route(
	"clean_list",
	"/list/(\d+)/clean",
	function(int $id){
		$user = User::current();

		$list = ShopList::findById($id);

		if(!$list->userHasAccess($user)){
			return Respond::forbidden("No access to this list");
		}

		$list->clean();

		return Router::redirectTo("show_list", [$list->id]);
	}
));

Router::add(new Route(
	"configure_list",
	"/list/(\d+)/configure",
	function(int $id){
		$user = User::current();

		$list = ShopList::findById($id);

		if(!$list->userHasAccess($user)){
			return Respond::forbidden("No access to this list");
		}

		return View::render("configure_list", [
			"user" => $user,
			"list" => $list,
		]);
	}
));

Router::add(new Route(
	"grant_list_access",
	"/list/(\d+)/allow",
	function(int $id){
		$user = User::current();

		$list = ShopList::findById($id);

		if(!$list){
			return Respond::badRequest("No such list");
		}

		if(!$list->userHasAccess($user)){
			return Respond::forbidden("No access to this list");
		}

		$otherUser = User::findById($_REQUEST["user_id"]);

		if(!$otherUser){
			return Respond::badRequest("That user doesn't exist");
		}

		$userShopList = new UserShopList([
			"user_id" => $otherUser->id,
			"shop_list_id" => $list->id,
		]);
		$userShopList->insert();

		return Router::redirectTo("configure_list", [$list->id]);
	}
));

Router::add(new Route(
	"deny_list_access",
	"/list/(\d+)/deny/(\d+)",
	function(int $listId, int $userId){
		$user = User::current();

		$list = ShopList::findById($listId);

		if(!$list){
			return Respond::badRequest("No such list");
		}

		if(!$list->userHasAccess($user)){
			return Respond::forbidden("No access to this list");
		}

		UserShopList::deleteWhere("user_id = :user_id AND shop_list_id = :shop_list_id", [
			":user_id" => $userId,
			":shop_list_id" => $list->id,
		]);

		return Router::redirectTo("configure_list", [$list->id]);
	}
));
