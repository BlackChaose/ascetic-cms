<?php
namespace AsceticCMS\Lib;

//TODO: render templates. maybe you should use simpleXML lib or another libs. Think it!
class Render
{
    private $buf = array();

    /**
     * @param $path - path to file *.tpl
     *  
     */
    public function run($path)
    {
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

    public function show()
    {
        return $this->buf;
    }

    public function convert($data)
    {
        return $data;
    }

    /**
     * include file with view, *.php
     * forward data to view
     */

    public static function renderView($data, $ViewName)
    {
        $path = __DIR__ . "/../MVC/Views/" . $ViewName;

        $conf = array();
        $arr = json_decode($data);
        print_r($arr); die;
        if (is_array($arr) && file_exists($path)) {
            $conf = $arr;
            include($path);
        }
        throw new \Exception('invalid params in Render::renderView();');
    }
}
