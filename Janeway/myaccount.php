<?php
session_start();
include_once 'login/dbconnect.php';



$res=mysql_query("SELECT * FROM customer JOIN vehicle ON customer.v_id=vehicle.v_id WHERE customer.c_id=9");
$Row=mysql_fetch_array($res);
$d1=strtotime($Row['w_start']);
		$d2=strtotime($Row['w_end']);
		$d3= $d2-$d1;
		$wleft = floor($d3 / (60*60*24) );

?>
<!DOCTYPE html>
<html>

<head>
<title>Vehicle Mnagement System</title>
<link href="css/custom.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet"  type="text/css" href="css/bootstrap.min.css"/>
<script rel="stylesheet" src="js/main.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>

<div class="header">
	<div class="logo"><a href="#"><img src="images/logo1.png" alt="" height="90px"/></a></div>
			<div class="navigation">
				<nav class="navbar navbar-inverse navbar-fixed">
				  <div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						  <ul class="nav navbar-nav">
						  <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
						  <li><a href="#">About us</a></li>
							<li><a href="#">Contacts</a></li>
						  
						  </ul>
						  <ul class="nav navbar-nav navbar-right">
							<li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
						  </ul>
						  
						</div>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>
</div>


</body>
</html>