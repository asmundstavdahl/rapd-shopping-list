<?php

class ShopList extends Entity {
	static $fields = [
		"id" => integer::class,
		"title" => string::class,
	];

	function getItems() : array {
		return self::findAllBelonging(ShopListItem::class);
	}

	function userHasAccess(User $user) : bool {
		return 0 < count(
			self::findAllBelongingWhere(
				UserShopList::class,
				"user_id = :user_id", [
					":user_id" => $user->id
				]
			)
		);
	}
}
