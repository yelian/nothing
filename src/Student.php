<?php
include_once 'BaseEntity.php';
class Student extends BaseEntity {
	protected $name;
	protected $age;
	protected $certType;
	
	public function setName($names){
		$this->name = $names;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function setAge($ages){
		$this->age = $ages;
	}
	
	public function getAge() {
		return $this->age;
	}
	
	public function setCertType($_certType) {
		$this->certType = $_certType;
	}
	
	public function getCertType() {
		return $this->certType;
	}
	
	/*public function __call($name, $arguments) {
		$action = substr($name, 0, 3);
		switch ($action) {
			case 'get':
				$property = strtolower(substr($name, 3));
				if(property_exists($this, $property)){
					return $this->{$property};
				}else{
					$trace = debug_backtrace();
					trigger_error('Undefined property  ' . $name . ' in ' . $trace[0]['file'] . ' on line ' . $trace[0]['line'], E_USER_NOTICE);
					return null;
				}
				break;
			case 'set':
				$property = strtolower(substr($name, 3));
				if(property_exists($this,$property)){
					$this->{$property} = $arguments[0];
				}else{
					$trace = debug_backtrace();
					trigger_error('Undefined property  ' . $name . ' in ' . $trace[0]['file'] . ' on line ' . $trace[0]['line'], E_USER_NOTICE);
					return null;
				}
				
				break;
			default :				
				if(method_exists($this, $name) || method_exists($this->parent, $name)){
					echo 'aaaaaaaaaaaaa';
					return $this->$name();
				}
				return FALSE;
		}
	}*/
}
?>