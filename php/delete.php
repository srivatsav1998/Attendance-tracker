<?php
require 'connection.php';
$conn = Connect();
$data = json_decode(file_get_contents("php://input"));
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$reg_no = mysql_real_escape_string($data->reg_no);
echo $reg_no;
$sql = "DELETE FROM permanent_list WHERE reg_no = '$reg_no'";

if (mysqli_query($conn, $sql)) {
    echo "Member removed successfully";
} else {
    echo "Error deleting member: " . mysqli_error($conn);
}

$conn->close();
?>
