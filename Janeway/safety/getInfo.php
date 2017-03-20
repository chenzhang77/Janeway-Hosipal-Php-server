<?php
include_once '../login/dbconnect.php';
header("Content-Type: application/json; charset=UTF-8");

$type=$_GET['type'];


if($type == 'numberofItems') {
	
	$since=$_GET['since'];
	
	//echo $since;
	
	$count=mysql_query("SELECT COUNT(*) FROM notification where time > '$since'") or die("Query failed: ".mysql_error());
	$row=mysql_fetch_array($count);
	//echo $row['COUNT(*)'];
	$arr = array('count' => $row['COUNT(*)']);	
	echo json_encode($arr);
	
} else if ($type == 'idarray') {
	
	$since=$_GET['since'];	
	$res=mysql_query("SELECT id FROM notification where time > '$since' ORDER BY time ASC ") or die("Query failed: ".mysql_error() );	
	$rows = array();
	while($r = mysql_fetch_array($res)) {
		$rows[]['itemID'] = $r['id'];
	}
	print json_encode($rows);

	
} else if ($type == 'message') {
	
	$id=$_GET['id'];	
	$res=mysql_query("SELECT * FROM notification where id = '$id' ") or die("Query failed: ".mysql_error() );
	$item = mysql_fetch_assoc($res);	
	$arr = array('itemID' => $item['id'], 'imageId' => $item['imageID'], 'title' => $item['title'], 'detail' => $item['detail'],'time' => $item['time']);	
	echo json_encode($arr);
}
?>