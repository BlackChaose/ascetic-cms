<?php

namespace AsceticCMS\Lib;

/**
 * Wrap for work with Database
 * @todo  another methods for work
 * @todo  validations & security
 *
 */

class SimpleRecord {
	/**
	 * [pdoInit connect to DB initializaion]
	 * @return [\PDO object] []
	 */
	public static function pdoInit() {
		$file_path = __DIR__ . "/../../config/config.php";
		if (file_exists($file_path)) {
			require_once $file_path;
		} else {
			throw new Exception("configuration file not exist!!! check your config!");
		}
		$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
		$opt = [
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
			\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
			\PDO::ATTR_EMULATE_PREPARES => true,
		];
		$pdo = new \PDO($dsn, DB_USER_LOGIN, DB_USER_PASSKEY, $opt);
		return $pdo;
	}

	/**
	 * readTable - get data from table with name $tableName
	 * @param  string  $tableName name of table
	 * @param  integer $num       LIMIT
	 * @return array            array of query's result
	 */
	public static function readTable($tableName, $num = 10) {
		if (!$tableName) {
			throw new \Exception("<b>Alarm!</b> from: " . get_class() . ". <em>Invalid <b>$tableName</b> param<em>");
		}
		$pdo = self::pdoInit();

		//FIXME: validate $tableNum & $num + add array of allowed table's names and checing for it.
		$tableNameParam = "`" . str_replace("`", "``", $tableName) . "`";

		$query = "SELECT * FROM $tableNameParam LIMIT ?"; //fixme: validate $tableName
		$stmt = $pdo->prepare($query);

		$stmt->bindValue(1, $num, \PDO::PARAM_INT);
		// $stmt->debugDumpParams();
		$stmt->execute();

		$result = array();
		while ($row = $stmt->fetch()) {
			array_push($result, $row);
		}

		return $result;

	}

	/**
	 * describeTable get information about structure of table in DB
	 * @param  string $tableName napme of table
	 * @return array            array of query's result
	 */
	public static function describeTable($tableName) {
		$pdo = self::pdoInit();
		$query = 'DESCRIBE :name';
		$stmt = $pdo->prepare($query);
		$stmt->execute(array(':name' => $tableName));

		$result = array();

		while ($row = $stmt->fetch()) {
			array_push($result, $row);
		}
		$stmt->closeCursor();
		return $result;
	}
}
