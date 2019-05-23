<?php
<<<<<<< HEAD
namespace AsceticCMS\Lib;

/**
 * ErrorsHandler Class
 * 
 * @version 0.1.0
 * 
 * @param - path to log file, defined '../logs/error.log' * 
 */

class ErrorsHandler
{
    public static function saveLog($e)
    {
        $pathToFile = __DIR__.'/../logs/error.log';
        $message = $e->getMessage();

        $msg = date('Y-m-d H:i:s') . "src : " . __FILE__ . " Error Message : " . $message . "\n";
        $result = file_put_contents($pathToFile, $msg, FILE_APPEND);
        
        if (!$result) {
            throw new \Exception("write logfile error! src: " . __FILE__);
        }

        print "<strong style=\"color: tomato; font-size: large; \">Error... see errors.log!!!</strong>";
=======

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
            $msg = date("Y-m-d H:i:s")." : "."Exception ".$e->getMessage()." on line ".$e->getLine()." in file: ".$e->getFile()."\n trace: ".$e->getTraceAsString()."\n";
            $ff = file_put_contents($path, $msg, FILE_APPEND);
            if(!$ff){
                throw new \Exception("File error.log not access for write!");
            }
        }
        catch(Exception $e){
            print "Error in ErrorHandler! ".$e->getMessage();
        }
>>>>>>> 650eb7b822ad500ba8d101a58a207a04ea862fb7
    }
}
