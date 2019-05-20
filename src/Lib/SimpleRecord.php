<?php

namespace AsceticCMS\Lib;

/* CREATE USER 'ascetic_user'@'localhost' IDENTIFIED BY 'ascetpasskey12!'; */
class SimpleRecord{
    public $config = array();
    public function __construct(){
        $this->config['db'] = 'ascetic_cms';
        $this->config['user'] = 'ascetic_user';
        $this->config['passkey'] = 'ascetpasskey12!';
        $this->config['host'] = 'localhost';
        $this->config['charset'] = 'utf8';
    }

    public function readTable(string $tbl){
        $dsn = "mysql:host=$this->config['host'];dbname=$this->config['db'];charset=$this->config['charset']";
        $opt = [
            \PDO::ATTR_ERRMODE   => \PDO::ERRMODE_EXCEPTION,
            \PDO:: ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => true,
        ];
        $pdo = new \PDO($dsn, $this->config['user'], $this->config['passkey'], $opt);

        $stmt = $pdo->query('SELECT * FROM users');
        $result = '';
        while ($row = $stmt->fetch())
            {
                $result.= $row[''] . "\n";
            }
                
        return $result;    
    }
}