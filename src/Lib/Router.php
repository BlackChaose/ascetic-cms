<?php
namespace AsceticCMS\Lib;

class Router{
    private function checkRoute($route){
        //FIXME: !
    }
    public function get($str, $callback){
        if($_SERVER['REDIRECT_URL']===$str){            
            return call_user_func($callback);;
        }
        else return false;
    }

    public function post(){

    }

    public function put(){


    }

    public function patch(){

    }

    public function delete(){

    }

}