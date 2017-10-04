
<?php
	function  time_update(){
		$str=$_SESSION["login_time"];
		$str=date_timestamp_get($str);
		$str1=$_SESSION["logout_time"];
		$str1=date_timestamp_get($str1);
		$username=$_SESSION["name"];
		$conn=$_SESSION["connection"];
		$myquery = mysqli_query($conn,"SELECT * FROM attendance WHERE logout_time=-1 AND user_name = '$username'");
		$myquery = mysqli_fetch_assoc($myquery);
		$check = $myquery["logout_time"];
		if($check = -1){
			$mysql=mysqli_query($conn,"SELECT * FROM permanent_list WHERE user_name='$username'");
			$mysql = mysqli_fetch_assoc($mysql);
			$mysql = $mysql["hours_worked"];
			$mysql=$mysql + ((($str1-$str)/60)/60);
			$mysql=mysqli_query($conn,"UPDATE permanent_list SET hours_worked='$mysql' WHERE user_name='$username'");
			echo (($str1-$str)/60)/60;
			echo "              ";
			echo $str1-$str;
		}
	}
?>
	