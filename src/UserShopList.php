<?php

class UserShopList extends Entity {
	static $fields = [
		"id" => integer::class,
		"user_id" => integer::class,
		"shop_list_id" => integer::class,
		"access" => string::class,
	];
}
