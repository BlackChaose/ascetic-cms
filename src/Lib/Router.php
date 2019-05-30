<?php
namespace AsceticCMS\Lib;

//TODO: post, put, patch, delete
//TODO: string templates.. for example:  '/users/id/:$num' or '/users/:$name/address/:$country/:$town/:$street' ... etc.
class Router
{
    private function checkRoute($route)
    {
        //fixme
    }
    public static function get($str, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            return false;
        }

        if ((empty($_SERVER['REQUEST_URI']) || $_SERVER['REQUEST_URI'] == '/') && $str == '') {
            return $callback;
        } else if (!empty($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] == $str) {
            return $callback;
        } else if (Request::cmpPlaceholder($str, $_SERVER['REQUEST_URI'])) {
            return $callback;

        } else {
            return false;
        }
    }

    public static function post($str, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['_method'])) {
            return $callback;
        }
    }

    public static function put($str, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && strtoupper($_POST['_method']) === 'PUT') {
            return $callback;
        } else {
            return false;
        }

    }

    public static function patch($str, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && strtoupper($_POST['_method']) === 'PATCH') {
            return $callback;
        } else {
            return false;
        }
    }

    public static function delete($str, $callback)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && strtoupper($_POST['_method']) === 'DELETE') {
            return $callback;
        } else {
            return false;
        }
    }

}
