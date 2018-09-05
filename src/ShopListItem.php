<?php

class ShopListItem extends Entity {
	static $fields = [
		"id" => integer::class,
		"title" => string::class,
		"shop_list_id" => integer::class,
	];
}
