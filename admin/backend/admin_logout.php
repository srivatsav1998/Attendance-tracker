<?php
	// Import connection settings
	require 'connection.php';

	//start the session and establish a connection
	session_start();
	$conn = Connect();

	// Destroy the current session and deleting cookies.
	session_destroy();
	setcookie('login',"",time()-3600,'/');
	setcookie('password',"",time()-3600,'/');

	// Forwarding to login page
	header("location: /login.html");

	// lastly close the connection when done.
	$conn->close();
?>
