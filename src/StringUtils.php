<?php
class StringUtils {

	public static function convertUnderLineToCamel ($str , $ucfirst = true) {
		$str = ucwords(str_replace('_', ' ', $str));
		$str = str_replace(' ','',lcfirst($str));
		return $ucfirst ? ucfirst($str) : $str;
	}
	
	public static function convertCamelToUnderLine ($str, $linefirst = true) {
		//$ret = strtolower(preg_replace('/((?<=[a-z])(?=[A-Z]))/', '_', $str));
		$len = strlen($str);
		$ret = '';
		for($index=0; $index<$len; $index++) {
			if(strnatcmp($str[$index], 'A') >= 0  && strnatcmp($str[$index], 'Z') <= 0) {
				if($index == 0 && !$linefirst)
					$ret .= strtolower($str[$index]);
				else
					$ret .= '_' . strtolower($str[$index]);
			} else {
				$ret .= $str[$index];
			}
		}
		
		return $ret;
	}	
	
	/*public static $querySQLStr = "select * from ";
	public static $insertSQLStr = "select * from ";
	public static $updateSQLStr = "select * from ";
	public static $deleteSQLStr = "select * from ";*/
}
?>