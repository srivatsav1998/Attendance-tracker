<?php
//Returns the active list of active persons
//This is Single Line Comment
#This is Single Line Comment
/* This is Multi Line Comment
Yuhuu */
	require 'connection.php';
	$conn = Connect();
	$myquery = mysqli_query($conn,"SELECT * FROM attendance WHERE live = 1");
	$data = array();
	while($row = mysqli_fetch_array($myquery)){
		$data[] = $row;
	}
	header('Content-Type: application/json');
	echo json_encode($data);
	$conn->close();
?>
