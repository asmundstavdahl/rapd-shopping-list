<?php

class ShopListItem extends Entity {
	static $fields = [
		"id" => integer::class,
		"shop_list_id" => integer::class,
		"title" => string::class,
		"checked" => integer::class,
		"checked_info" => string::class,
	];
}
