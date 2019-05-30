<?php
namespace AsceticCMS\Lib;

//TODO: get query params, get type of request, validation request (?)
class Request
{

    public static function getPlaceholderValue()
    {
        $res = '';
        $matches = [];
        if (isset($_SERVER["request_uri"])) {
            $res = preg_match('/\/(.*)\/(.*)\/(.*)/', 'foobarbaz', $matches, PREG_OFFSET_CAPTURE);
            return $res[1];
        }
    }

    public static function cmpPlaceholder($mask, $strip)
    {
        $arrMask = explode('/', trim($mask));
        $arrStrip = explode('/', trim($strip));

        if (count($arrMask) !== count($arrStrip)) {
            //print(get_class() . " say: arrMask !== arrStrip!" . " return false! <br>");
            return false;
        }

        $buf = array();

        for ($i = 0; $i < count($arrMask); $i++) {
            if ($arrMask[$i] === $arrStrip[$i]) {
                //print(get_class() . " say: arrMask[i] == arrStrip[i] !" . "<br>");
                continue;
            } else if ($arrMask[$i][0] === ":") {
                //print(get_class() . " say: find placeholder!" . "<br>");
                $name = preg_replace('/\:/', '', $arrMask[$i]);
                $buf["$name"] = $arrStrip[$i];
                //print(get_class() . " say: " . $name . " = " . $arrStrip[$i] . "<br>");
                continue;
            } else {
                //print(get_class() . " say: false! not matches!" . " return false!<br>");
                return false;
            }
        }

        // print(get_class() . " say: ");
        // print_r($buf);
        // print(" sended! <br>");

        return $buf;
    }
}
