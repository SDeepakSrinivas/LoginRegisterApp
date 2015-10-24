<?php

	# Details for database given by 000webhost
	$mysql_host = "mysql8.000webhost.com";
	$mysql_database = "a7626050_UserDB";
	$mysql_user = "a7626050_deepak";
	$mysql_password = "password123";

	# Connecting to database using these details
	$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database);

	# Retrieving the parameters from the request
	$name = $_POST["name"];
	$age = $_POST["age"];
	$username = $_POST["username"];
	$password = $_POST["password"];

	echo $username." ".$password." ".$name." ".$age." ";

	# Create query , Using ? for avoiding sql injection
	$statement = mysqli_prepare($conn,"INSERT INTO User (name,age,username,password) VALUES (?,?,?,?) ");
	mysqli_stmt_bind_param($statement,"siss",$name,$age,$username,$password);
	mysqli_stmt_execute($statement);

	mysqli_stmt_close($statement);

	mysqli_close($conn);

?>
