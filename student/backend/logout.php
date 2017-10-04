<?php
	require 'connection.php';
	require 'no_hours.php';
	session_start();
	$conn = Connect();
	$_SESSION["connection"] = $conn;
	$username = $_SESSION["name"];
	$time = date("Y-m-d H:i:s");
	$time_obj = new DateTime($time);
	$_SESSION["logout_time"] = $time_obj;
	$update_live = mysqli_query($conn, "UPDATE attendance SET live = 0 WHERE user_name = '$username' AND logout_time = -1");
	$update_out = mysqli_query($conn, "UPDATE attendance set logout_time = '$time' WHERE user_name = '$username' AND logout_time= -1");
	time_update();
	setcookie('login',"",time()-3600,'/');
	setcookie('password',"",time()-3600,'/');
	session_destroy();
	header("location: /login.html");
	$conn->close();
?>