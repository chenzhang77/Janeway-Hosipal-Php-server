<?php include("header.php");?>
<?php
$res=mysql_query("SELECT * FROM notification ORDER BY time DESC LIMIT 15 ") or die("Query failed: ".mysql_error());
$count=mysql_query("SELECT COUNT(*) FROM notification") or die("Query failed: ".mysql_error());
$row=mysql_fetch_array($count);
//$row['COUNT(*)'];
$currentPage = 1;
?>


Hello
