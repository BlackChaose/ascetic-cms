<?php
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
    }
}
