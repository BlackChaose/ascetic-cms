<?php
namespace AsceticCMS\Lib;

//
// TODO: get query params, get type of request, validation request (?)
//
class Request {
	/**
	 * method for parse placeholder from query string in request
	 * @return array placeholder :name = > value
	 */
	public static function getPlaceholderValue() {
		$res = '';
		$matches = [];
		if (isset($_SERVER["request_uri"])) {
			$res = preg_match('/\/(.*)\/(.*)\/(.*)/', 'foobarbaz', $matches, PREG_OFFSET_CAPTURE);
			return $res[1];
		}
	}

	/**
	 * method for check mask and path (see routers for api etc.)
	 * @param  string    mask
	 * @param  string    stroke
	 * @return mix: array|false
	 */
	public static function cmpPlaceholder($mask, $strip) {
		$arrMask = explode('/', trim($mask));
		$arrStrip = explode('/', trim($strip));

		if (count($arrMask) !== count($arrStrip)) {
			return false;
		}

		$buf = array();

		for ($i = 0; $i < count($arrMask); $i++) {
			if ($arrMask[$i] === $arrStrip[$i]) {
				continue;
			} else if ($arrMask[$i][0] === ":") {

				$name = preg_replace('/\:/', '', $arrMask[$i]);
				$buf["$name"] = $arrStrip[$i];
				continue;
			} else {
				return false;
			}
		}
		return $buf;
	}
}
