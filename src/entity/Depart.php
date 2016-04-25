<?php
include_once 'BaseEntity.php';
class Depart extends BaseEntity{
	protected $id;
	protected $departCode;
	protected $departName;
	protected $parentId;
	protected $createTime;
	protected $updateTime;
	
	public function setId($_id) {
		$this->id = $_id;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setDepartCode($_departCode) {
		$this->departCode = $_departCode;
	}
	
	public function getDepartCode() {
		return $this->departCode;
	}
	
	public function setDepartName($_departName) {
		$this->departName = $_departName;
	}
	
	public function getDepartName() {
		return $this->departName;
	}
	
	public function setParentId($_parentId) {
		$this->parentId = $_parentId;
	}
	
	public function getParentId() {
		return $this->parentId;
	}
	
	public function setCreateTime($_createTime) {
		$this->createTime = $_createTime;
	}
	
	public function getCreateTime() {
		return $this->createTime;
	}
	
	public function setUpdateTime($_updateTime) {
		$this->updateTime = $_updateTime;
	}
	
	public function getUpdateTime() {
		return $this->updateTime;
	}
}
?>