<?php
namespace AsceticCMS\Lib;

//TODO: render templates. maybe you should use simpleXML lib or another libs. Think it!
class Render{
    private $buf = array();
    public function run($path){
        $handle = fopen($path, "r");
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                $res = trim(preg_replace('/\t+/', '', $line));
                array_push($this->buf, $this->convert($res));
            }
            fclose($handle);
            } else {
                // error opening the file.
                array_push($this->buf, 'Error open file!');
            } 
    }

    public function show(){
        return $this->buf;
    }

    public function convert($data){
        return $data;
    }
}