<?php
session_start();
include_once 'login/dbconnect.php';

if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$pass = mysql_real_escape_string($_POST['password']);
	
	$res=mysql_query("SELECT * FROM user WHERE email='$email'");
	$row=mysql_fetch_array($res);
	$count = mysql_num_rows($res); 
	
	if($count == 1 && $row['password']== $pass)
	{
		$_SESSION['userID'] = $row['id'];
		header("Location: login/list.php");
	}
	else
	{
?>
    <script>alert('Username or Password Is Wrong !');</script>
<?php
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>JANEWAY ADMIN LOGIN</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="login/css/styles.css" rel="stylesheet">
</head>
<body>
	<div class="loinpage">
		<div class="mar">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Sign in with your Janeway account  </div>
				<div class="panel-body">
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" required>
							</div>
							<button class="btn btn-success" type="submit" name="btn-login">Sign In</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	</div>
	</div>	
</body>
</html>