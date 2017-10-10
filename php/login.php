<?php
	require 'connection.php';
	session_start();
	$conn = Connect();
	if(isset($_POST['login']) and $_COOKIE['location']=="yes"){
		$username = stripslashes($_POST["username"]);
		$username = mysqli_real_escape_string($conn,$_POST["username"]);
		$password = stripslashes($_POST["password"]);
		$password = mysqli_real_escape_string($conn,$_POST["password"]);
		$pass = md5($password);
		$unique_id = $_POST["unique_id"];
		$myquery = "SELECT user_name, password FROM permanent_list WHERE user_name = '$username' AND password = '$pass' AND unique_id = '$unique_id' AND approval = 0";
		$result = $conn->query($myquery);
        if(mysqli_num_rows($result) > 0 ) {
            $_SESSION["logged_in"] = true;
            $_SESSION["username"] = $username;
            $get_data = mysqli_query($conn,"SELECT * FROM permanent_list WHERE user_name = '$username'");
            $roll_no = mysqli_fetch_assoc($get_data);
            $roll_no = $roll_no["reg_no"];
            setcookie('login', $username ,time()+7200,"/");
            setcookie('password', $pass, time()+7200,"/");
            $time = date("Y-m-d H:i:s");
            $time_obj = new DateTime($time);
            $_SESSION["login_time"] = $time_obj;
			$date = date("d-m-Y");
			if($username != "admin"){
				$query = "INSERT into attendance (user_name, reg_no, login_date, login_time) VALUES ('$username','$roll_no','$date','$time')";
				$success = $conn->query($query);
				if(!$success){
					echo "couldn't add! :(";
				}
				else{
					header("location: /student/student.html");
				}
			}
			else{
				header("location: /admin/admin.html");
			}
		}
        else{
        	echo "incorrect credentials! :(";
        }
	}
	else{
		echo "<script type='text/javascript'>alert('You have either not given the permission to know your location or you are not in the proximity of lab! Please give the appropriate permissions and try again'); window.location.href = '/login.html';</script>";
	}
	$conn->close();
?>
