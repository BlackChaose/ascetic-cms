<?php
/**
 * Ascetic-CMS App
 * Продумать логику - создание объекта App , прописывание  маршрутоа, обработка теукущего  и рендер после запуска App->run(); 
 */

namespace AsceticCMS\Lib;

class App 
{
    const VERSION = '0.1.1';
    public $callbackArray=[];
    public function showInfo()
    {
        return self::VERSION;
    }
    
    public function sayHello(){
        return "Hello!";
    }

    public function get($str, $callback){
        if(Router::get($str, $callback)){
            array_push($this->callbackArray,$callback);      
       
        }
    }

    //FIXME - refactor + valid headers! // without REDIREC_URL NOTICE - not index!!! - FIX IT!
    public function run(){
        if (count($this->callbackArray) === 0){
            echo "ERROR 404. Nof found!";            
            return false;
        } else if(count($this->callbackArray) === 1){
            $callFunc=array_pop($this->callbackArray);
            call_user_func($callFunc);        
            return true;
        }else {
            echo "Error 500! Server Error!";
            return false;
        }
    }
}