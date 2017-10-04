<?php
    require 'connection.php';
    $conn = Connect();
    $data = json_decode(file_get_contents("php://input"));
	if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	$username = mysqli_real_escape_string($conn,$data->username);
	$sql = "UPDATE permanent_list SET approval = 0 WHERE user_name = '$username'";
	if (mysqli_query($conn, $sql)) {
		echo "Member accepted";
	} else {
		echo "Error while approving member: " . mysqli_error($conn);
	}
	$conn->close();
?>