<?php
namespace AsceticCMS\Lib;

//TODO: render templates. maybe you should use simpleXML lib or another libs. Think it!
class Render{
    private $buf;
    public function run($path){
        $handle = fopen($path, "r");
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                array_push($buf, convert($line));
            }
            fclose($handle);
            } else {
                // error opening the file.
            } 
    }

    public function convert($data){

    }
}