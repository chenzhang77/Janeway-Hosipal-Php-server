<?php


class ServiceAPI {

    private $db;

    // Constructor - open DB connection
    function __construct() {
        $this->db = new mysqli('winemocolnet.ipagemysql.com', 'janeway', 'janeway_wine22', 'janeway');
        //$this->db->autocommit(FALSE);
    }

    // Destructor - close DB connection
    function __destruct() {
        $this->db->close();
    }


    function Test() {
    	//...
    	echo "Test ";
    	$query = "INSERT INTO user(email,password) VALUES('123@123.com','123')";
    	$result = mysqli_query($db, $query);
    	//mysql_query("INSERT INTO user(email,password) VALUES('123@123.com','123')");
    	//$count=mysql_query("SELECT COUNT(*) FROM user") or die("Query failed: ".mysql_error());
    	//$count2=mysql_query("SELECT COUNT(*) FROM notification") or die("Query failed: ".mysql_error());
    	//echo "Sorry, a  there was an error uploading your file. $count";
    	echo "$result";
    }
}


$api = new ServiceAPI;
$reqType = $_POST["req"];
$api->Test();


?>
