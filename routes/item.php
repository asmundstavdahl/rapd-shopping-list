<?php

use \Rapd\Router\Route;
use \Rapd\View;

Router::add(new Route(
	"new_item",
	"/list/(\d+)/new_item",
	function(int $listId){
		$user = User::current();

		$list = ShopList::findById($listId);

		$item = new ShopListItem([
			"shop_list_id" => $list->id
		]);
		$item->patch($_REQUEST);

		$item->insert();

		return Router::redirectBack();
	}
));

Router::add(new Route(
	"check_item",
	"/item/(\d+)",
	function(int $id){
		$user = User::current();
		$time = date(TIMESTAMP_FORMAT);

		$item = ShopListItem::findById($id);
		$item->checked = $item->checked ?0 :1;
		if($item->checked){
			$item->checked_info = "&#x2713; {$user->name}, {$time}";
		} else {
			$item->checked_info = "&#x2a2f; {$user->name}, {$time}";
		}
		$item->update();

		return Router::redirectBack();
	}
));
