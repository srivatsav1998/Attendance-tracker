<?php
	require 'connection.php';
	require 'no_hours.php';
	session_start();
	$conn = Connect();
	$_SESSION["connection"] = $conn;
	$username = $_COOKIE['login'];
	$time = date("Y-m-d H:i:s");
	$time_obj = new DateTime($time);
	$_SESSION["logout_time"] = $time_obj;
	$update_live = mysqli_query($conn, "UPDATE attendance SET live = 0 WHERE (user_name = '$username' && logout_time = '-1')");
	if (!$update_live)
	  {
	  echo("Error description: " . mysqli_error($conn));
	  }
	$update_out = mysqli_query($conn, "UPDATE attendance set logout_time = '$time' WHERE (user_name = '$username' && logout_time= '-1')");
	time_update();
	setcookie('login',"",time()-3600,'/');
	setcookie('password',"",time()-3600,'/');
	setcookie('location',"",time()-3600.'/');
	session_destroy();
	header("location: /login.html");
?>
