<?php
	require 'php/connection.php';
	$conn = Connect();
	if((!isset($_COOKIE['login']))&&($_COOKIE['login']=="")){
		header("location: login.html");
	}
	else{
		$username = $_COOKIE['login'];
		$myquery = mysqli_query($conn, "SELECT * FROM permanent_list WHERE user_name = '$username'");
		$myquery = mysqli_fetch_assoc($myquery);
		$password = $myquery["password"];
		if(($_COOKIE['login']!="" )&& ($_COOKIE['password']!="")){

			if($password == $_COOKIE['password']){
					if($username == "admin"){
						header("location: admin/admin.html");
					}
					else{
						header("location: student/student.html");
					}
			}
			else{
				echo "Nice try kiddo";
			}
		}
		else{
			echo "Nice Try kiddo!";
		}
	}
?>
