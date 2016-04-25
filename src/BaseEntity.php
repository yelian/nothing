<?php
	include_once 'StringUtils.php';
	class BaseEntity {
		private $__primaryKeys;
		private $__cause = 'acause';
		
		public function setPrimaryKeys($_primaryKeys) {
			$this -> __primaryKeys = $_primaryKeys;
		} 
		
		public function getPrimaryKeys() {
			return $this -> __primaryKeys;
		}
		
		public function setCause($_cause) {
			$this -> __cause = $_cause;
		}
		
		public function getCause() {
			return $this -> __cause;
		}

		function toArray(){
			$retArray = array();
			foreach($this as $key=>$value) {	
				if(isset($this -> $key) && $key != "__cause" && $key != "__primaryKeys") {
					//$retArray[$key] = $value;
					$colName = StringUtils :: convertCamelToUnderLine($key, false);
					$retArray[$colName]  = $value;
				} /*else {
					unset($array[$key]);
				}*/
			}
			
			/*if(array_key_exists("__cause", $array)) {
				unset($array["__cause"]);
			}
			if(array_key_exists("__primaryKeys", $array)) {
				unset($array["__primaryKeys"]);
			}*/
			return $retArray;
		}
		
		function toArrayPropertyWithColon(){
			$retArray = array();
			foreach($this as $key=>$value) {	
				if(isset($this -> $key) && $key != "__cause" && $key != "__primaryKeys") {
					//$retArray[$key] = $value;
					$colName = StringUtils :: convertCamelToUnderLine($key, false);
					$retArray[":" . $colName]  = $value;
				} /*else {
					unset($array[$key]);
				}*/
			}
			
			/*if(array_key_exists("__cause", $array)) {
				unset($array["__cause"]);
			}
			if(array_key_exists("__primaryKeys", $array)) {
				unset($array["__primaryKeys"]);
			}*/
			return $retArray;
		}

		function toObject($source) {
			foreach($source as $key=>$val) {
				$propertyName = StringUtils::convertUnderLineToCamel($key, false);
				$this->$propertyName = $val;
			}
		}
	}
?>