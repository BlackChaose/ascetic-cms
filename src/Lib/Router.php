<?php
namespace AsceticCMS\Lib;

//TODO: post, put, patch, delete
//TODO: string templates.. for example:  '/users/id/:$num' or '/users/:$name/address/:$country/:$town/:$street' ... etc.
class Router {
	private function checkRoute($route) {
		//fixme
	}

	/**
	 * function for requset GET with path
	 * @param   string           path
	 * @param   callback function
	 * @return  mix callable function | false
	 */
	public static function get($str, $callback) {
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

	/**
	 * function for handle request POST with path *
	 * @todo        add functional
	 * @param  sting
	 * @param  callback function
	 * @return mix callback | false
	 */
	public static function post($str, $callback) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST['_method'])) {
			return $callback;
		}
	}

	/**
	 * function for handle request PUT with path * *
	 * @todo        add functional
	 * @param  string
	 * @param  callback function
	 * @return mix false | callback
	 */
	public static function put($str, $callback) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && strtoupper($_POST['_method']) === 'PUT') {
			return $callback;
		} else {
			return false;
		}

	}

	/**
	 * function for handle request PATCH with path *
	 * @todo     add functional
	 * @param  string
	 * @param  callback function
	 * @return mix false | callback
	 */
	public static function patch($str, $callback) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && strtoupper($_POST['_method']) === 'PATCH') {
			return $callback;
		} else {
			return false;
		}
	}

	/**
	 * function for handle request DELETE with path * *
	 * @todo     add functional
	 * @param  [type]
	 * @param  [type]
	 * @return [type]
	 */
	public static function delete($str, $callback) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && strtoupper($_POST['_method']) === 'DELETE') {
			return $callback;
		} else {
			return false;
		}
	}

}
