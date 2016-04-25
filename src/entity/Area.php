<?php
class Area extends BaseEntity {
	protected $id;
	protected $areaCode;
	protected $areaName;
	protected $parentId;
	protected $createTime;
	protected $updateTime;
	
	public function setId($_id) {
		$this->id = $_id;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setAreaCode($_areaCode) {
		$this->areaCode = $_areaCode;
	}
	
	public function getAreaCode() {
		return $this->areaCode;
	}
	
	public function setAreaName($_areaName) {
		$this->areaName = $_areaName;
	}
	
	public function getAreaName() {
		return $this->areaName;
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