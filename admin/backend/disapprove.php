<?php
	#Disapprove a student
    require 'connection.php';
    $conn = Connect();
    $data = json_decode(file_get_contents("php://input"));
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	$username = mysqli_real_escape_string($conn,$data->username);
	$sql = "DELETE FROM permanent_list WHERE user_name = '$username' AND approval = 1";
	if (mysqli_query($conn, $sql)) {
		echo "Member Dis-approved";
	} else {
		echo "Error while dis-approving member: " . mysqli_error($conn);
	}
	$conn->close();
?>