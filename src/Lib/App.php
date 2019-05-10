<?php
/**
 * Ascetic-CMS
 */

namespace AsceticCMS\Lib;

class App 
{
    const VERSION = '0.1.1';

    public function showInfo()
    {
        return self::VERSION;
    }
    
    public function sayHello(){
        return "Hello!";
    }

    public function get($str, $callback){
        return Router::get($str,$callback);
    }
}