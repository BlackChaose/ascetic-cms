<?php
namespace AsceticCMS\Lib;
//TODO: post, put, patch, delete
//TODO: string templates.. for example:  '/users/id/:$num' or '/users/:$name/address/:$country/:$town/:$street' ... etc.
class Router{
    private function checkRoute($route){
        //fixme
    }
    public function get($str, $callback){
        if($_SERVER['REQUEST_METHOD'] !== 'GET'){
            return false;
        }       
        if((empty($_SERVER['REQUEST_URI']) || $_SERVER['REQUEST_URI']=='/') && $str == ''){
            return $callback;
        }else if(!empty($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] == $str){      
            return $callback;
        }
        else return false;
    }

    public function post($str, $callback){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['_method'])){
            return $callback;
        }
    }

    public function put($str, $callback){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && strtoupper($_POST['_method']) === 'PUT'){
            return $callback;            
        }else {
            return false;
        }

    }

    public function patch($str, $callback){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && strtoupper($_POST['_method']) === 'PATCH'){
            return $callback;            
        }else {
            return false;
        }
    }

    public function delete($str, $callback){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && strtoupper($_POST['_method']) === 'DELETE'){
            return $callback;            
        }else {
            return false;
        }
    }

}
