<?php

namespace AsceticCMS\Lib;
/**
 * @fixme  - not work!
 */
class ErrorsHandler
{ 
    public static function saveLog(\Exception $e)
    {
        $path = __DIR__."/../log/error.log";
        try
        {
            $msg = date("Y-m-d H:i:s")." : "."src: ".__FILE__." message: ".$e->getMessage();
            $ff = file_put_contents($path, $msg, FILE_APPEND);
            if(!$ff){
                throw new \Exception("File error.log not access for write!");
            }
        }
        catch(Exception $e){
            print "Error in ErrorHandler! ".$e->getMessage();
        }
    }
}
