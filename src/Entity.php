<?php

use \Rapd\Database;

class Entity extends \Rapd\PersistableEntity {
	use \Rapd\Prototype;

	/**
	 * Optional column-def overwrite for fields.
	 *
	 * @see gensql.php
	 */
	static $columns = [];

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

	static function deleteWhere(string $condition, array $binds = []){
		Database::assertInitialized();

		$entityClass = get_called_class();

		$table = $entityClass::getTable();

		$sql = "DELETE FROM `{$table}` WHERE {$condition}";
		$stmt = Database::$pdo->prepare($sql);
		$stmt->execute($binds);

		$rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		$entities = [];
		foreach($rows as $values){
			$entity = new $entityClass();
			foreach($values as $field => $value){
				$entity->{$field} = $value;
			}
			$entities[] = $entity;
		}

		return $entities;
	}
}
