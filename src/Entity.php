<?php

class Entity extends \Rapd\PersistableEntity {
	use \Rapd\Prototype;

	function findAllBelonging(string $entityClass) : array {
		$myTable = self::getTable();
		return $entityClass::findAllWhere("{$myTable}_id = :id", [
			":id" => $this->id
		]);
	}
}
