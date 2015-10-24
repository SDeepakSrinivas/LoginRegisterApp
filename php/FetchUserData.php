<?php

	# Details for database given by 000webhost
	$mysql_host = "mysql8.000webhost.com";
	$mysql_database = "a7626050_UserDB";
	$mysql_user = "a7626050_deepak";
	$mysql_password = "password123";

	# Connecting to database using these details
	$conn = mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_database);

	$username = $_POST["username"];
	$password = $_POST["password"];

	$statement = mysqli_prepare($conn,"SELECT * FROM User WHERE username = ? AND password = ?");
	mysqli_stmt_bind_param($statement,"ss",$username,$password);
	mysqli_stmt_execute($statement);

	mysqli_stmt_store_result($statement);
	mysqli_stmt_bind_result($statement,$userID,$name,$age,$username,$password);

	$user = array();

	while(mysqli_stmt_fetch($statement)) {
		$user[name] = $name;
		$user[age] = $age;
		$user[username] = $username;
		$user[password] = $password;
	}

	echo json_encode($user);

	mysqli_stmt_close($statement);

	mysqli_close($conn);	

?>