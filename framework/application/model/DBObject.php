<?php
namespace Model;

abstract class DBObject extends \System\Model\DBObject {
	public static function getDB() {
		return \Library\Database\LinqDB::getDB("hostname", "user", "password", "schema");
	}
}
