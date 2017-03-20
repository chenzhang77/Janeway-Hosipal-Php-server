<?php
include_once 'dbconnect.php';

$action = $_GET['action'];
if(strcmp($action,'totalNum') == 0) {
	
	$time = $_GET['time'];

	$res=mysql_query("SELECT COUNT(*) FROM notification where time > '$time' " ) or die("Query failed: ".mysql_error() );
	
	$item = new stdClass;
	$row=mysql_fetch_array($res);
	$item->count =$row['COUNT(*)'];
	echo json_encode($item);
	
} 
else if (strcmp($action,'IDarray') == 0) {
	
	$time = $_GET['time'];
	$limit = $_GET['limit'];
	$offsetvalue = $_GET['offset'];
	$res=mysql_query("SELECT * FROM notification where time > '$time' ORDER BY time DESC LIMIT $limit OFFSET $offsetvalue" ) or die("Query failed: ".mysql_error() );
	$array = array();
	
	while ($value = mysql_fetch_assoc($res)) {
	
		$item = new stdClass;
		$item->itemID = $value['id'];
		array_push($array, $item);
	
	}
	echo json_encode($array);
}
else if (strcmp($action,'detail') == 0) {
	
	$id = $_GET['id'];

	$res=mysql_query("SELECT * FROM notification where id=$id" ) or die("Query failed: ".mysql_error() );
	$value = mysql_fetch_assoc($res);
	
	$item = new stdClass;
	$item->itemID = $value['id'];
	$item->imageID = $value['imageID'];
	$item->title = $value['title'];
	$item->detail = $value['detail'];
	$item->time = $value['time'];
	
	
	echo json_encode($item);
}
else if (strcmp($action,'image') == 0) {
	
	echo 'image download';
}
else {
		
	echo 'wrong action';
}





?>



