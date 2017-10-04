<?php
	require 'connection.php';
	$conn = Connect();
	$rand = rand(1111,9999);
	$data = array();
	$username="admin";
	$myquery = mysqli_query($conn,"UPDATE permanent_list SET unique_id = '$rand' WHERE user_name!='$username'");
	$data[] = $rand;
	header('Content-Type: application/json');
	echo json_encode($data);
	$conn->close();
?>