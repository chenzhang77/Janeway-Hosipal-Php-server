<?php
$servername = "winemocolnet.ipagemysql.com";
$username = "janeway";
$password = "janeway_wine22";
$database = "janeway";

$table = "test1";


$conn = new mysqli($servername, $username, $password, $database);


if (mysqli_connect_error()) {
	die("Database connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";



$sql = "INSERT INTO user(email,password) VALUES('123@123.com','123')";

if ($conn->query($sql) === TRUE) {
	echo "Table MyGuests created 3 successfully";
} else {
	echo "Error creating table: " . $conn->error;
}

$conn->close();
?>