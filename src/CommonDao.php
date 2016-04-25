<?php
//include_once 'Student.php';
include_once 'StringUtils.php';
//include_once 'entity/Area.php';
include_once 'PageCount.php';
//include_once 'entity/Depart.php';
class CommonDao{
	function getConnection(){
	    $dbconfigresource = include_once('../../config/config.php');
	    $dbconfig = $dbconfigresource['db-config'];
		$dsn = "mysql:host=" . $dbconfig['ip'] . ";dbname=" . $dbconfig['database'] . ";charset=" . $dbconfig['charset'];
		$dbh = null;
		try{
			$dbh=new PDO($dsn,$dbconfig['user'],$dbconfig['password']);
		} catch(PDOException $e) {
			echo '数据库连接失败：' . $e->getMessage();
		}
		return $dbh;
	}
	
	function select($object, $pageCount) {
		$ret = array();
		
		$page = $pageCount->getPage();		
		$pageCounts = $pageCount->getPageCount();
		$offset = ($page - 1) * $pageCounts;
		$querySql = $this->getQuerySql($object) . " limit $offset, $pageCounts;";
		
		$conn = $this->getConnection();	
		$result = $conn->prepare($querySql);
		$success = $result->execute($object->toArrayPropertyWithColon());
		if($success) {
			$col = $result->fetchAll(PDO::FETCH_OBJ);
			if(!$result) {
				die('query error');
			}
			if(!is_null($col)) {
				foreach($col as $row) {
					$queryResultObject = new Area();
					$queryResultObject->toObject($row);
					$ret[] = $queryResultObject;
				}
			}
		}	
		return $ret;
	}
	
	/*
	数据库对象插入，对象必须继承BaseEntity。
	*/
	function insert($object) {
		$sql = $this->getInsertSql($object);		
		$conn = $this->getConnection();	
		$prepare = $conn->prepare($sql);
		$success = $prepare->execute($object->toArrayPropertyWithColon());
		if($success) {
			echo 'insert success!';
		}
	}
	
	function update($object, $criteriaObject) {
		$sql = $this->getUpdateSql($object, $criteriaObject);
		$conn = $this->getConnection();	
		$prepare = $conn->prepare($sql);
		
		$arrays = array();
		$toUpdateColArray = $object->toArray();
		$updateCauseArray = $criteriaObject->toArray();
		foreach($toUpdateColArray as $key=>$val) {
			$arrays[":" . $key . "U"] = $val;
		}		
		
		foreach($updateCauseArray as $key=>$val) {
			$arrays[":" . $key . "C"] = $val;
		}
		
		$success = $prepare->execute($arrays);
		if($success) {
			echo 'update success!';
		}
	}
	
	function del($object) {
		$sql = $this->getDeleteSql($object);
		$conn = $this->getConnection();	
		$prepare = $conn->prepare($sql);
		var_dump($prepare);
		var_dump($object->toArrayPropertyWithColon());
		$success = $prepare->execute($object->toArrayPropertyWithColon());
		if($success) {
			echo 'delete success!';
		} else {
			echo 'delete fail!';
		}
	}
	
	function getQuerySql($object){
		$class = get_class($object);
		echo "in getQuerySql " . PHP_EOL;
		$tableName = StringUtils::convertCamelToUnderLine($class, false);
		$setPropertyArray = $object->toArray();
		$sql = "select * from " . $tableName . " where ";
		$isFirst = true;
		foreach($setPropertyArray as $key=>$val) {
			if($isFirst) {				
				$isFirst = false;
			} else {
				$sql .= " and ";
			}
			$sql .= " $key = :$key";
		}
		return $sql;
	}
	
	function getInsertSql($object) {
		$class = get_class($object);
		$tableName = StringUtils::convertCamelToUnderLine($class, false);
		$sql = "insert into " . $tableName;
		
		$propertyArray = $object->toArray();
		$cols = "";
		$colsVals = "";
		$first = true;
		foreach($propertyArray as $key=>$val) {
			if($first) {
				$first = false;
				$cols .= $key;
				$colsVals .= ":" . $key;
			} else {
				$cols .= ", " . $key;
				$colsVals .= ", :" . $key;
			}
		}
		$sql .= " ($cols) values ($colsVals)";
		return $sql;
	}
	
	function getUpdateSql($object, $criteriaObject) {
		$class = get_class($object);
		$tableName = StringUtils::convertCamelToUnderLine($class, false);
		$sql = "update " . $tableName . " set ";
		$toUpdateColArray = $object->toArray();
		$updateCauseArray = $criteriaObject->toArray();
		
		$first = true;
		foreach($toUpdateColArray as $key=>$val) {
			if($first) {
				$first = false;
				$sql .= "$key=:{$key}U";
			} else {
			$sql .= " ,$key=:{$key}U";
			}
		}
		$first = true;
		
		$sql .= " where ";
		foreach($updateCauseArray as $key=>$val) {
			if($first) {
				$first = false;
				$sql .= "$key=:{$key}C";
			} else {
				$sql .= " and $key=:{$key}C";
			}
		}
		return $sql;
	}
	
	function getDeleteSql($object){
		$class = get_class($object);
		$tableName = StringUtils::convertCamelToUnderLine($class, false);
		$sql = "delete from " . $tableName . " where ";
		
		$propertyArray = $object->toArray();
		$first = true;
		foreach($propertyArray as $key=>$val) {
			if($first) {
				$first = false;
				$sql .= "$key=:{$key}";
			} else {
				$sql .= " and $key=:{$key}";
			}
		}
		return $sql;
	}	
}

function testSelect() {
	header("Content-type: text/html; charset=utf-8"); 
	$CommonDao = new CommonDao();
	$area = new Area();
	//$area->setId("b41f1124-4864-1034-82c2-22c67e253dc2");
	//$area->setAreaCode("110103");
	$area->setParentId("b40d3bfb-4864-1034-82c2-22c67e253dc2");
	$area -> setCause("1=1");
	var_dump($area);
	//echo $area->getAge() . PHP_EOL;
	echo $area->getCause();
	echo "<br> ";
	var_dump($area -> toArray());
	$pageCount = new PageCount();
	$pageCount->setPage(0);
	$pageCount->setPageCount(6);
	$CommonDao->select($area, $pageCount);
}

function testInsert() {
	header("Content-type: text/html; charset=utf-8"); 
	$depart = new Depart();
	$depart->setId("111111111111");
	$depart->setDepartCode("gjj");
	$depart->setDepartName("公积金");
	$depart->setCreateTime(time());
	
	$commonDao = new CommonDao();
	$commonDao->insert($depart);
}


function testUpdate() {
	header("Content-type: text/html; charset=utf-8"); 
	$depart = new Depart();
	$depart->setId("111111111111");
	$depart->setDepartCode("gjj1");
	$depart->setDepartName("公积金1");
	$depart->setCreateTime(time());
	
	$departc = new Depart();
	$departc->setId("111111111111");
	$departc->setDepartCode("gjj");
	
	$commonDao = new CommonDao();
	$commonDao->update($depart, $departc);
}

function testDelete() {
	header("Content-type: text/html; charset=utf-8"); 
	$depart = new Depart();
	$depart->setId("111111111111");
	$depart->setDepartCode("gjj1");
	$depart->setDepartName("公积金1");
	
	$commonDao = new CommonDao();
	$commonDao->del($depart);
}
//testDelete();
?>