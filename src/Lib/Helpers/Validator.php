<?php
namespace AsceticCMS\Lib\Helpers;

class Validator {
	private static $whiteListSQL = array(
		'NameOrg',
	);
	public static function tableNameValidate($param) {

	}
	public static function prepareString($param) {
		if (!preg_match('/^[A-Za-z][A-Za-z0-9_]*$/', $param)) {
			throw new AppSpecificSecurityException("Possible SQL injection attempt.");
		} else {
			return $param;
		}
	}
	public static function chkWhiteList($param) {
		if (in_array($param, self::$whiteListSQL)) {
			return true;
		} else {
			return false;
		}
	}
}
