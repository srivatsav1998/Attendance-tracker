<?php
	require 'connection.php';
	$conn = Connect();
	$time = date("Y-m-d H:i:s");
	$time_obj = new DateTime($time);
	$myquery = mysqli_query($conn, "SELECT * FROM attendance WHERE logout_time = -1");
	while($row=mysqli_fetch_array($myquery,MYSQLI_ASSOC)){
		$login_time = $row["login_time"];
		$login_time_obj = new DateTime($login_time);
		$username = $row["user_name"];
		$checktime = strtotime($login_time)+7200;
		$checktime = date("Y-m-d H:i:s",$checktime);
		$checktime_obj = new DateTime($checktime);
		$str1=date_timestamp_get($time_obj);
		$str=date_timestamp_get($login_time_obj);
		if($time_obj>$checktime_obj){
			$mysql=mysqli_query($conn,"SELECT * FROM permanent_list WHERE user_name='$username'");
			$mysql = mysqli_fetch_assoc($mysql);
			$mysql = $mysql["hours_worked"];
			echo ((($str1-$str)/60)/60);
			echo "                             ";
			echo $mysql;
			$mysql= $mysql + ((($str1-$str)/60)/60);
			$mysql=mysqli_query($conn,"UPDATE permanent_list SET hours_worked='$mysql' WHERE user_name='$username'");
			$logout_update = mysqli_query($conn, "UPDATE attendance SET logout_time = '$time' WHERE user_name = '$username'");
			$live_update = mysqli_query($conn, "UPDATE attendance SET live = 0 WHERE user_name = '$username'");
		}
	}
	
?>