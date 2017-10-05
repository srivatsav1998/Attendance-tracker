<?php
	require 'connection.php';
	$conn = Connect();
	if(isset($_POST['signup'])){
		$full_name = $_POST["first_name"] ." ". $_POST["last_name"];
		$reg_no = $_POST["reg_no"];
		$year = $_POST["year_of_admission"];
		$branch = $_POST["branch"];
		$username = stripslashes($_POST["username"]);
		$username = mysqli_real_escape_string($conn,$_POST["username"]);
		$password = stripslashes($_POST["password"]);
		$password = mysqli_real_escape_string($conn,$_POST["password"]);
		$pass = md5($password);
  	$result = mysqli_query($conn,"SELECT * FROM permanent_list WHERE user_name='" . $_POST["username"] . "'");
	  $user_count = mysqli_num_rows($result);
		if($user_count>0) {
	      echo "<script type='text/javascript'>alert('Username is already in use'); window.location.href = '/login.html';</script>";
	  }else{
			$myquery = "INSERT into permanent_list (user_name, password, name, reg_no, year_of_admission, branch) VALUES ('$username','$pass','$full_name','$reg_no','$year', '$branch')";
			$success = $conn->query($myquery);
			header("location: /login.html");

			if (!$success) {
			    die("Couldn't enter data: ".$conn->error);
			}
		}
	}
	$conn->close();
?>
