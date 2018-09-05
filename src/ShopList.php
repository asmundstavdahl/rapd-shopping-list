<?php

class ShopList extends Entity {
	static $fields = [
		"id" => integer::class,
		"title" => string::class,
	];

	function getItems() : array {
		return self::findAllBelonging(ShopListItem::class);
	}
}
