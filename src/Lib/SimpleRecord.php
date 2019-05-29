<?php

namespace AsceticCMS\Lib;

/* CREATE USER 'ascetic_user'@'localhost' IDENTIFIED BY 'ascetpasskey12!'; */
class SimpleRecord{
    public function pdoInit(){
      $file_path = __DIR__."/../../config/config.php";
      if(file_exists($file_path)){
        require_once($file_path);
      }else {
        throw new Exception("configuration file not exist!!! check your config!");
      }
      $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET;
      $opt = [
          \PDO::ATTR_ERRMODE   => \PDO::ERRMODE_EXCEPTION,
          \PDO:: ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
          \PDO::ATTR_EMULATE_PREPARES => true,
      ];
      $pdo = new \PDO($dsn, DB_USER_LOGIN, DB_USER_PASSKEY, $opt);
      return $pdo;
    }

    public function readTable(string $tableName){
        $pdo = $this->pdoInit();
        $query='SELECT * FROM '.$tableName;
        $stmt = $pdo->query($query);
        $result = array();
        while ($row = $stmt->fetch())
            {
                array_push($result, $row);
            }

        return $result;
    }

    public function describeTable($tableName){
      $pdo = self::pdoInit();
      $query = 'DESCRIBE '.$tableName;
      $stmt = $pdo->query($query);
      $result = array();
      while($row = $stmt->fetch())
      {
        array_push($result, $row);
      }
      return $result;
    }
}
