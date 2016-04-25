<?php

include_once '../BaseEntity.php';

class User extends BaseEntity {
	protected $id;
	protected $name;
	protected $password;
	protected $qq;
	protected $email;
	protected $phone;
	protected $thirdAuth;
	protected $createTime;
	
	public function setId($_id) {
		$this->id = $_id;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setName($_name){
	    $this->name = $_name;
	}
	
	public function getName() {
	    return $this->name;
	}
	
	public function setPassword($_password) {
	    $this->password - $_password;
	}
	
	public function getPassword() {
	    return $this->password;
	}
	
	public function setQq($_qq){
	    $this->qq = $_qq;
	}
	
	public function getQq() {
	    return $this->qq;
	}
	
	public function setEmail($_email) {
	    $this->email = $_email;
	}
	
	public function getEmail() {
	    return $this->email;
	}
	
	public function setPhone($_phone) {
	    $this->phone = $_phone;
	}
	
	public function getPhone() {
	    return $this->phone;
	}
	
	public function setThirdAuth($_thirdAuth) {
	    $this->thirdAuth = $_thirdAuth;
	}
	
	public function getThirdAuth() {
	    return $this->thirdAuth;
	}	
	
	public function setCreateTime($_createTime) {
		$this->createTime = $_createTime;
	}
	
	public function getCreateTime() {
		return $this->createTime;
	}
}
?>