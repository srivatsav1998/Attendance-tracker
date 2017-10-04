<?php 
	require 'connection.php';
	$conn = Connect();
	$data = json_decode(file_get_contents("php://input"));
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	$date = mysqli_real_escape_string($conn,$data->login_date);
	$sql = "Select * FROM attendance WHERE login_date = '$date'";
	if ($result = mysqli_query($conn, $sql)) {
		$data = array();
		while ($row = mysqli_fetch_array($result)) {
			$data[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($data);
	} else {
		echo "Error while retrieving " . mysqli_error($conn);
	}




	$conn->close();
?>