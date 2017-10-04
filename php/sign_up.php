<?php
	require 'connection.php';
	$conn = Connect();
	if(isset($_POST['signup'])){
		$full_name = $_POST["first_name"] ." ". $_POST["last_name"];
		echo $full_name;
		$reg_no = $_POST["reg_no"];
		$year = $_POST["year_of_admission"];
		$branch = $_POST["branch"];
		$username = stripslashes($_POST["username"]); 
		$username = mysqli_real_escape_string($conn,$_POST["username"]);
		$password = stripslashes($_POST["password"]); 
		$password = mysqli_real_escape_string($conn,$_POST["password"]); 
		$pass = md5($password);
		$myquery = "INSERT into permanent_list (user_name, password, name, reg_no, year_of_admission, branch) VALUES ('$username','$pass','$full_name','$reg_no','$year', '$branch')";
		$success = $conn->query($myquery);
		header("location: /login.html");
 
		if (!$success) {
		    die("Couldn't enter data: ".$conn->error); 
		}
	}
	$conn->close();
?>
