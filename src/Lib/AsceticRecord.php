<?php

namespace AsceticCMS\Lib;

/* CREATE USER 'ascetic_user'@'localhost' IDENTIFIED BY 'ascetpasskey12!'; */
class AsceticRecord{
    public $config = array();
    public function __construct(){

        $this->config['login']='ascetic_user';
        $this->config['passkey']='ascetpasskey12!';
        $this->config['address']='localhost';
    }

    public function readTable(string $tbl){
        $conn = new mysqli('users',$this->config['login'], $this->config['passkey']);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
        $sql = "SELECT * FROM users";
        $result = $con->query($sql);
        $conn->close();
        return $result;    
    }
}