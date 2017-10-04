<?php
require 'connection.php';
$conn = Connect();
$data = json_decode(file_get_contents("php://input"));

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$username = mysqli_real_escape_string($conn,$data->username);
$sql = "DELETE FROM permanent_list WHERE user_name = '$username'";

if (mysqli_query($conn, $sql)) {
    echo "Member removed successfully";
} else {
    echo "Error deleting member: " . mysqli_error($conn);
}

$conn->close();
?>
