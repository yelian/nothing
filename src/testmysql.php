<?php 
$conn = getConnection();

$query = "select * from area limit 0, 10";
$result = query($conn, $query);

if(!$result) {
	die('query error');
}

header("Content-type: text/html; charset=utf-8"); 
foreach($result as $row) {
	//var_dump($row);
	//echo "id is: " . $row['area_name'] . " <br/>"	;
	echo '  id is : ' . $row['id'];
	echo '  name is : ' . $row['area_name'];
	echo '  code is : ' . $row['area_code'];
	echo '<br/>';
}

function getConnection(){
	$dsn = 'mysql:host=localhost;dbname=nothing;charset=utf8';
	$dbh = null;
	try{
		$dbh=new PDO($dsn,'root','');
	} catch(PDOException $e) {
		echo '数据库连接失败：' . $e->getMessage();
	}
	return $dbh;
}

function query($conn, $sql){
	return $conn->query($sql);
}