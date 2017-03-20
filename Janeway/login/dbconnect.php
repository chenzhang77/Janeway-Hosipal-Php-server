<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
if(!mysql_connect("127.0.0.1:3307","root","123"))
{
	die('oops connection problem ! --> '.mysql_error());
	echo 'error 1';
}
if(!mysql_select_db("janeway"))
{
	die('oops database selection problem ! --> '.mysql_error());
	echo 'error 2';
}
?>