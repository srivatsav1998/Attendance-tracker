<?php
	require 'connection.php';
	session_start();
	$conn = Connect();
	session_destroy();
	setcookie('login',"",time()-3600,'/');
	setcookie('password',"",time()-3600,'/');
	header("location: /login.html");
	$conn->close();
?>