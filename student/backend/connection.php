<?php
 
	function Connect(){
	 $dbhost = "localhost";
	 $dbuser = "USERNAME";
	 $dbpass = "PASSWORD";
	 $dbname = "DB_NAME";
	 
	 // Create connection
	 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
 
	 return $conn;
	}
 
?>