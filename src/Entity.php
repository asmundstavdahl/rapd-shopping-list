<?php

class Entity extends \Rapd\PersistableEntity {
	use \Rapd\Prototype;

	/**
	 * Using entity classes' fields and getTable, get each belonging entity
	 * of specified class that "belongs" to $this.
	 * 
	 * EntityA belongs to EntityB if entity_a.entity_b_id = entity_b.id.
	 * 
	 * @example $entityB->findAllBelonging(EntityA::class)
	 */
	function findAllBelonging(string $entityClass) : array {
		$myTable = self::getTable();
		return $entityClass::findAllWhere("{$myTable}_id = :id", [
			":id" => $this->id
		]);
	}

	/**
	 * Like findAllBelonging, but with extra WHERE contition.
	 */
	function findAllBelongingWhere(string $entityClass, string $condition, array $binds = []) : array {
		$myTable = self::getTable();
		$binds[":id"] = $this->id;
		return $entityClass::findAllWhere("{$myTable}_id = :id AND {$condition}", $binds);
	}
}
